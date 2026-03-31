<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index()
    {
        return response()->json(Stadium::all());
    }

    public function show($id)
    {
        $stadium = Stadium::with('games.homeTeam', 'games.awayTeam')->findOrFail($id);
        return response()->json($stadium);
    }
}
