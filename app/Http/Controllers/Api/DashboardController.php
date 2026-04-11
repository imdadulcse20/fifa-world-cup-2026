<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $live = Game::with(['homeTeam', 'awayTeam', 'stadium', 'matchEvents.team', 'matchEvents.player'])->where('status', 'live')->get();
            
            $upcomingTournament = Game::with(['homeTeam', 'awayTeam', 'stadium'])
                ->where('status', 'upcoming')
                ->where('match_type', 'tournament')
                ->orderBy('match_date_utc', 'asc')
                ->take(5)
                ->get();

            $upcomingFriendly = Game::with(['homeTeam', 'awayTeam', 'stadium'])
                ->where('status', 'upcoming')
                ->where('match_type', 'friendly')
                ->orderBy('match_date_utc', 'asc')
                ->take(5)
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'live_matches' => $live,
                    'upcoming_tournament_matches' => $upcomingTournament,
                    'upcoming_friendly_matches' => $upcomingFriendly,
                    'stats' => [
                        'total_teams' => \App\Models\Team::count(),
                        'total_stadiums' => \App\Models\Stadium::count(),
                        'total_matches' => Game::count(),
                        'finished_matches' => Game::where('status', 'finished')->count(),
                    ],
                    'settings' => \App\Models\Setting::all()->pluck('value', 'key'),
                ]
            ]);
        } catch (\Exception $e) {
            Log::error("Dashboard Error: " . $e->getMessage());
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
