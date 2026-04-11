<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Game::with(['homeTeam', 'awayTeam', 'stadium', 'matchEvents.team', 'matchEvents.player']);

            if ($request->has('team_id')) {
                $query->where(function($q) use ($request) {
                    $q->where('home_team_id', $request->team_id)
                      ->orWhere('away_team_id', $request->team_id);
                });
            }

            if ($request->has('status') && $request->status !== 'all') {
                $query->where('status', $request->status);
            }

            if ($request->has('match_type') && $request->match_type !== 'all') {
                $query->where('match_type', $request->match_type);
            }

            if ($request->has('stage') && $request->stage !== 'all') {
                if ($request->stage === 'Knockout') {
                    $query->where('stage', '!=', 'Group Stage');
                } else {
                    $query->where('stage', $request->stage);
                }
            }

            $matches = $query->orderBy('match_date_utc', 'asc')->get();

            return response()->json([
                'success' => true,
                'message' => 'Matches retrieved successfully',
                'meta' => [
                    'total' => $matches->count(),
                    'live_count' => $matches->where('status', 'live')->count(),
                    'finished_count' => $matches->where('status', 'finished')->count(),
                    'upcoming_count' => $matches->where('status', 'upcoming')->count(),
                ],
                'data' => $matches
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function schedule(Request $request)
    {
        try {
            $query = Game::with(['homeTeam', 'awayTeam', 'stadium', 'matchEvents.team', 'matchEvents.player']);

            if ($request->status && $request->status !== 'all') {
                $query->where('status', $request->status);
            }

            $allMatches = $query->orderBy('match_date_utc', 'asc')->get();
            
            $tournamentMatches = $allMatches->where('match_type', 'tournament')->groupBy(function($item) {
                return $item->stage === 'Group Stage' ? $item->group_name : $item->stage;
            })->map(function($group, $key) {
                return [
                    'stage_name' => $key,
                    'matches' => $group->values()
                ];
            })->values();

            $friendlyMatches = $allMatches->where('match_type', 'friendly')->values();

            return response()->json([
                'success' => true,
                'data' => [
                    'tournament' => $tournamentMatches,
                    'friendlies' => $friendlyMatches
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $game = Game::with([
                'homeTeam.players', 
                'awayTeam.players', 
                'stadium', 
                'matchEvents.player', 
                'matchEvents.team'
            ])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $game
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Match not found'], 404);
        }
    }
}
