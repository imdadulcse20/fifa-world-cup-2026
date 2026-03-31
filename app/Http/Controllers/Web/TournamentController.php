<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use App\Models\Stadium;
use App\Models\Standing;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function home()
    {
        $liveMatches = Game::with(['homeTeam', 'awayTeam', 'stadium'])->where('status', 'live')->get();
        $upcomingMatches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('status', 'upcoming')
            ->orderBy('match_date_utc', 'asc')
            ->take(5)
            ->get();

        return view('home', compact('liveMatches', 'upcomingMatches'));
    }

    public function schedule(Request $request)
    {
        $query = Game::with(['homeTeam', 'awayTeam', 'stadium']);

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->stage && $request->stage !== 'all') {
            if ($request->stage === 'Knockout') {
                $query->where('stage', '!=', 'Group Stage');
            } else {
                $query->where('stage', 'Group Stage');
            }
        }

        $allMatches = $query->orderBy('match_date_utc', 'asc')->get();
        
        $groupedMatches = $allMatches->groupBy(function($item) {
            return $item->stage === 'Group Stage' ? $item->group_name : $item->stage;
        });

        return view('schedule', compact('groupedMatches'));
    }

    public function matchDetails($id)
    {
        $match = Game::with(['homeTeam', 'awayTeam', 'stadium', 'matchEvents.player', 'matchEvents.team'])->findOrFail($id);
        return view('match-details', compact('match'));
    }

    public function standings()
    {
        $allStandings = Standing::with('team')->get()->groupBy('group_name');
        
        $thirdPlacedTeams = collect();

        foreach ($allStandings as $groupName => $groupTeams) {
            $sorted = $groupTeams->sortByDesc('points')
                ->sortByDesc('goal_difference')
                ->sortByDesc('goals_for')
                ->values();
            
            if ($sorted->count() >= 3) {
                $thirdPlacedTeams->push($sorted[2]);
            }
        }

        $thirdPlacedRankings = $thirdPlacedTeams->sortByDesc('points')
            ->sortByDesc('goal_difference')
            ->sortByDesc('goals_for')
            ->values();

        return view('standings', [
            'standings' => $allStandings,
            'thirdPlacedRankings' => $thirdPlacedRankings
        ]);
    }

    public function teams()
    {
        $teams = Team::all()->groupBy('group_name');
        return view('teams', compact('teams'));
    }

    public function teamDetails($id)
    {
        $team = Team::with(['players', 'standing'])->findOrFail($id);
        $matches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('home_team_id', $id)
            ->orWhere('away_team_id', $id)
            ->orderBy('match_date_utc', 'asc')
            ->get();

        return view('team-details', compact('team', 'matches'));
    }

    public function stadiums()
    {
        $stadiums = Stadium::all();
        return view('stadiums', compact('stadiums'));
    }

    public function settings()
    {
        return view('settings');
    }
}
