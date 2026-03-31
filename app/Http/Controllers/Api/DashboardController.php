<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $live = Game::with(['homeTeam', 'awayTeam', 'stadium'])->where('status', 'live')->get();
        $upcomingToday = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('status', 'upcoming')
            ->orderBy('match_date_utc', 'asc')
            ->take(5)
            ->get();

        return response()->json([
            'live_matches' => $live,
            'upcoming_matches' => $upcomingToday,
            'trending' => $upcomingToday->take(2), // placeholder for trending
        ]);
    }
}
