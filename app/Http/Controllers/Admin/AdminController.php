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
        $teams = Team::orderBy('name')->get();
        $stadiums = \App\Models\Stadium::orderBy('name')->get();
        return view('admin.matches', compact('matches', 'teams', 'stadiums'));
    }

    public function storeMatch(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'stadium_id' => 'required|exists:stadiums,id',
            'match_date_utc' => 'required|date',
            'match_type' => 'required|in:tournament,friendly',
            'status' => 'required|in:upcoming,live,finished'
        ]);

        Game::create($request->all());

        return back()->with('success', 'Match created successfully!');
    }

    public function updateMatch(Request $request, $id)
    {
        $match = Game::findOrFail($id);
        $match->update($request->only(['home_score', 'away_score', 'status']));

        if ($match->status === 'finished') {
            $this->updateStandings($match);
        }

        return back()->with('success', 'Match updated successfully!');
    }

    public function matchEvents($id)
    {
        $match = Game::with(['homeTeam.players', 'awayTeam.players', 'matchEvents.player', 'matchEvents.team'])->findOrFail($id);
        return view('admin.match-events', compact('match'));
    }

    public function storeMatchEvent(Request $request, $id)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'player_id' => 'required|exists:players,id',
            'minute' => 'required|integer|min:1|max:120',
            'type' => 'required|in:goal,yellow_card,red_card,substitution'
        ]);

        \App\Models\MatchEvent::create([
            'match_id' => $id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'minute' => $request->minute,
            'type' => $request->type,
        ]);

        return back()->with('success', 'Event added successfully!');
    }

    public function deleteMatchEvent($id)
    {
        \App\Models\MatchEvent::findOrFail($id)->delete();
        return back()->with('success', 'Event deleted successfully!');
    }

    public function settings()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except(['_token', 'primary_color_text']);
        
        // Ensure primary_color is saved correctly if primary_color_text was used for display
        if ($request->has('primary_color_text')) {
            $data['primary_color'] = $request->primary_color_text;
        }

        foreach ($data as $key => $value) {
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
