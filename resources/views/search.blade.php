@extends('layouts.app')

@section('title', 'Search Results' . ($q ? ' for "' . $q . '"' : ''))

@section('content')
<div class="max-w-4xl mx-auto space-y-12">
    <!-- Search Header -->
    <div class="text-center space-y-6">
        <h1 class="text-4xl font-black uppercase tracking-tighter">Search</h1>
        <form action="{{ route('search') }}" method="GET" class="relative max-w-xl mx-auto group">
            <input 
                type="text" 
                name="q" 
                value="{{ $q }}" 
                placeholder="Search teams, matches, or players..."
                class="w-full bg-white dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-800 rounded-3xl py-6 px-8 pr-16 font-bold focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none shadow-2xl shadow-slate-200/50 dark:shadow-none"
            >
            <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 p-3 bg-primary-500 text-white rounded-2xl shadow-lg shadow-primary-500/30 hover:scale-110 active:scale-95 transition-all">
                <i data-lucide="search" class="w-6 h-6"></i>
            </button>
        </form>
    </div>

    @if($results)
        <div class="space-y-16">
            <!-- Teams Results -->
            @if($results['teams']->count() > 0)
                <section class="space-y-6">
                    <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 flex items-center">
                        <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                        Teams ({{ $results['teams']->count() }})
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach($results['teams'] as $team)
                            <a href="{{ route('team-details', $team->id) }}" class="group bg-white dark:bg-slate-900/50 rounded-[2rem] p-6 border border-slate-100 dark:border-white/5 hover:border-primary-500 transition-all shadow-sm hover:shadow-xl hover:-translate-y-1 text-center">
                                <img src="{{ asset($team->flag_url) }}" class="w-16 h-10 object-cover rounded-lg mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform" alt="">
                                <span class="font-black block truncate">{{ $team->name }}</span>
                                <span class="text-[10px] text-slate-500 uppercase font-bold">{{ $team->group_name }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Players Results -->
            @if($results['players']->count() > 0)
                <section class="space-y-6">
                    <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 flex items-center">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i>
                        Players ({{ $results['players']->count() }})
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($results['players'] as $player)
                            <a href="{{ route('team-details', $player->team_id) }}" class="flex items-center justify-between p-6 bg-white dark:bg-slate-900/50 rounded-[2rem] border border-slate-100 dark:border-white/5 hover:border-primary-500 transition-all shadow-sm">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-black text-primary-500">
                                        {{ $player->number ?? '—' }}
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-black text-lg leading-tight">{{ $player->name }}</span>
                                        <span class="text-[10px] font-black uppercase text-slate-400">{{ $player->position }} • {{ $player->team->name }}</span>
                                    </div>
                                </div>
                                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-300"></i>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Matches Results -->
            @if($results['matches']->count() > 0)
                <section class="space-y-6">
                    <h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 flex items-center">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                        Matches ({{ $results['matches']->count() }})
                    </h2>
                    <div class="space-y-4">
                        @foreach($results['matches'] as $match)
                            <a href="{{ route('match-details', $match->slug . '-' . $match->id) }}" class="block p-6 bg-white dark:bg-slate-900/50 rounded-[2.5rem] border border-slate-100 dark:border-white/5 hover:border-primary-500 transition-all shadow-sm hover:shadow-xl">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-[10px] font-black uppercase text-primary-500 tracking-widest">{{ $match->stage }}</span>
                                    <span class="text-[10px] font-bold text-slate-400">{{ \Carbon\Carbon::parse($match->match_date_utc)->format('M d, Y') }}</span>
                                </div>
                                <div class="grid grid-cols-3 items-center text-center">
                                    <div class="flex flex-col items-center">
                                        <img src="{{ asset($match->homeTeam->flag_url ?? 'uploads/flags/default.png') }}" class="w-12 h-8 object-cover rounded shadow-sm mb-2" alt="">
                                        <span class="font-bold text-sm truncate w-full">{{ $match->homeTeam->name ?? $match->home_team_placeholder }}</span>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-2xl font-black">{{ $match->home_score }} - {{ $match->away_score }}</span>
                                        @if($match->status === 'live')
                                            <span class="text-[8px] font-black text-red-500 animate-pulse">LIVE</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <img src="{{ asset($match->awayTeam->flag_url ?? 'uploads/flags/default.png') }}" class="w-12 h-8 object-cover rounded shadow-sm mb-2" alt="">
                                        <span class="font-bold text-sm truncate w-full">{{ $match->awayTeam->name ?? $match->away_team_placeholder }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            @if($results['teams']->count() == 0 && $results['players']->count() == 0 && $results['matches']->count() == 0)
                <div class="py-20 text-center space-y-6">
                    <div class="w-24 h-24 bg-slate-100 dark:bg-slate-900 rounded-full flex items-center justify-center mx-auto">
                        <i data-lucide="search-x" class="w-12 h-12 text-slate-300"></i>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-2xl font-black">No Results Found</h3>
                        <p class="text-slate-500 max-w-sm mx-auto">We couldn't find anything matching "{{ $q }}". Try searching for a country name, player, or tournament stage.</p>
                    </div>
                    <a href="{{ route('home') }}" class="inline-flex px-8 py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20">
                        RETURN HOME
                    </a>
                </div>
            @endif
        </div>
    @else
        <div class="py-20 text-center space-y-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-2xl mx-auto">
                @php
                    $suggestions = ['Mexico', 'Argentina', 'Final', 'Group A'];
                @endphp
                @foreach($suggestions as $suggest)
                    <a href="{{ route('search', ['q' => $suggest]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-white/5 font-bold text-sm hover:border-primary-500 transition-all shadow-sm">
                        {{ $suggest }}
                    </a>
                @endforeach
            </div>
            <p class="text-slate-400 text-sm font-medium">Try searching for teams, venues, or specific match stages.</p>
        </div>
    @endif
</div>
@endsection
