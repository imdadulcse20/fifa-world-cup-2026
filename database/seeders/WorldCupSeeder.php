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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('match_events')->truncate();
        DB::table('matches')->truncate();
        DB::table('standings')->truncate();
        DB::table('players')->truncate();
        DB::table('teams')->truncate();
        DB::table('stadiums')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // 1. Official 2026 Stadiums
        $stadiumsData = [
            'Estadio Azteca' => ['city' => 'Mexico City', 'capacity' => 83000, 'img' => 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2', 'tz' => 'America/Mexico_City'],
            'MetLife Stadium' => ['city' => 'East Rutherford', 'capacity' => 82500, 'img' => 'https://images.unsplash.com/photo-1599305090598-fe179d501c27', 'tz' => 'America/New_York'],
            'AT&T Stadium' => ['city' => 'Arlington', 'capacity' => 94000, 'img' => 'https://images.unsplash.com/photo-1566577739112-510d4bf9390', 'tz' => 'America/Chicago'],
            'Mercedes-Benz Stadium' => ['city' => 'Atlanta', 'capacity' => 75000, 'img' => 'https://images.unsplash.com/photo-1533558379417-062e08e68407', 'tz' => 'America/New_York'],
            'SoFi Stadium' => ['city' => 'Inglewood', 'capacity' => 70000, 'img' => 'https://images.unsplash.com/photo-1596727147705-61a532a659bd', 'tz' => 'America/Los_Angeles'],
            'BC Place' => ['city' => 'Vancouver', 'capacity' => 54000, 'img' => 'https://images.unsplash.com/photo-1569510345591-893043236021', 'tz' => 'America/Vancouver'],
            'BMO Field' => ['city' => 'Toronto', 'capacity' => 45000, 'img' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018', 'tz' => 'America/Toronto'],
            'Arrowhead Stadium' => ['city' => 'Kansas City', 'capacity' => 73000, 'img' => 'https://images.unsplash.com/photo-1575361204480-aadea2d30e68', 'tz' => 'America/Chicago'],
            'NRG Stadium' => ['city' => 'Houston', 'capacity' => 72000, 'img' => 'https://images.unsplash.com/photo-1594412217033-0c58e763f972', 'tz' => 'America/Chicago'],
            'Levi\'s Stadium' => ['city' => 'Santa Clara', 'capacity' => 71000, 'img' => 'https://images.unsplash.com/photo-1580137189272-c9379f8864fd', 'tz' => 'America/Los_Angeles'],
            'Lincoln Financial Field' => ['city' => 'Philadelphia', 'capacity' => 69000, 'img' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267', 'tz' => 'America/New_York'],
            'Lumen Field' => ['city' => 'Seattle', 'capacity' => 69000, 'img' => 'https://images.unsplash.com/photo-1504450758481-7338eba7524a', 'tz' => 'America/Los_Angeles'],
            'Hard Rock Stadium' => ['city' => 'Miami Gardens', 'capacity' => 65000, 'img' => 'https://images.unsplash.com/photo-1517603980279-a76495f50a89', 'tz' => 'America/New_York'],
            'Gillette Stadium' => ['city' => 'Foxborough', 'capacity' => 65000, 'img' => 'https://images.unsplash.com/photo-1577223625816-7546f13df25d', 'tz' => 'America/New_York'],
            'Estadio BBVA' => ['city' => 'Guadalupe', 'capacity' => 53500, 'img' => 'https://images.unsplash.com/photo-1569510345591-893043236021', 'tz' => 'America/Monterrey'],
            'Estadio Akron' => ['city' => 'Zapopan', 'capacity' => 48000, 'img' => 'https://images.unsplash.com/photo-1504450758481-7338eba7524a', 'tz' => 'America/Mexico_City'],
        ];

        $stadiums = [];
        foreach ($stadiumsData as $name => $s) {
            $stadiums[] = Stadium::create(['name' => $name, 'city' => $s['city'], 'capacity' => $s['capacity'], 'image_url' => $s['img'], 'timezone' => $s['tz']]);
        }

        // 2. Teams (48 Teams)
        $groups = [
            'Group A' => [['Mexico', 'mx', 15, 4, 40], ['South Africa', 'za', 58, 16, 124], ['South Korea', 'kr', 22, 17, 69], ['Czech Republic', 'cz', 36, 2, 67]],
            'Group B' => [['Canada', 'ca', 50, 33, 122], ['Bosnia and Herzegovina', 'ba', 71, 13, 108], ['Qatar', 'qa', 34, 34, 113], ['Switzerland', 'ch', 19, 3, 83]],
            'Group C' => [['Brazil', 'br', 5, 1, 22], ['Morocco', 'ma', 12, 10, 92], ['Haiti', 'ht', 90, 38, 155], ['Scotland', 'gb-sct', 39, 13, 88]],
            'Group D' => [['United States', 'us', 13, 4, 36], ['Paraguay', 'py', 56, 8, 103], ['Australia', 'au', 23, 14, 92], ['Turkey', 'tr', 35, 10, 67]],
            'Group E' => [['Germany', 'de', 16, 1, 22], ['Curaçao', 'cw', 91, 68, 183], ['Ivory Coast', 'ci', 39, 12, 107], ['Ecuador', 'ec', 31, 10, 71]],
            'Group F' => [['Netherlands', 'nl', 7, 1, 36], ['Japan', 'jp', 18, 9, 62], ['Sweden', 'se', 26, 2, 45], ['Tunisia', 'tn', 41, 14, 65]],
            'Group G' => [['Belgium', 'be', 8, 1, 71], ['Egypt', 'eg', 36, 9, 75], ['Iran', 'ir', 20, 15, 122], ['New Zealand', 'nz', 104, 47, 161]],
            'Group H' => [['Spain', 'es', 8, 1, 25], ['Cape Verde', 'cv', 65, 27, 120], ['Saudi Arabia', 'sa', 53, 21, 126], ['Uruguay', 'uy', 11, 2, 76]],
            'Group I' => [['France', 'fr', 2, 1, 27], ['Senegal', 'sn', 17, 17, 99], ['Iraq', 'iq', 58, 39, 139], ['Norway', 'no', 46, 2, 84]],
            'Group J' => [['Argentina', 'ar', 1, 1, 24], ['Algeria', 'dz', 43, 13, 103], ['Austria', 'at', 25, 10, 105], ['Jordan', 'jo', 71, 37, 152]],
            'Group K' => [['Portugal', 'pt', 6, 3, 43], ['DR Congo', 'cd', 63, 28, 133], ['Uzbekistan', 'uz', 62, 45, 119], ['Colombia', 'co', 14, 3, 54]],
            'Group L' => [['England', 'gb-eng', 4, 3, 27], ['Croatia', 'hr', 10, 3, 125], ['Ghana', 'gh', 61, 14, 89], ['Panama', 'pa', 44, 29, 150]],
        ];

        $teamInstances = [];
        $groupList = [];
        foreach ($groups as $groupName => $teams) {
            foreach ($teams as $t) {
                $localPath = "uploads/flags/" . strtolower(str_replace(' ', '_', $t[0])) . ".png";
                if (!File::exists(public_path($localPath))) {
                    $flagData = @file_get_contents("https://flagcdn.com/w160/{$t[1]}.png");
                    if ($flagData) {
                        File::ensureDirectoryExists(public_path('uploads/flags'));
                        File::put(public_path($localPath), $flagData);
                    }
                }
                $team = Team::create(['name' => $t[0], 'flag_url' => $localPath, 'group_name' => $groupName, 'coach' => 'Coach ' . $t[0], 'fifa_rank' => $t[2], 'highest_rank' => $t[3], 'lowest_rank' => $t[4]]);
                $teamInstances[$t[0]] = $team;
                $groupList[$groupName][] = $team;
                Standing::create(['team_id' => $team->id, 'group_name' => $groupName]);
                for ($i = 1; $i <= 3; $i++) {
                    Player::create(['team_id' => $team->id, 'name' => "Star $i ({$t[0]})", 'position' => 'Pro', 'number' => rand(1, 99)]);
                }
            }
        }

        // 3. Match Schedule (Group Stage)
        $matchDate = Carbon::create(2026, 6, 11, 18, 0, 0);
        foreach ($groupList as $groupName => $groupTeams) {
            $pairings = [[0,1], [2,3], [0,2], [1,3], [0,3], [1,2]];
            foreach ($pairings as $pair) {
                $this->createMatch($groupTeams[$pair[0]]->id, $groupTeams[$pair[1]]->id, $stadiums[rand(0, 15)], 'Group Stage', $groupName, $matchDate->copy()->addHours(rand(0, 200)), 'upcoming');
            }
        }

        // 4. Knockout Stage
        $stadiumsList = Stadium::all();
        $roundOf32 = [
            ['Runner-up Group A', 'Runner-up Group B'], ['Winner Group A', '3rd Group C/D/E/F/G/H/I/J'], ['Winner Group B', '3rd Group E/F/G/H/I/J/K/L'],
            ['Winner Group C', 'Runner-up Group F'], ['Winner Group F', 'Runner-up Group C'], ['Runner-up Group D', 'Runner-up Group E'],
            ['Winner Group D', '3rd Group A/B/C/E/F/G/H/I'], ['Winner Group E', '3rd Group A/B/C/D/F/G/H/J'], ['Winner Group I', 'Runner-up Group L'],
            ['Winner Group L', 'Runner-up Group I'], ['Runner-up Group G', 'Runner-up Group H'], ['Winner Group G', '3rd Group I/J/K/L/A/B/C/D'],
            ['Winner Group H', 'Runner-up Group J'], ['Winner Group J', 'Runner-up Group H'], ['Runner-up Group K', 'Runner-up Group L'],
            ['Winner Group K', '3rd Group G/H/I/J/K/L/A/B']
        ];
        foreach ($roundOf32 as $i => $pairing) {
            $this->createMatch(null, null, $stadiumsList[rand(0, 15)], 'Round of 32', 'Knockout', Carbon::create(2026, 6, 28, 18, 0, 0)->addDays($i/4), 'upcoming', $pairing[0], $pairing[1]);
        }

        $roundOf16 = [
            ['Winner Match 74', 'Winner Match 77'], ['Winner Match 73', 'Winner Match 75'], ['Winner Match 76', 'Winner Match 78'], ['Winner Match 79', 'Winner Match 80'],
            ['Winner Match 83', 'Winner Match 84'], ['Winner Match 81', 'Winner Match 82'], ['Winner Match 85', 'Winner Match 88'], ['Winner Match 86', 'Winner Match 87'],
        ];
        foreach ($roundOf16 as $i => $pairing) {
            $this->createMatch(null, null, $stadiumsList[rand(0, 15)], 'Round of 16', 'Knockout', Carbon::create(2026, 7, 4, 18, 0, 0)->addDays($i/3), 'upcoming', $pairing[0], $pairing[1]);
        }

        $quarterFinals = [
            ['Winner Match 89', 'Winner Match 90'], ['Winner Match 91', 'Winner Match 92'], ['Winner Match 93', 'Winner Match 94'], ['Winner Match 95', 'Winner Match 96'],
        ];
        foreach ($quarterFinals as $i => $pairing) {
            $this->createMatch(null, null, $stadiumsList[rand(0, 15)], 'Quarter-finals', 'Knockout', Carbon::create(2026, 7, 9, 18, 0, 0)->addDays($i/2), 'upcoming', $pairing[0], $pairing[1]);
        }

        $semiFinals = [
            ['Winner Match 97', 'Winner Match 98'], ['Winner Match 99', 'Winner Match 100'],
        ];
        foreach ($semiFinals as $i => $pairing) {
            $this->createMatch(null, null, $stadiumsList[rand(0, 15)], 'Semi-finals', 'Knockout', Carbon::create(2026, 7, 14, 18, 0, 0)->addDays($i*2), 'upcoming', $pairing[0], $pairing[1]);
        }

        $this->createMatch(null, null, $stadiumsList[rand(0, 15)], 'Third Place Match', 'Knockout', Carbon::create(2026, 7, 18, 18, 0, 0), 'upcoming', 'Loser Match 101', 'Loser Match 102');
        $this->createMatch(null, null, $stadiumsList[rand(0, 15)], 'Final', 'Knockout', Carbon::create(2026, 7, 19, 18, 0, 0), 'upcoming', 'Winner Match 101', 'Winner Match 102');

        // 5. Friendlies (Warm-up matches)
        $friendlyMatches = [
            ['Brazil', 'France', 0, '2026-06-01 20:00:00', 'finished', 2, 1],
            ['Argentina', 'Germany', 1, '2026-06-02 19:00:00', 'upcoming', 0, 0],
            ['England', 'Portugal', 4, '2026-06-03 18:30:00', 'upcoming', 0, 0],
            ['United States', 'Spain', 2, '2026-06-04 21:00:00', 'upcoming', 0, 0],
            ['Netherlands', 'Belgium', 3, '2026-06-05 20:00:00', 'upcoming', 0, 0],
            ['Japan', 'South Korea', 5, '2026-06-06 17:00:00', 'upcoming', 0, 0],
            ['Mexico', 'Canada', 15, '2026-06-07 19:30:00', 'upcoming', 0, 0],
            ['Uruguay', 'Croatia', 8, '2026-06-08 20:00:00', 'upcoming', 0, 0],
        ];

        foreach ($friendlyMatches as $fm) {
            $home = Team::where('name', $fm[0])->first();
            $away = Team::where('name', $fm[1])->first();
            if ($home && $away) {
                $m = $this->createMatch($home->id, $away->id, $stadiumsList[$fm[2]], 'Friendly', 'International', Carbon::parse($fm[3]), $fm[4], null, null, 'friendly');
                if ($fm[4] === 'finished') {
                    $m->update(['home_score' => $fm[5], 'away_score' => $fm[6]]);
                }
            }
        }

        // 6. Live Simulation
        $first = Game::where('match_type', 'tournament')->first();
        if ($first) {
            $first->update(['status' => 'live', 'match_date_utc' => Carbon::now(), 'home_score' => 1, 'away_score' => 0]);
        }
    }

    private function createMatch($homeId, $awayId, $stadium, $stage, $group, $date, $status, $homePlaceholder = null, $awayPlaceholder = null, $matchType = 'tournament')
    {
        return Game::create([
            'home_team_id' => $homeId,
            'away_team_id' => $awayId,
            'home_team_placeholder' => $homePlaceholder,
            'away_team_placeholder' => $awayPlaceholder,
            'stadium_id' => $stadium->id,
            'match_date_utc' => $date,
            'status' => $status,
            'match_type' => $matchType,
            'home_score' => 0,
            'away_score' => 0,
            'stage' => $stage,
            'group_name' => $group
        ]);
    }
}
