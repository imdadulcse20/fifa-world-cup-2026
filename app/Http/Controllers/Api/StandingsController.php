<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Standing;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    public function index()
    {
        $standings = Standing::with('team')->get()->groupBy('group_name');
        return response()->json($standings);
    }
}
