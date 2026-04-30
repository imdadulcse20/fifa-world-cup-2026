<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\MatchStat;

class MatchStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = Game::all();

        foreach ($matches as $match) {
            MatchStat::updateOrCreate(
                ['match_id' => $match->id],
                [
                    'home_possession' => rand(40, 60),
                    'away_possession' => 0, // Will be calculated in model or set here
                    'home_shots' => rand(5, 20),
                    'away_shots' => rand(5, 20),
                    'home_shots_on_target' => rand(2, 10),
                    'away_shots_on_target' => rand(2, 10),
                    'home_corners' => rand(2, 12),
                    'away_corners' => rand(2, 12),
                    'home_fouls' => rand(5, 15),
                    'away_fouls' => rand(5, 15),
                    'home_yellow_cards' => rand(0, 4),
                    'away_yellow_cards' => rand(0, 4),
                    'home_red_cards' => rand(0, 1) > 0.9 ? 1 : 0,
                    'away_red_cards' => rand(0, 1) > 0.9 ? 1 : 0,
                    'home_offsides' => rand(0, 5),
                    'away_offsides' => rand(0, 5),
                ]
            );

            // Correct possession
            $stats = MatchStat::where('match_id', $match->id)->first();
            $stats->update(['away_possession' => 100 - $stats->home_possession]);
        }
    }
}
