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
                $sorted = $groupTeams->sort(function($a, $b) {
                    if ($a->points != $b->points) return $b->points <=> $a->points;
                    if ($a->goal_difference != $b->goal_difference) return $b->goal_difference <=> $a->goal_difference;
                    if ($a->goals_for != $b->goals_for) return $b->goals_for <=> $a->goals_for;
                    return ($a->team->fifa_rank ?? 999) <=> ($b->team->fifa_rank ?? 999);
                })->values();
                
                if ($sorted->count() >= 3) {
                    $thirdPlacedTeams->push($sorted[2]);
                }
            }

            $thirdPlacedRankings = $thirdPlacedTeams->sort(function($a, $b) {
                if ($a->points != $b->points) return $b->points <=> $a->points;
                if ($a->goal_difference != $b->goal_difference) return $b->goal_difference <=> $a->goal_difference;
                if ($a->goals_for != $b->goals_for) return $b->goals_for <=> $a->goals_for;
                return ($a->team->fifa_rank ?? 999) <=> ($b->team->fifa_rank ?? 999);
            })->values();

            $formattedStandings = $allStandings->map(function($group, $key) {
                return [
                    'group_name' => $key,
                    'teams' => $group->sort(function($a, $b) {
                        if ($a->points != $b->points) return $b->points <=> $a->points;
                        if ($a->goal_difference != $b->goal_difference) return $b->goal_difference <=> $a->goal_difference;
                        if ($a->goals_for != $b->goals_for) return $b->goals_for <=> $a->goals_for;
                        return ($a->team->fifa_rank ?? 999) <=> ($b->team->fifa_rank ?? 999);
                    })->values()
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
