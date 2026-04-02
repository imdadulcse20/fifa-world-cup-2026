@extends('layouts.app')

@section('title', '2026 World Cup Live Scores, Schedule & Standings')
@section('meta_description', 'Stay updated with the 2026 World Cup. Get live scores, match schedules, group standings, and stadium information in one place.')

@section('content')
<div class="space-y-8 max-w-lg mx-auto md:max-w-none pb-12">
    <!-- Hero/Welcome Section -->
    <section class="text-center py-6">
        <h1 class="text-4xl md:text-6xl font-black mb-4 bg-gradient-to-r from-primary-500 to-purple-500 bg-clip-text text-transparent">
            FIFA World Cup 2026
        </h1>
        <p class="text-slate-500 dark:text-slate-400 max-w-2xl mx-auto font-medium text-sm md:text-base">
            Your ultimate destination for live updates, scores, and schedules from the biggest football tournament on Earth.
        </p>
    </section>

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
                         onclick="window.location='{{ route('match-details', ['id' => $match->id, 'slug' => $match->slug]) }}'">
                        
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
                     onclick="window.location='{{ route('match-details', ['id' => $match->id, 'slug' => $match->slug]) }}'">
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

    <!-- FAQ Section -->
    <section class="max-w-3xl mx-auto py-12">
        <h2 class="text-3xl font-black mb-8 text-center">Frequently Asked Questions</h2>
        <div class="space-y-4" x-data="{ selected: 1 }">
            <div class="rounded-3xl glass dark:glass-dark border border-white/5 overflow-hidden">
                <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-white/5 transition-colors">
                    <span class="font-bold">When does the 2026 World Cup start?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 transition-transform" :class="selected === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 1" x-collapse class="px-8 pb-6 text-slate-500 text-sm leading-relaxed">
                    The FIFA World Cup 2026 is scheduled to take place from June to July 2026, hosted jointly by Canada, Mexico, and the United States.
                </div>
            </div>

            <div class="rounded-3xl glass dark:glass-dark border border-white/5 overflow-hidden">
                <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-white/5 transition-colors">
                    <span class="font-bold">How many teams are participating?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 transition-transform" :class="selected === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 2" x-collapse class="px-8 pb-6 text-slate-500 text-sm leading-relaxed">
                    The 2026 edition will be the first to feature 48 teams, expanded from the previous 32-team format, providing more opportunities for nations worldwide to compete.
                </div>
            </div>

            <div class="rounded-3xl glass dark:glass-dark border border-white/5 overflow-hidden">
                <button @click="selected !== 3 ? selected = 3 : selected = null" class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-white/5 transition-colors">
                    <span class="font-bold">Where can I see the full schedule?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 transition-transform" :class="selected === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 3" x-collapse class="px-8 pb-6 text-slate-500 text-sm leading-relaxed">
                    You can view the complete match schedule, including dates, times, and venues, on our <a href="{{ route('schedule') }}" class="text-primary-500 font-bold underline">Schedule Page</a>.
                </div>
            </div>

            <div class="rounded-3xl glass dark:glass-dark border border-white/5 overflow-hidden">
                <button @click="selected !== 4 ? selected = 4 : selected = null" class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-white/5 transition-colors">
                    <span class="font-bold">How are the standings calculated?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 transition-transform" :class="selected === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 4" x-collapse class="px-8 pb-6 text-slate-500 text-sm leading-relaxed">
                    Teams earn 3 points for a win, 1 point for a draw, and 0 points for a loss. Tie-breakers include goal difference, goals scored, and head-to-head results.
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
