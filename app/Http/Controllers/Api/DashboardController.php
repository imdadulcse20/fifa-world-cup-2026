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
            $live = Game::with(['homeTeam', 'awayTeam', 'stadium'])->where('status', 'live')->get();
            $upcomingToday = Game::with(['homeTeam', 'awayTeam', 'stadium'])
                ->where('status', 'upcoming')
                ->orderBy('match_date_utc', 'asc')
                ->take(5)
                ->get();

            return response()->json([
                'live_matches' => $live,
                'upcoming_matches' => $upcomingToday,
                'stats' => [
                    'total_teams' => \App\Models\Team::count(),
                    'total_stadiums' => \App\Models\Stadium::count(),
                    'total_matches' => Game::count(),
                    'finished_matches' => Game::where('status', 'finished')->count(),
                ],
                'settings' => \App\Models\Setting::all()->pluck('value', 'key'),
            ]);
        } catch (\Exception $e) {
            Log::error("Dashboard Error: " . $e->getMessage());
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
