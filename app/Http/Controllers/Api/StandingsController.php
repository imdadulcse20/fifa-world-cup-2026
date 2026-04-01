<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Standing;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    public function index()
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

        return response()->json([
            'standings' => $allStandings,
            'third_placed_rankings' => $thirdPlacedRankings
        ]);
    }
}
