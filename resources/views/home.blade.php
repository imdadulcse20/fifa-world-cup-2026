@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="space-y-8 max-w-lg mx-auto md:max-w-none pb-12">
    <!-- Live Matches -->
    <section>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold flex items-center space-x-2">
                <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                <span>Live Now</span>
            </h2>
        </div>
        
        @if($liveMatches->count() > 0)
            <div class="flex space-x-4 overflow-x-auto pb-4 snap-x no-scrollbar">
                @foreach($liveMatches as $match)
                    <div class="min-w-[300px] snap-center p-6 rounded-[2rem] glass dark:glass-dark border border-white/20 shadow-2xl relative overflow-hidden group cursor-pointer" 
                         onclick="window.location='{{ route('match-details', $match->id) }}'">
                        
                        <div class="absolute top-4 right-4 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full flex items-center space-x-1">
                            <i data-lucide="play" class="w-2 h-2 fill-current"></i>
                            <span>LIVE</span>
                        </div>
                        
                        <div class="flex justify-between items-center mb-6">
                            <div class="text-center flex-1">
                                @if($match->homeTeam)
                                    <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-12 h-8 object-cover rounded-md mb-2 shadow-sm" alt="">
                                    <span class="font-bold text-sm block truncate">{{ $match->homeTeam->name }}</span>
                                @else
                                    <div class="w-12 h-8 bg-slate-200 dark:bg-slate-800 rounded-md mb-2 flex items-center justify-center text-slate-400">
                                        <i data-lucide="users" class="w-4 h-4"></i>
                                    </div>
                                    <span class="font-bold text-[10px] block truncate text-slate-500 uppercase">{{ $match->home_team_placeholder }}</span>
                                @endif
                            </div>
                            <div class="px-4 flex flex-col items-center">
                                <div class="text-3xl font-black text-primary-500 flex items-center space-x-2">
                                    <span>{{ $match->home_score }}</span>
                                    <span class="text-slate-300 dark:text-slate-700">:</span>
                                    <span>{{ $match->away_score }}</span>
                                </div>
                                <span class="text-[10px] text-slate-500 font-bold mt-2 uppercase">{{ $match->stage }}</span>
                            </div>
                            <div class="text-center flex-1">
                                @if($match->awayTeam)
                                    <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-12 h-8 object-cover rounded-md mb-2 shadow-sm" alt="">
                                    <span class="font-bold text-sm block truncate">{{ $match->awayTeam->name }}</span>
                                @else
                                    <div class="w-12 h-8 bg-slate-200 dark:bg-slate-800 rounded-md mb-2 flex items-center justify-center text-slate-400">
                                        <i data-lucide="users" class="w-4 h-4"></i>
                                    </div>
                                    <span class="font-bold text-[10px] block truncate text-slate-500 uppercase">{{ $match->away_team_placeholder }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 text-slate-500 text-[10px] font-medium">
                            <i data-lucide="map-pin" class="w-3 h-3"></i>
                            <span>{{ $match->stadium->name }}, {{ $match->stadium->city }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-8 rounded-3xl glass dark:glass-dark text-center text-slate-500 italic">
                No matches currently live.
            </div>
        @endif
    </section>

    <!-- Quick Nav -->
    <section class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('schedule') }}" class="p-4 rounded-3xl bg-blue-500/10 border border-white/5 flex flex-col items-center justify-center space-y-2 hover:scale-105 transition-all">
            <div class="p-3 bg-white dark:bg-white/10 rounded-2xl shadow-sm text-blue-500">
                <i data-lucide="calendar"></i>
            </div>
            <span class="text-xs font-bold">Schedule</span>
        </a>
        <a href="{{ route('standings') }}" class="p-4 rounded-3xl bg-yellow-500/10 border border-white/5 flex flex-col items-center justify-center space-y-2 hover:scale-105 transition-all">
            <div class="p-3 bg-white dark:bg-white/10 rounded-2xl shadow-sm text-yellow-500">
                <i data-lucide="trophy"></i>
            </div>
            <span class="text-xs font-bold">Standings</span>
        </a>
        <a href="{{ route('teams') }}" class="p-4 rounded-3xl bg-green-500/10 border border-white/5 flex flex-col items-center justify-center space-y-2 hover:scale-105 transition-all">
            <div class="p-3 bg-white dark:bg-white/10 rounded-2xl shadow-sm text-green-500">
                <i data-lucide="users"></i>
            </div>
            <span class="text-xs font-bold">Teams</span>
        </a>
        <a href="{{ route('stadiums') }}" class="p-4 rounded-3xl bg-purple-500/10 border border-white/5 flex flex-col items-center justify-center space-y-2 hover:scale-105 transition-all">
            <div class="p-3 bg-white dark:bg-white/10 rounded-2xl shadow-sm text-purple-500">
                <i data-lucide="map-pin"></i>
            </div>
            <span class="text-xs font-bold">Stadiums</span>
        </a>
    </section>

    <!-- Upcoming Matches -->
    <section>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Upcoming Matches</h2>
            <a href="{{ route('schedule') }}" class="text-primary-500 text-sm font-semibold flex items-center">
                View All <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>
        <div class="space-y-4">
            @foreach($upcomingMatches as $match)
                <div class="flex items-center justify-between p-4 rounded-3xl glass dark:glass-dark border border-white/5 cursor-pointer hover:border-primary-500/30 transition-all"
                     onclick="window.location='{{ route('match-details', $match->id) }}'">
                    <div class="flex items-center space-x-4 flex-1">
                        @if($match->homeTeam)
                            <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                            <span class="font-bold text-sm truncate max-w-[80px]">{{ $match->homeTeam->name }}</span>
                        @else
                            <div class="w-8 h-5 bg-slate-200 dark:bg-slate-800 rounded flex items-center justify-center text-slate-400">
                                <i data-lucide="users" class="w-3 h-3"></i>
                            </div>
                            <span class="font-bold text-[10px] truncate max-w-[80px] text-slate-500 uppercase">{{ $match->home_team_placeholder }}</span>
                        @endif
                    </div>
                    
                    <div class="flex flex-col items-center px-4">
                        <span class="text-xs font-bold text-primary-500">
                            {{ \Carbon\Carbon::parse($match->match_date_utc)->format('H:i') }}
                        </span>
                        <span class="text-[10px] text-slate-500">{{ \Carbon\Carbon::parse($match->match_date_utc)->format('M d') }}</span>
                    </div>

                    <div class="flex items-center justify-end space-x-4 flex-1">
                        @if($match->awayTeam)
                            <span class="font-bold text-sm truncate max-w-[80px] text-right">{{ $match->awayTeam->name }}</span>
                            <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                        @else
                            <span class="font-bold text-[10px] truncate max-w-[80px] text-right text-slate-500 uppercase">{{ $match->away_team_placeholder }}</span>
                            <div class="w-8 h-5 bg-slate-200 dark:bg-slate-800 rounded flex items-center justify-center text-slate-400">
                                <i data-lucide="users" class="w-3 h-3"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
