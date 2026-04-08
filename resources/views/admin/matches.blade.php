@extends('layouts.admin')

@section('title', 'Manage Matches')

@section('content')
<div class="space-y-8">
    <!-- Create Match Form & Filters -->
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex flex-wrap items-center gap-4">
                <!-- Type Filter -->
                <div class="flex p-1 bg-white dark:bg-slate-800 rounded-2xl w-fit shadow-sm border border-slate-100 dark:border-slate-700">
                    <a href="{{ route('admin.matches', request()->except('type')) }}" class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ !request('type') ? 'bg-primary-500 text-white shadow-lg shadow-primary-500/20' : 'text-slate-500 hover:text-primary-500' }}">
                        All
                    </a>
                    <a href="{{ route('admin.matches', array_merge(request()->query(), ['type' => 'tournament'])) }}" class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('type') === 'tournament' ? 'bg-primary-500 text-white shadow-lg shadow-primary-500/20' : 'text-slate-500 hover:text-primary-500' }}">
                        Tournament
                    </a>
                    <a href="{{ route('admin.matches', array_merge(request()->query(), ['type' => 'friendly'])) }}" class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('type') === 'friendly' ? 'bg-primary-500 text-white shadow-lg shadow-primary-500/20' : 'text-slate-500 hover:text-primary-500' }}">
                        Friendlies
                    </a>
                </div>

                <!-- Stage Filter -->
                <select onchange="window.location.href=this.value" class="bg-white dark:bg-slate-800 border-slate-100 dark:border-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest focus:ring-primary-500">
                    <option value="{{ route('admin.matches', request()->except('stage')) }}">All Stages</option>
                    @foreach($stages as $stage)
                        <option value="{{ route('admin.matches', array_merge(request()->query(), ['stage' => $stage])) }}" {{ request('stage') === $stage ? 'selected' : '' }}>
                            {{ $stage }}
                        </option>
                    @endforeach
                </select>

                <!-- Group Filter -->
                <select onchange="window.location.href=this.value" class="bg-white dark:bg-slate-800 border-slate-100 dark:border-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest focus:ring-primary-500">
                    <option value="{{ route('admin.matches', request()->except('group')) }}">All Groups</option>
                    @foreach($groups as $group)
                        <option value="{{ route('admin.matches', array_merge(request()->query(), ['group' => $group])) }}" {{ request('group') === $group ? 'selected' : '' }}>
                            {{ $group }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button onclick="document.getElementById('createMatchForm').classList.toggle('hidden')" class="px-8 py-3 bg-slate-900 dark:bg-slate-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:scale-105 transition-all flex items-center space-x-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add New Match</span>
            </button>
        </div>

        <div id="createMatchForm" class="hidden bg-white dark:bg-slate-800 rounded-[2rem] shadow-xl border border-slate-100 dark:border-slate-700 p-8 animate-in fade-in slide-in-from-top-4 duration-300">
            <h2 class="text-xl font-black mb-6">Create New Match</h2>
            <form action="{{ route('admin.matches.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @csrf
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Home Team</label>
                    <select name="home_team_id" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                        <option value="">Select Team</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Away Team</label>
                    <select name="away_team_id" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                        <option value="">Select Team</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Stadium</label>
                    <select name="stadium_id" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                        <option value="">Select Stadium</option>
                        @foreach($stadiums as $stadium)
                            <option value="{{ $stadium->id }}">{{ $stadium->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Date & Time (UTC)</label>
                    <input type="datetime-local" name="match_date_utc" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Stage</label>
                    <input type="text" name="stage" placeholder="e.g. Group Stage" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Group Name (if any)</label>
                    <input type="text" name="group_name" placeholder="e.g. Group A" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Type</label>
                    <select name="match_type" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                        <option value="tournament" {{ request('type') === 'tournament' ? 'selected' : '' }}>Tournament</option>
                        <option value="friendly" {{ request('type') === 'friendly' ? 'selected' : '' }}>Friendly</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Initial Status</label>
                    <select name="status" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                        <option value="upcoming">Upcoming</option>
                        <option value="live">Live</option>
                        <option value="finished">Finished</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Scraping URL</label>
                    <input type="url" name="scraping_url" placeholder="https://example.com/match" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black uppercase text-slate-500 ml-2">External Match ID</label>
                    <input type="text" name="external_match_id" placeholder="Match ID from website" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                </div>
                <div class="md:col-span-3 lg:col-span-4 pt-4">
                    <button type="submit" class="px-12 py-4 bg-primary-500 text-white rounded-xl font-black text-xs uppercase tracking-widest shadow-lg shadow-primary-500/20 hover:scale-[1.02] transition-all">
                        Create Match
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Matches Table -->
    <div class="bg-white dark:bg-slate-800 rounded-[2rem] shadow-xl border border-slate-100 dark:border-slate-700 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 dark:bg-slate-900/50 text-[10px] font-black uppercase tracking-widest text-slate-500">
                <tr>
                    <th class="px-8 py-5">Match Info</th>
                    <th class="px-8 py-5 text-center">Home</th>
                    <th class="px-8 py-5 text-center">Score</th>
                    <th class="px-8 py-5 text-center">Away</th>
                    <th class="px-8 py-5">Status</th>
                    <th class="px-8 py-5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @foreach($matches as $match)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/20 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <div class="flex items-center space-x-2">
                                    <span class="font-black text-slate-900 dark:text-slate-100">{{ $match->stage ?: 'Match' }}</span>
                                    @if($match->group_name)
                                        <span class="text-[8px] font-bold text-slate-400">({{ $match->group_name }})</span>
                                    @endif
                                    <span class="text-[8px] px-1.5 py-0.5 rounded-md font-black uppercase {{ $match->match_type === 'friendly' ? 'bg-purple-500/10 text-purple-500' : 'bg-blue-500/10 text-blue-500' }}">
                                        {{ $match->match_type }}
                                    </span>
                                </div>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($match->match_date_utc)->format('M d, H:i') }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            @if($match->homeTeam)
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-10 h-6 object-cover rounded shadow-sm" alt="">
                                    <span class="font-bold text-xs">{{ $match->homeTeam->name }}</span>
                                </div>
                            @else
                                <div class="text-center italic text-slate-400 text-xs">{{ $match->home_team_placeholder }}</div>
                            @endif
                        </td>
                        <form action="{{ route('admin.matches.update', $match->id) }}" method="POST">
                            @csrf
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-center space-x-2">
                                    <input type="number" name="home_score" value="{{ $match->home_score }}" class="w-12 h-10 bg-slate-100 dark:bg-slate-900 border-none rounded-xl text-center font-black text-lg focus:ring-2 focus:ring-primary-500">
                                    <span class="font-black text-slate-300">:</span>
                                    <input type="number" name="away_score" value="{{ $match->away_score }}" class="w-12 h-10 bg-slate-100 dark:bg-slate-900 border-none rounded-xl text-center font-black text-lg focus:ring-2 focus:ring-primary-500">
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @if($match->awayTeam)
                                    <div class="flex flex-col items-center space-y-2">
                                        <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-10 h-6 object-cover rounded shadow-sm" alt="">
                                        <span class="font-bold text-xs">{{ $match->awayTeam->name }}</span>
                                    </div>
                                @else
                                    <div class="text-center italic text-slate-400 text-xs">{{ $match->away_team_placeholder }}</div>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <select name="status" class="bg-slate-100 dark:bg-slate-900 border-none rounded-xl text-[10px] font-black uppercase tracking-widest focus:ring-2 focus:ring-primary-500">
                                    <option value="upcoming" {{ $match->status === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="live" {{ $match->status === 'live' ? 'selected' : '' }}>Live</option>
                                    <option value="finished" {{ $match->status === 'finished' ? 'selected' : '' }}>Finished</option>
                                </select>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end space-x-3">
                                    <button type="button" onclick="document.getElementById('scraping-{{ $match->id }}').classList.toggle('hidden')" class="p-2 {{ $match->is_scraping_active ? 'text-primary-500' : 'text-slate-400' }} hover:text-primary-500 transition-colors" title="Scraping Configuration">
                                        <i data-lucide="settings-2" class="w-5 h-5"></i>
                                    </button>
                                    <a href="{{ route('admin.matches.events', $match->id) }}" class="p-2 text-slate-400 hover:text-primary-500 transition-colors" title="Manage Goal Scorers & Events">
                                        <i data-lucide="list-plus" class="w-5 h-5"></i>
                                    </a>
                                    <button type="submit" class="px-6 py-2 bg-primary-500 text-white rounded-xl font-black text-[10px] uppercase tracking-widest shadow-lg shadow-primary-500/20 hover:scale-105 transition-all">
                                        Update
                                    </button>
                                </div>
                            </td>
                        </form>
                    </tr>
                    <tr id="scraping-{{ $match->id }}" class="hidden bg-slate-50/50 dark:bg-slate-900/40">
                        <td colspan="6" class="px-8 py-4">
                            <form action="{{ route('admin.matches.update', $match->id) }}" method="POST">
                                @csrf
                                <div class="flex flex-wrap items-end gap-6">
                                    <div class="space-y-1 flex-1 min-w-[300px]">
                                        <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Scraping URL</label>
                                        <input type="url" name="scraping_url" value="{{ $match->scraping_url }}" placeholder="https://example.com/match" class="w-full bg-white dark:bg-slate-800 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                                    </div>
                                    <div class="space-y-1 w-48">
                                        <label class="text-[10px] font-black uppercase text-slate-500 ml-2">External Match ID</label>
                                        <input type="text" name="external_match_id" value="{{ $match->external_match_id }}" placeholder="ID" class="w-full bg-white dark:bg-slate-800 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                                    </div>
                                    <div class="flex items-center space-x-3 pb-3">
                                        <input type="checkbox" name="is_scraping_active" id="active-{{ $match->id }}" {{ $match->is_scraping_active ? 'checked' : '' }} class="w-5 h-5 rounded border-slate-300 text-primary-500 focus:ring-primary-500">
                                        <label for="active-{{ $match->id }}" class="text-[10px] font-black uppercase text-slate-500">Active Scraping</label>
                                    </div>
                                    <div class="pb-1">
                                        <button type="submit" class="px-6 py-2 bg-slate-900 dark:bg-slate-700 text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:scale-105 transition-all">
                                            Save Config
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-8 bg-slate-50 dark:bg-slate-900/50">
            {{ $matches->links() }}
        </div>
    </div>
</div>
@endsection
