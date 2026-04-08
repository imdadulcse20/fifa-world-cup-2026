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
            'timeout' => 15,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
                'Accept-Language' => 'en-US,en;q=0.9',
            ]
        ]);
    }

    public function scrape($url, $externalId = null)
    {
        try {
            $response = $this->client->get($url);
            $html = (string) $response->getBody();
            $crawler = new Crawler($html);

            if (str_contains($url, 'espn.com')) {
                return $this->scrapeESPN($html, $crawler);
            }

            return $this->guessScoreFromHtml($crawler, $externalId);
            
        } catch (\Exception $e) {
            Log::error("Scraping failed for {$url}: " . $e->getMessage());
            return null;
        }
    }

    protected function scrapeESPN($html, Crawler $crawler)
    {
        $data = [
            'home' => null, 
            'away' => null, 
            'time' => null,
            'goals' => []
        ];

        try {
            // Method 1: String manipulation for JSON (Most reliable)
            $startMarker = "window['__fittData'] = ";
            $startPos = strpos($html, $startMarker);
            if ($startPos !== false) {
                $startPos += strlen($startMarker);
                $endPos = strpos($html, "</script>", $startPos);
                if ($endPos !== false) {
                    $jsonString = trim(substr($html, $startPos, $endPos - $startPos));
                    $jsonString = rtrim($jsonString, ';');
                    $jsonData = json_decode($jsonString, true);
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
                            if (!empty($data['goals'])) return $data;
                        }
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
