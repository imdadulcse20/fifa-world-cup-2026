<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use App\Models\Stadium;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TournamentController extends Controller
{
    public function home()
    {
        $liveMatches = Game::with(['homeTeam', 'awayTeam', 'stadium'])->where('status', 'live')->get();
        
        $upcomingTournamentMatches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('status', 'upcoming')
            ->where('match_type', 'tournament')
            ->orderBy('match_date_utc', 'asc')
            ->get()
            ->groupBy(function($item) {
                return $item->stage === 'Group Stage' ? $item->group_name : $item->stage;
            })
            ->sortBy(function($matches, $key) {
                if (str_starts_with($key, 'Group')) {
                    return $key;
                }
                $weights = [
                    'Round of 32' => 'M1',
                    'Round of 16' => 'M2',
                    'Quarter-finals' => 'M3',
                    'Semi-finals' => 'M4',
                    'Third-place Match' => 'M5',
                    'Final' => 'M6',
                ];
                return $weights[$key] ?? 'ZZ';
            })
            ->flatten()
            ->take(5);

        $upcomingFriendlyMatches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('status', 'upcoming')
            ->where('match_type', 'friendly')
            ->orderBy('match_date_utc', 'asc')
            ->take(5)
            ->get();

        return view('home', compact('liveMatches', 'upcomingTournamentMatches', 'upcomingFriendlyMatches'));
    }

    public function schedule(Request $request)
    {
        $query = Game::with(['homeTeam', 'awayTeam', 'stadium']);

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->stage && $request->stage !== 'all') {
            if ($request->stage === 'Knockout') {
                $query->where('stage', '!=', 'Group Stage');
            } else {
                $query->where('stage', 'Group Stage');
            }
        }

        $allMatches = $query->orderBy('match_date_utc', 'asc')->get();
        
        $tournamentMatches = $allMatches->where('match_type', 'tournament')->groupBy(function($item) {
            return $item->stage === 'Group Stage' ? $item->group_name : $item->stage;
        })->sortBy(function($matches, $key) {
            // Assign weights for sorting
            if (str_starts_with($key, 'Group')) {
                return $key; // Group A, Group B etc will sort alphabetically
            }
            
            $weights = [
                'Round of 32' => 'M1',
                'Round of 16' => 'M2',
                'Quarter-finals' => 'M3',
                'Semi-finals' => 'M4',
                'Third-place Match' => 'M5',
                'Final' => 'M6',
            ];

            return $weights[$key] ?? 'ZZ';
        });

        $friendlyMatches = $allMatches->where('match_type', 'friendly')->groupBy(function($item) {
            return 'Friendly Matches';
        });

        return view('schedule', compact('tournamentMatches', 'friendlyMatches'));
    }

    public function matchDetails($slug_id)
    {
        // Extract ID from the end of the string (e.g. mexico-vs-south-africa-1)
        if (preg_match('/-([0-9]+)$/', $slug_id, $matches)) {
            $id = $matches[1];
            $slug = Str::beforeLast($slug_id, '-');
        } else {
            abort(404);
        }

        $match = Game::with(['homeTeam', 'awayTeam', 'stadium', 'matchEvents.player', 'matchEvents.team', 'stats', 'lineups.player', 'predictions'])->findOrFail($id);

        // Canonical redirect if slug is wrong
        if ($slug !== $match->slug) {
            return redirect()->route('match-details', ['slug_id' => $match->slug . '-' . $match->id]);
        }

        return view('match-details', compact('match'));
    }

    public function standings()
    {
        $allStandings = Standing::with('team')->get()->groupBy('group_name')->sortKeys();
        
        // Pre-sort all groups
        $allStandings = $allStandings->map(function($groupTeams) {
            return $groupTeams->sort(function($a, $b) {
                if ($a->points != $b->points) return $b->points <=> $a->points;
                if ($a->goal_difference != $b->goal_difference) return $b->goal_difference <=> $a->goal_difference;
                if ($a->goals_for != $b->goals_for) return $b->goals_for <=> $a->goals_for;
                return ($a->team->fifa_rank ?? 999) <=> ($b->team->fifa_rank ?? 999);
            })->values();
        });

        $thirdPlacedTeams = collect();

        foreach ($allStandings as $groupName => $groupTeams) {
            if ($groupTeams->count() >= 3) {
                $thirdPlacedTeams->push($groupTeams[2]);
            }
        }

        $thirdPlacedRankings = $thirdPlacedTeams->sort(function($a, $b) {
            if ($a->points != $b->points) return $b->points <=> $a->points;
            if ($a->goal_difference != $b->goal_difference) return $b->goal_difference <=> $a->goal_difference;
            if ($a->goals_for != $b->goals_for) return $b->goals_for <=> $a->goals_for;
            return ($a->team->fifa_rank ?? 999) <=> ($b->team->fifa_rank ?? 999);
        })->values();

        return view('standings', [
            'standings' => $allStandings,
            'thirdPlacedRankings' => $thirdPlacedRankings
        ]);
    }

    public function teams()
    {
        $teams = Team::all()->groupBy('group_name')->sortKeys();
        
        $sessionId = session()->getId();
        $userId = auth()->id();
        
        $favorites = \App\Models\FavoriteTeam::query();
        if ($userId) {
            $favorites->where('user_id', $userId);
        } else {
            $favorites->where('session_id', $sessionId);
        }
        
        $favoriteTeamIds = $favorites->pluck('team_id')->toArray();
        
        return view('teams', compact('teams', 'favoriteTeamIds'));
    }

    public function teamDetails($id)
    {
        $team = Team::with(['players', 'standing'])->findOrFail($id);
        $matches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('home_team_id', $id)
            ->orWhere('away_team_id', $id)
            ->orderBy('match_date_utc', 'asc')
            ->get();

        $sessionId = session()->getId();
        $userId = auth()->id();
        
        $isFavorited = \App\Models\FavoriteTeam::where('team_id', $id)
            ->where(function($q) use ($userId, $sessionId) {
                if ($userId) {
                    $q->where('user_id', $userId);
                } else {
                    $q->where('session_id', $sessionId);
                }
            })->exists();

        return view('team-details', compact('team', 'matches', 'isFavorited'));
    }

    public function stadiums()
    {
        $stadiums = Stadium::all();
        return view('stadiums', compact('stadiums'));
    }

    public function friendlies()
    {
        $matches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where('match_type', 'friendly')
            ->orderBy('match_date_utc', 'desc')
            ->get();
        return view('friendlies', compact('matches'));
    }

    public function settings()
    {
        return view('settings');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsConditions()
    {
        return view('terms-conditions');
    }

    public function contact()
    {
        return view('contact');
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        
        if (empty($q)) {
            return view('search', ['results' => null, 'q' => $q]);
        }

        $teams = Team::where('name', 'LIKE', "%{$q}%")->get();
        
        $matches = Game::with(['homeTeam', 'awayTeam', 'stadium'])
            ->where(function($query) use ($q) {
                $query->whereHas('homeTeam', function($sq) use ($q) {
                        $sq->where('name', 'LIKE', "%{$q}%");
                    })
                    ->orWhereHas('awayTeam', function($sq) use ($q) {
                        $sq->where('name', 'LIKE', "%{$q}%");
                    })
                    ->orWhere('stage', 'LIKE', "%{$q}%")
                    ->orWhere('group_name', 'LIKE', "%{$q}%")
                    ->orWhereHas('stadium', function($sq) use ($q) {
                        $sq->where('name', 'LIKE', "%{$q}%")->orWhere('city', 'LIKE', "%{$q}%");
                    });
            })
            ->get();

        $players = \App\Models\Player::with('team')
            ->where('name', 'LIKE', "%{$q}%")
            ->get();

        $results = [
            'teams' => $teams,
            'matches' => $matches,
            'players' => $players
        ];

        return view('search', compact('results', 'q'));
    }

    public function predict(Request $request, $id)
    {
        $request->validate([
            'choice' => 'required|in:home,draw,away'
        ]);

        $sessionId = session()->getId();

        \App\Models\Prediction::updateOrCreate(
            ['match_id' => $id, 'session_id' => $sessionId],
            ['choice' => $request->choice]
        );

        return back()->with('success', 'Thank you for your prediction!');
    }

    public function toggleFavorite(Request $request, $teamId)
    {
        $sessionId = session()->getId();
        $userId = auth()->id();

        $query = \App\Models\FavoriteTeam::where('team_id', $teamId);

        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->where('session_id', $sessionId);
        }

        $favorite = $query->first();

        if ($favorite) {
            $favorite->delete();
            $status = 'removed';
        } else {
            \App\Models\FavoriteTeam::create([
                'team_id' => $teamId,
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
            ]);
            $status = 'added';
        }

        if ($request->ajax()) {
            return response()->json(['status' => $status]);
        }

        return back()->with('success', "Team " . ($status === 'added' ? 'added to' : 'removed from') . " favorites!");
    }

    public function notifications()
    {
        if (!auth()->check()) {
            return response()->json([]);
        }

        $notifications = auth()->user()->unreadNotifications;
        return response()->json($notifications);
    }

    public function markNotificationsRead()
    {
        if (auth()->check()) {
            auth()->user()->unreadNotifications->markAsRead();
        }
        return response()->json(['status' => 'success']);
    }

    public function about()
    {
        return view('about');
    }
}
