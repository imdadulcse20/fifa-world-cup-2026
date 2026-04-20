<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use App\Models\Standing;
use App\Models\Setting;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function faqs()
    {
        $faqs = Faq::orderBy('page')->orderBy('sort_order')->get();
        $pages = [
            'home' => 'Home',
            'schedule' => 'Matches/Schedule',
            'match-details' => 'Match Details',
            'standings' => 'Standings',
            'teams' => 'Teams',
            'team-details' => 'Team Details',
            'stadiums' => 'Stadiums',
            'friendlies' => 'Friendlies',
            'settings' => 'Settings',
        ];
        return view('admin.faqs', compact('faqs', 'pages'));
    }

    public function storeFaq(Request $request)
    {
        $request->validate([
            'page' => 'required|string',
            'question' => 'required|string',
            'answer' => 'required|string',
            'sort_order' => 'integer'
        ]);

        Faq::create($request->all());

        return back()->with('success', 'FAQ created successfully!');
    }

    public function updateFaq(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        
        $request->validate([
            'page' => 'required|string',
            'question' => 'required|string',
            'answer' => 'required|string',
            'sort_order' => 'integer'
        ]);

        $faq->update($request->all());

        return back()->with('success', 'FAQ updated successfully!');
    }

    public function deleteFaq($id)
    {
        Faq::findOrFail($id)->delete();
        return back()->with('success', 'FAQ deleted successfully!');
    }

    public function dashboard()
    {
        if (auth()->user()->role === 'faq_manager') {
            return redirect()->route('admin.faqs');
        }

        $stats = [
            'total_matches' => Game::count(),
            'live_matches' => Game::where('status', 'live')->count(),
            'finished_matches' => Game::where('status', 'finished')->count(),
            'total_teams' => Team::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function matches(Request $request)
    {
        $query = Game::with(['homeTeam', 'awayTeam'])->orderBy('match_date_utc', 'asc');
        
        if ($request->filled('type')) {
            $query->where('match_type', $request->type);
        }

        if ($request->filled('stage')) {
            $query->where('stage', $request->stage);
        }

        if ($request->filled('group')) {
            $query->where('group_name', $request->group);
        }
        
        $matches = $query->paginate(20)->withQueryString();
        
        $teams = Team::orderBy('name')->get();
        $stadiums = \App\Models\Stadium::orderBy('name')->get();
        
        $stages = Game::distinct()->whereNotNull('stage')->pluck('stage');
        $groups = Team::distinct()->whereNotNull('group_name')->pluck('group_name');

        return view('admin.matches', compact('matches', 'teams', 'stadiums', 'stages', 'groups'));
    }

    public function storeMatch(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'stadium_id' => 'required|exists:stadiums,id',
            'match_date_utc' => 'required|date',
            'match_type' => 'required|in:tournament,friendly',
            'status' => 'required|in:upcoming,live,finished',
            'scraping_url' => 'nullable|url',
            'external_match_id' => 'nullable|string'
        ]);

        Game::create($request->all());

        return back()->with('success', 'Match created successfully!');
    }

    public function updateMatch(Request $request, $id)
    {
        $match = Game::findOrFail($id);
        
        $data = $request->only(['home_score', 'away_score', 'status', 'external_match_id', 'scraping_url']);
        $data['is_scraping_active'] = $request->has('is_scraping_active');

        $match->update($data);

        return back()->with('success', 'Match updated successfully!');
    }

    public function matchEvents($id)
    {
        $match = Game::with(['homeTeam.players', 'awayTeam.players', 'matchEvents.player', 'matchEvents.team'])->findOrFail($id);
        return view('admin.match-events', compact('match'));
    }

    public function storeMatchEvent(Request $request, $id)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'player_id' => 'required|exists:players,id',
            'minute' => 'required|integer|min:1|max:120',
            'type' => 'required|in:goal,yellow_card,red_card,substitution'
        ]);

        \App\Models\MatchEvent::create([
            'match_id' => $id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'minute' => $request->minute,
            'type' => $request->type,
        ]);

        return back()->with('success', 'Event added successfully!');
    }

    public function deleteMatchEvent($id)
    {
        \App\Models\MatchEvent::findOrFail($id)->delete();
        return back()->with('success', 'Event deleted successfully!');
    }

    public function settings()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except(['_token', 'primary_color_text']);
        
        // Ensure primary_color is saved correctly if primary_color_text was used for display
        if ($request->has('primary_color_text')) {
            $data['primary_color'] = $request->primary_color_text;
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Settings updated successfully!');
    }

    public function standings()
    {
        $groups = Standing::with('team')->get()->groupBy('group_name')->sortKeys();
        return view('admin.standings', compact('groups'));
    }

    public function recalculateStandings()
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            // Use the centralized method from Game model
            Game::syncTeamStanding($team->id);
        }
        return back()->with('success', 'Point table recalculated successfully!');
    }
}
