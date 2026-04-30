<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Prediction;
use Illuminate\Support\Str;

class PredictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = Game::all();
        $choices = ['home', 'draw', 'away'];

        foreach ($matches as $match) {
            // Add 10-50 random predictions for each match
            $count = rand(10, 50);
            for ($i = 0; $i < $count; $i++) {
                Prediction::create([
                    'match_id' => $match->id,
                    'choice' => $choices[array_rand($choices)],
                    'session_id' => Str::random(40)
                ]);
            }
        }
    }
}
