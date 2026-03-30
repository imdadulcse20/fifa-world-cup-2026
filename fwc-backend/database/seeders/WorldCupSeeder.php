<?php

namespace Database\Seeders;

use App\Models\Stadium;
use App\Models\Team;
use App\Models\Player;
use App\Models\Game;
use App\Models\Standing;
use App\Models\MatchEvent;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WorldCupSeeder extends Seeder
{
    public function run()
    {
        // Clean up
        DB::statement('PRAGMA foreign_keys = OFF;');
        DB::table('match_events')->truncate();
        DB::table('matches')->truncate();
        DB::table('standings')->truncate();
        DB::table('players')->truncate();
        DB::table('teams')->truncate();
        DB::table('stadiums')->truncate();
        DB::statement('PRAGMA foreign_keys = ON;');

        // 1. Official 2026 Stadiums
        $stadiumsData = [
            'Estadio Azteca' => ['city' => 'Mexico City', 'capacity' => 83000, 'img' => 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2'],
            'MetLife Stadium' => ['city' => 'East Rutherford', 'capacity' => 82500, 'img' => 'https://images.unsplash.com/photo-1599305090598-fe179d501c27'],
            'AT&T Stadium' => ['city' => 'Arlington', 'capacity' => 94000, 'img' => 'https://images.unsplash.com/photo-1566577739112-5180d4bf9390'],
            'Mercedes-Benz Stadium' => ['city' => 'Atlanta', 'capacity' => 75000, 'img' => 'https://images.unsplash.com/photo-1533558379417-062e08e68407'],
            'SoFi Stadium' => ['city' => 'Inglewood', 'capacity' => 70000, 'img' => 'https://images.unsplash.com/photo-1596727147705-61a532a659bd'],
            'BC Place' => ['city' => 'Vancouver', 'capacity' => 54000, 'img' => 'https://images.unsplash.com/photo-1569510345591-893043236021'],
            'BMO Field' => ['city' => 'Toronto', 'capacity' => 45000, 'img' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018'],
            'Arrowhead Stadium' => ['city' => 'Kansas City', 'capacity' => 73000, 'img' => 'https://images.unsplash.com/photo-1575361204480-aadea2d30e68'],
            'NRG Stadium' => ['city' => 'Houston', 'capacity' => 72000, 'img' => 'https://images.unsplash.com/photo-1594412217033-0c58e763f972'],
            'Levi\'s Stadium' => ['city' => 'Santa Clara', 'capacity' => 71000, 'img' => 'https://images.unsplash.com/photo-1580137189272-c9379f8864fd'],
            'Lincoln Financial Field' => ['city' => 'Philadelphia', 'capacity' => 69000, 'img' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267'],
            'Lumen Field' => ['city' => 'Seattle', 'capacity' => 69000, 'img' => 'https://images.unsplash.com/photo-1504450758481-7338eba7524a'],
            'Hard Rock Stadium' => ['city' => 'Miami Gardens', 'capacity' => 65000, 'img' => 'https://images.unsplash.com/photo-1517603980279-a76495f50a89'],
            'Gillette Stadium' => ['city' => 'Foxborough', 'capacity' => 65000, 'img' => 'https://images.unsplash.com/photo-1577223625816-7546f13df25d'],
            'Estadio BBVA' => ['city' => 'Guadalupe', 'capacity' => 53500, 'img' => 'https://images.unsplash.com/photo-1569510345591-893043236021'],
            'Estadio Akron' => ['city' => 'Zapopan', 'capacity' => 48000, 'img' => 'https://images.unsplash.com/photo-1504450758481-7338eba7524a'],
        ];

        $stadiums = [];
        foreach ($stadiumsData as $name => $s) {
            $stadiums[] = Stadium::create(['name' => $name, 'city' => $s['city'], 'capacity' => $s['capacity'], 'image_url' => $s['img']]);
        }

        // 2. Teams with ISO codes and FIFA rankings (Current, High, Low)
        $groups = [
            'Group A' => [
                ['Mexico', 'mx', 15, 4, 40], ['South Africa', 'za', 70, 16, 124], ['South Korea', 'kr', 22, 17, 69], ['Poland', 'pl', 30, 5, 78]
            ],
            'Group B' => [
                ['Canada', 'ca', 40, 33, 122], ['Italy', 'it', 9, 1, 21], ['Qatar', 'qa', 35, 34, 113], ['Switzerland', 'ch', 19, 3, 83]
            ],
            'Group C' => [
                ['USA', 'us', 13, 4, 36], ['Ghana', 'gh', 60, 14, 89], ['Netherlands', 'nl', 7, 1, 36], ['Japan', 'jp', 18, 9, 62]
            ],
            'Group D' => [
                ['Argentina', 'ar', 2, 1, 24], ['France', 'fr', 3, 1, 27], ['Saudi Arabia', 'sa', 56, 21, 126], ['Norway', 'no', 45, 2, 84]
            ],
            'Group E' => [
                ['Brazil', 'br', 5, 1, 22], ['Spain', 'es', 1, 1, 25], ['Cameroon', 'cm', 46, 11, 102], ['Ukraine', 'ua', 24, 11, 132]
            ],
            'Group F' => [
                ['England', 'gb-eng', 4, 3, 27], ['Portugal', 'pt', 6, 3, 43], ['Senegal', 'sn', 17, 17, 99], ['Ecuador', 'ec', 31, 10, 71]
            ],
            'Group G' => [
                ['Belgium', 'be', 8, 1, 71], ['Croatia', 'hr', 10, 3, 125], ['Ivory Coast', 'ci', 39, 12, 107], ['Turkey', 'tr', 35, 10, 67]
            ],
            'Group H' => [
                ['Germany', 'de', 16, 1, 22], ['Uruguay', 'uy', 11, 2, 76], ['Egypt', 'eg', 36, 9, 75], ['Chile', 'cl', 42, 3, 84]
            ],
            'Group I' => [
                ['Italy', 'it', 9, 1, 21], ['Colombia', 'co', 14, 3, 54], ['Algeria', 'dz', 43, 13, 103], ['Austria', 'at', 25, 10, 105]
            ],
            'Group J' => [
                ['Denmark', 'dk', 21, 3, 51], ['Peru', 'pe', 32, 10, 91], ['Nigeria', 'ng', 28, 5, 82], ['Scotland', 'gb-sct', 34, 13, 88]
            ],
            'Group K' => [
                ['Serbia', 'rs', 33, 6, 101], ['Tunisia', 'tn', 41, 14, 65], ['Wales', 'gb-wls', 29, 8, 117], ['Czech Republic', 'cz', 38, 2, 67]
            ],
            'Group L' => [
                ['Panama', 'pa', 44, 29, 150], ['Jamaica', 'jm', 55, 27, 116], ['Paraguay', 'py', 56, 8, 103], ['New Zealand', 'nz', 85, 47, 161]
            ],
        ];

        $teamInstances = [];
        $groupList = [];

        foreach ($groups as $groupName => $teams) {
            $groupList[$groupName] = [];
            foreach ($teams as $t) {
                $name = $t[0];
                $iso = $t[1];
                $localPath = "uploads/flags/" . strtolower(str_replace(' ', '_', $name)) . ".png";
                
                // Download flag if not exists
                if (!File::exists(public_path($localPath))) {
                    $flagData = @file_get_contents("https://flagcdn.com/w160/{$iso}.png");
                    if ($flagData) {
                        File::ensureDirectoryExists(public_path('uploads/flags'));
                        File::put(public_path($localPath), $flagData);
                    }
                }

                $team = Team::create([
                    'name' => $name,
                    'flag_url' => $localPath,
                    'group_name' => $groupName,
                    'coach' => 'Coach ' . $name,
                    'fifa_rank' => $t[2],
                    'highest_rank' => $t[3],
                    'lowest_rank' => $t[4],
                ]);
                $teamInstances[$name] = $team;
                $groupList[$groupName][] = $team;
                Standing::create(['team_id' => $team->id, 'group_name' => $groupName]);
                
                for ($i = 1; $i <= 3; $i++) {
                    Player::create(['team_id' => $team->id, 'name' => "Star $i ($name)", 'position' => 'Pro', 'number' => rand(1, 99)]);
                }
            }
        }

        // 3. Match Schedule (Group Stage)
        $matchDate = Carbon::create(2026, 6, 11, 18, 0, 0);
        foreach ($groupList as $groupName => $groupTeams) {
            $pairings = [[0,1], [2,3], [0,2], [1,3], [0,3], [1,2]];
            foreach ($pairings as $pair) {
                $this->createMatch($groupTeams[$pair[0]], $groupTeams[$pair[1]], $stadiums[rand(0, 15)], 'Group Stage', $groupName, $matchDate->copy()->addHours(rand(0, 200)), 'upcoming');
            }
        }

        // 4. Knockout Stage
        $knockoutStages = [
            ['Round of 32', 16, '2026-06-28'],
            ['Round of 16', 8, '2026-07-04'],
            ['Quarter-finals', 4, '2026-07-09'],
            ['Semi-finals', 2, '2026-07-14'],
            ['Third Place Match', 1, '2026-07-18'],
            ['Final', 1, '2026-07-19'],
        ];

        foreach ($knockoutStages as $stage) {
            for ($i = 0; $i < $stage[1]; $i++) {
                $this->createMatch($teamInstances['USA'], $teamInstances['Brazil'], $stadiums[rand(0, 15)], $stage[0], 'Knockout', Carbon::parse($stage[2])->addDays($i % 3)->setHour(18 + ($i % 3)), 'upcoming');
            }
        }

        // 5. LIVE SIMULATION
        $first = Game::first();
        if ($first) {
            $first->update(['status' => 'live', 'match_date_utc' => Carbon::now(), 'home_score' => 1, 'away_score' => 0]);
        }
    }

    private function createMatch($home, $away, $stadium, $stage, $group, $date, $status)
    {
        return Game::create(['home_team_id' => $home->id, 'away_team_id' => $away->id, 'stadium_id' => $stadium->id, 'match_date_utc' => $date, 'status' => $status, 'home_score' => 0, 'away_score' => 0, 'stage' => $stage, 'group_name' => $group]);
    }
}
