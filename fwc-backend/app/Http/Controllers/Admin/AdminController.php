<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use App\Models\Standing;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_matches' => Game::count(),
            'live_matches' => Game::where('status', 'live')->count(),
            'finished_matches' => Game::where('status', 'finished')->count(),
            'total_teams' => Team::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function matches()
    {
        $matches = Game::with(['homeTeam', 'awayTeam'])->orderBy('match_date_utc', 'asc')->paginate(20);
        return view('admin.matches', compact('matches'));
    }

    public function updateMatch(Request $request, $id)
    {
        $match = Game::findOrFail($id);
        $oldStatus = $match->status;

        $match->update($request->only(['home_score', 'away_score', 'status']));

        // Trigger Standing Update if match is finished
        if ($match->status === 'finished') {
            $this->updateStandings($match);
        }

        return back()->with('success', 'Match updated successfully!');
    }

    public function settings()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Settings updated successfully!');
    }

    private function updateStandings($match)
    {
        // Simple logic: Reset and Recalculate for the two teams
        // In a production app, we'd recalculate the whole group to be safe
        $this->syncTeamStanding($match->home_team_id);
        $this->syncTeamStanding($match->away_team_id);
    }

    private function syncTeamStanding($teamId)
    {
        $team = Team::find($teamId);
        $matches = Game::where('status', 'finished')
            ->where(function($q) use ($teamId) {
                $q->where('home_team_id', $teamId)->orWhere('away_team_id', $teamId);
            })->get();

        $stats = [
            'played' => 0, 'won' => 0, 'drawn' => 0, 'lost' => 0,
            'goals_for' => 0, 'goals_against' => 0, 'points' => 0
        ];

        foreach ($matches as $m) {
            $stats['played']++;
            $isHome = $m->home_team_id == $teamId;
            $teamScore = $isHome ? $m->home_score : $m->away_score;
            $oppScore = $isHome ? $m->away_score : $m->home_score;

            $stats['goals_for'] += $teamScore;
            $stats['goals_against'] += $oppScore;

            if ($teamScore > $oppScore) {
                $stats['won']++;
                $stats['points'] += 3;
            } elseif ($teamScore == $oppScore) {
                $stats['drawn']++;
                $stats['points'] += 1;
            } else {
                $stats['lost']++;
            }
        }

        Standing::updateOrCreate(
            ['team_id' => $teamId],
            array_merge($stats, [
                'group_name' => $team->group_name,
                'goal_difference' => $stats['goals_for'] - $stats['goals_against']
            ])
        );
    }
}
