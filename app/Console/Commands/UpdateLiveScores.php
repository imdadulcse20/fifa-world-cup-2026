<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use App\Models\MatchEvent;
use App\Services\ScoreScraperService;
use Illuminate\Support\Facades\Log;

class UpdateLiveScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scores:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update match live scores from external websites';

    protected $scraper;

    public function __construct(ScoreScraperService $scraper)
    {
        parent::__construct();
        $this->scraper = $scraper;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Select matches that are live OR have scraping active
        $matches = Game::where('is_scraping_active', true)
            ->where('status', 'live')
            ->whereNotNull('scraping_url')
            ->get();

        if ($matches->isEmpty()) {
            $this->info('No active matches with scraping configuration found.');
            return 0;
        }

        foreach ($matches as $match) {
            $this->info("Scraping for: {$match->homeTeam->name} vs {$match->awayTeam->name}");
            
            $data = $this->scraper->scrape($match->scraping_url, $match->external_match_id);

            if ($data && isset($data['home']) && isset($data['away'])) {
                // Update basic match info
                $updateData = [
                    'home_score' => $data['home'],
                    'away_score' => $data['away'],
                    'match_time' => $data['time'] ?? $match->match_time
                ];

                if ($data['time'] == 'FT' || $data['time'] == 'Final' || str_contains(strtolower($data['time'] ?? ''), 'full time')) {
                    $updateData['status'] = 'finished';
                    $updateData['match_time'] = 'FT';
                }

                $match->update($updateData);

                // Update Goals / Match Events
                $this->info("Goals found by scraper: " . count($data['goals'] ?? []));
                if (!empty($data['goals'])) {
                    foreach ($data['goals'] as $goal) {
                        $teamId = ($goal['team'] == 'home') ? $match->home_team_id : $match->away_team_id;
                        
                        // Check if this goal event already exists to avoid duplicates
                        $exists = MatchEvent::where('match_id', $match->id)
                            ->where('player_name', $goal['player'])
                            ->where('minute', $goal['minute'])
                            ->where('type', 'goal')
                            ->exists();

                        if (!$exists) {
                            MatchEvent::create([
                                'match_id' => $match->id,
                                'team_id' => $teamId,
                                'player_name' => $goal['player'],
                                'minute' => $goal['minute'],
                                'type' => 'goal'
                            ]);
                            $this->info("New Goal: {$goal['player']} ({$goal['minute']}')");
                        }
                    }
                }

                $this->info("Updated: {$data['home']}-{$data['away']} ({$updateData['match_time']})");
            } else {
                $this->error("Failed to fetch data for Match ID: {$match->id}");
            }
        }

        return 0;
    }
}
