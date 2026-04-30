<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\MatchLineup;
use App\Models\Player;

class MatchLineupSeeder extends Seeder
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
            if ($match->home_team_id) {
                $homePlayers = Player::where('team_id', $match->home_team_id)->take(15)->get();
                foreach ($homePlayers as $index => $player) {
                    MatchLineup::updateOrCreate(
                        ['match_id' => $match->id, 'player_id' => $player->id],
                        [
                            'team_id' => $match->home_team_id,
                            'is_starter' => $index < 11,
                            'position_name' => $player->position
                        ]
                    );
                }
            }

            if ($match->away_team_id) {
                $awayPlayers = Player::where('team_id', $match->away_team_id)->take(15)->get();
                foreach ($awayPlayers as $index => $player) {
                    MatchLineup::updateOrCreate(
                        ['match_id' => $match->id, 'player_id' => $player->id],
                        [
                            'team_id' => $match->away_team_id,
                            'is_starter' => $index < 11,
                            'position_name' => $player->position
                        ]
                    );
                }
            }
        }
    }
}
