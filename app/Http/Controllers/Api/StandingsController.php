<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Standing;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    public function index()
    {
        try {
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

            $formattedStandings = $allStandings->map(function($group, $key) {
                return [
                    'group_name' => $key,
                    'teams' => $group->sortByDesc('points')->sortByDesc('goal_difference')->values()
                ];
            })->values();

            return response()->json([
                'success' => true,
                'data' => [
                    'groups' => $formattedStandings,
                    'third_placed_rankings' => $thirdPlacedRankings
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
