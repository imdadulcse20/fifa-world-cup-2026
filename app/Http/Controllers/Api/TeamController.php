<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        try {
            $teams = Team::with(['standing', 'players'])->get()->groupBy('group_name')->map(function($group, $key) {
                return [
                    'group_name' => $key,
                    'teams' => $group->values()
                ];
            })->values();

            return response()->json([
                'success' => true,
                'data' => $teams
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $team = Team::with(['players', 'standing'])->findOrFail($id);
            
            $matches = \App\Models\Game::with(['homeTeam', 'awayTeam', 'stadium'])
                ->where('home_team_id', $id)
                ->orWhere('away_team_id', $id)
                ->orderBy('match_date_utc', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'team' => $team,
                    'matches' => $matches
                ]
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Team not found'], 404);
        }
    }
}
