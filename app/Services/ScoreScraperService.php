<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Log;

class ScoreScraperService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false,
            'timeout' => 15,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Cache-Control' => 'no-cache',
                'Pragma' => 'no-cache',
                'Upgrade-Insecure-Requests' => '1',
            ]
        ]);
    }

    public function scrape($url, $externalId = null)
    {
        try {
            $response = $this->client->get($url);
            $html = (string) $response->getBody();
            $status = $response->getStatusCode();
            Log::info("Scraper response for {$url}: Status {$status}, Length " . strlen($html));
            
            if (strlen($html) === 0) {
                Log::warning("Empty response body for {$url}");
                return null;
            }

            $crawler = new Crawler($html);

            if (str_contains($url, 'espn.')) {
                return $this->scrapeESPN($html, $crawler, $url);
            }

            return $this->guessScoreFromHtml($crawler, $externalId);
            
        } catch (\Exception $e) {
            Log::error("Scraping failed for {$url}: " . $e->getMessage());
            return null;
        }
    }

    protected function scrapeESPN($html, Crawler $crawler, $url)
    {
        $data = [
            'home' => null, 
            'away' => null, 
            'time' => null,
            'goals' => []
        ];

        try {
            // Extract Game ID from URL
            if (preg_match('/gameId\/(\d+)/', $url, $matches)) {
                $gameId = $matches[1];
                $apiUrl = "https://site.api.espn.com/apis/site/v2/sports/soccer/fifa.world/summary?event={$gameId}";
                
                Log::info("Fetching ESPN API: {$apiUrl}");
                $response = $this->client->get($apiUrl);
                $body = (string)$response->getBody();
                Log::info("ESPN API Response length: " . strlen($body));
                $json = json_decode($body, true);

                if ($json) {
                    $header = $json['header'] ?? null;
                    if ($header) {
                        $competitors = $header['competitions'][0]['competitors'] ?? [];
                        foreach ($competitors as $team) {
                            if ($team['homeAway'] == 'home') {
                                $data['home'] = (int)$team['score'];
                            } else {
                                $data['away'] = (int)$team['score'];
                            }
                        }
                        
                        $status = $header['competitions'][0]['status'] ?? null;
                        if ($status) {
                            if ($status['type']['state'] == 'post') {
                                $data['time'] = 'FT';
                            } else {
                                $data['time'] = $status['type']['shortDetail'] ?? null;
                            }
                        }
                    }

                    // Extract Goals from Key Events
                    if (isset($json['keyEvents'])) {
                        foreach ($json['keyEvents'] as $event) {
                            $typeText = $event['type']['type'] ?? '';
                            if (str_contains($typeText, 'goal') || str_contains($typeText, 'penalty---scored')) {
                                $playerName = 'Unknown';
                                if (preg_match('/Goal! [^.]+?\. ([^(]+) \(/', $event['text'] ?? '', $m)) {
                                    $playerName = trim($m[1]);
                                }

                                $minute = str_replace("'", "", $event['clock']['displayValue'] ?? '0');
                                if (str_contains($minute, '+')) {
                                    $parts = explode('+', $minute);
                                    $minute = (int)$parts[0] + (int)$parts[1];
                                } else {
                                    $minute = (int)$minute;
                                }

                                $data['goals'][] = [
                                    'team' => ($event['away'] ?? false) ? 'away' : 'home',
                                    'player' => $playerName,
                                    'minute' => $minute
                                ];
                            }
                        }
                    }

                    return $data;
                }
            }

            // Fallback to Regex for JSON if API fails or ID not found
            if (preg_match('/window\[[\'"]__fittData[\'"]\]\s*=\s*({.+?});\s*<\/script>/s', $html, $matches)) {
                $jsonData = json_decode($matches[1], true);
                if ($jsonData) {
                    $gmStrp = $jsonData['gamepackage']['gmStrp'] ?? null;
                    if ($gmStrp) {
                        $data['home'] = (int) ($gmStrp['tms'][0]['score'] ?? 0);
                        $data['away'] = (int) ($gmStrp['tms'][1]['score'] ?? 0);
                        $data['time'] = $gmStrp['status']['det'] ?? ($gmStrp['status']['desc'] ?? null);
                        if (isset($gmStrp['goals'])) {
                            foreach (['home', 'away'] as $teamType) {
                                if (isset($gmStrp['goals'][$teamType]['goals'])) {
                                    foreach ($gmStrp['goals'][$teamType]['goals'] as $goal) {
                                        $data['goals'][] = [
                                            'team' => $teamType,
                                            'player' => $goal['name'] ?? 'Unknown',
                                            'minute' => str_replace("'", "", $goal['clock'] ?? '0')
                                        ];
                                    }
                                }
                            }
                        }
                        return $data;
                    }
                }
            }

            // Method 2: Fallback to basic selectors for Score/Time
            $title = $crawler->filter('title')->first();
            if ($title->count() > 0 && preg_match('/(\d+)-(\d+)/', $title->text(), $matches)) {
                $data['home'] = (int)$matches[1];
                $data['away'] = (int)$matches[2];
            }

            // Fallback for goals if JSON fails
            // Pattern to catch names with accents: Bremer, Kylian Mbappé, etc.
            if (empty($data['goals'])) {
                if (preg_match_all('/([\p{L}\s]+)\s*-\s*(\d+)(?:&#x27;|\')/u', $html, $goalMatches, PREG_SET_ORDER)) {
                    foreach ($goalMatches as $match) {
                        $playerName = trim($match[1]);
                        // Filter out noise
                        if (strlen($playerName) < 2 || str_contains($playerName, 'Final') || str_contains($playerName, 'ESPN') || str_contains($playerName, 'Soccer')) continue;
                        
                        $data['goals'][] = [
                            'team' => 'unknown', 
                            'player' => $playerName,
                            'minute' => $match[2]
                        ];
                    }
                }
            }

            return $data;

        } catch (\Exception $e) {
            Log::warning("ESPN specific scraping failed: " . $e->getMessage());
        }

        return null;
    }

    protected function guessScoreFromHtml(Crawler $crawler, $externalId)
    {
        $selectors = ['.score', '.current-score', '.match-score'];
        foreach ($selectors as $selector) {
            try {
                $elements = $crawler->filter($selector);
                if ($elements->count() > 0) {
                    $scoreText = $elements->first()->text();
                    if (preg_match('/(\d+)\s*[-:]\s*(\d+)/', $scoreText, $matches)) {
                        return [
                            'home' => (int)$matches[1],
                            'away' => (int)$matches[2],
                            'time' => null,
                            'goals' => []
                        ];
                    }
                }
            } catch (\Exception $e) { continue; }
        }
        return null;
    }
}
