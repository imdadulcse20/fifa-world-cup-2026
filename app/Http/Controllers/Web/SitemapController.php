<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $matches = Game::all();
        $teams = Team::all();

        return response()->view('sitemap', [
            'matches' => $matches,
            'teams' => $teams,
        ])->header('Content-Type', 'text/xml');
    }
}
