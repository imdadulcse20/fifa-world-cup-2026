@extends('layouts.admin')

@section('title', 'Manage Matches')

@section('content')
<div class="space-y-8">
    <!-- Create Match Form -->
    <div class="bg-white dark:bg-slate-800 rounded-[2rem] shadow-xl border border-slate-100 dark:border-slate-700 p-8">
        <h2 class="text-xl font-black mb-6">Create New Match</h2>
        <form action="{{ route('admin.matches.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
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
                <label class="text-[10px] font-black uppercase text-slate-500 ml-2">Type</label>
                <select name="match_type" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                    <option value="tournament">Tournament</option>
                    <option value="friendly">Friendly</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full h-[42px] bg-primary-500 text-white rounded-xl font-black text-[10px] uppercase tracking-widest shadow-lg shadow-primary-500/20 hover:scale-105 transition-all">
                    Create Match
                </button>
            </div>
        </form>
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
                @endforeach
            </tbody>
        </table>
        <div class="p-8 bg-slate-50 dark:bg-slate-900/50">
            {{ $matches->links() }}
        </div>
    </div>
</div>
@endsection
