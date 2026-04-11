<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index()
    {
        try {
            $stadiums = Stadium::all();
            return response()->json([
                'success' => true,
                'data' => $stadiums
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $stadium = Stadium::with(['games.homeTeam', 'games.awayTeam'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $stadium
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Stadium not found'], 404);
        }
    }
}
