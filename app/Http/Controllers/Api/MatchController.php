<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::with(['homeTeam', 'awayTeam', 'stadium']);

        if ($request->has('team_id')) {
            $query->where(function($q) use ($request) {
                $q->where('home_team_id', $request->team_id)
                  ->orWhere('away_team_id', $request->team_id);
            });
        }

        if ($request->has('group_name')) {
            $query->where('group_name', $request->group_name);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return response()->json($query->orderBy('match_date_utc', 'asc')->get());
    }

    public function show($id)
    {
        $game = Game::with(['homeTeam', 'awayTeam', 'stadium', 'matchEvents.player', 'matchEvents.team'])->findOrFail($id);
        return response()->json($game);
    }
}
