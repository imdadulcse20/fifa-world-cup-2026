@extends('layouts.app')

@section('title', ($match->homeTeam ? $match->homeTeam->name : $match->home_team_placeholder) . ' vs ' . ($match->awayTeam ? $match->awayTeam->name : $match->away_team_placeholder) . ' - Match Details')
@section('meta_description', 'Get live scores, events, and details for ' . ($match->homeTeam ? $match->homeTeam->name : $match->home_team_placeholder) . ' vs ' . ($match->awayTeam ? $match->awayTeam->name : $match->away_team_placeholder) . '. Stadium: ' . $match->stadium->name . '.')

@section('content')
<div class="max-w-4xl mx-auto space-y-8 pb-20">
    <!-- SEO H1 -->
    <h1 class="sr-only">{{ ($match->homeTeam ? $match->homeTeam->name : $match->home_team_placeholder) }} vs {{ ($match->awayTeam ? $match->awayTeam->name : $match->away_team_placeholder) }} - FIFA World Cup 2026 Match Details</h1>

    <a href="{{ url()->previous() }}" class="inline-flex p-2 rounded-xl glass dark:glass-dark text-slate-500 hover:text-primary-500 transition-colors">
        <i data-lucide="arrow-left"></i>
    </a>

    <!-- Scoreboard -->
    <div class="p-10 rounded-[3rem] glass dark:glass-dark border border-white/20 shadow-2xl overflow-hidden relative">
        <div class="flex justify-between items-center mb-8">
            <span class="text-xs font-black uppercase tracking-widest text-primary-500">{{ $match->stage }} • {{ $match->group_name }}</span>
            @if($match->status === 'live')
                <div class="flex items-center space-x-2 bg-red-500 text-white px-3 py-1 rounded-full text-[10px] font-bold animate-pulse">
                    <i data-lucide="play" class="w-3 h-3 fill-current"></i>
                    <span>LIVE</span>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-3 items-center">
            <div class="flex flex-col items-center space-y-4">
                @if($match->homeTeam)
                    <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-24 h-16 md:w-32 md:h-20 object-cover rounded-2xl shadow-2xl mb-4" alt="{{ $match->homeTeam->name }} flag">
                    <span class="text-xl md:text-3xl font-black text-center">{{ $match->homeTeam->name }}</span>
                @else
                    <div class="w-24 h-16 md:w-32 md:h-20 bg-slate-200 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-slate-400 mb-4 shadow-2xl">
                        <i data-lucide="users" class="w-12 h-12"></i>
                    </div>
                    <span class="text-lg md:text-xl font-black text-center text-slate-500 uppercase">{{ $match->home_team_placeholder }}</span>
                @endif
            </div>

            <div class="flex flex-col items-center">
                <div class="text-6xl md:text-8xl font-black flex items-center space-x-4 live-score-box">
                    <span class="home-score">{{ $match->home_score }}</span>
                    <span class="text-slate-300 dark:text-slate-800">:</span>
                    <span class="away-score">{{ $match->away_score }}</span>
                </div>
                <div class="flex items-center space-x-2 mt-4">
                    <span class="text-xs font-bold text-slate-500 uppercase">Match {{ $match->status }}</span>
                    @if($match->match_time)
                        <span class="text-xs font-black text-primary-500 bg-primary-500/10 px-2 py-0.5 rounded-full match-time-display">{{ $match->match_time }}</span>
                    @endif
                </div>
            </div>

            <div class="flex flex-col items-center space-y-4">
                @if($match->awayTeam)
                    <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-24 h-16 md:w-32 md:h-20 object-cover rounded-2xl shadow-2xl mb-4" alt="{{ $match->awayTeam->name }} flag">
                    <span class="text-xl md:text-3xl font-black text-center">{{ $match->awayTeam->name }}</span>
                @else
                    <div class="w-24 h-16 md:w-32 md:h-20 bg-slate-200 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-slate-400 mb-4 shadow-2xl">
                        <i data-lucide="users" class="w-12 h-12"></i>
                    </div>
                    <span class="text-lg md:text-xl font-black text-center text-slate-500 uppercase">{{ $match->away_team_placeholder }}</span>
                @endif
            </div>
        </div>

        <div class="mt-12 flex flex-col md:flex-row justify-center gap-8 pt-8 border-t border-white/5 text-sm text-slate-500 font-medium">
            <div class="flex items-center space-x-3 bg-white/5 p-4 rounded-2xl">
                <i data-lucide="clock" class="w-6 h-6 text-primary-500"></i>
                <div class="flex flex-col">
                    <span class="text-[10px] uppercase font-black text-slate-500 tracking-widest mb-1">Your Local Time</span>
                    <span class="local-datetime-full font-bold text-slate-900 dark:text-slate-100" data-utc="{{ $match->match_date_utc }}">
                        {{ \Carbon\Carbon::parse($match->match_date_utc)->format('F d, Y, H:i') }}
                    </span>
                </div>
            </div>

            <div class="flex items-center space-x-3 bg-white/5 p-4 rounded-2xl">
                <i data-lucide="map-pin" class="w-6 h-6 text-primary-500"></i>
                <div class="flex flex-col">
                    <span class="text-[10px] uppercase font-black text-slate-500 tracking-widest mb-1">Ground Time (Stadium)</span>
                    <span class="font-bold text-slate-900 dark:text-slate-100">{{ $match->ground_time_full }}</span>
                    <span class="text-[10px] opacity-70">{{ $match->stadium->name }}, {{ $match->stadium->city }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- AI Smart Prediction -->
    @if($match->ai_prediction)
    <div class="p-8 rounded-[3rem] bg-slate-900 dark:bg-white text-white dark:text-slate-900 shadow-2xl relative overflow-hidden group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary-500/20 blur-[80px] rounded-full group-hover:bg-primary-500/30 transition-all duration-1000"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex items-center space-x-6">
                <div class="w-16 h-16 bg-primary-500 rounded-2xl flex items-center justify-center shadow-lg shadow-primary-500/40">
                    <i data-lucide="brain-circuit" class="w-8 h-8 text-white"></i>
                </div>
                <div class="space-y-1">
                    <h2 class="text-xl font-black uppercase tracking-tight">AI Smart Prediction</h2>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-50">Based on FIFA Rankings & Form</p>
                </div>
            </div>

            <div class="flex items-center space-x-12">
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-black text-primary-500">{{ $match->ai_prediction['home'] }}%</span>
                    <span class="text-[10px] font-black uppercase tracking-widest opacity-50">{{ $match->homeTeam->name ?? 'Home' }}</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-black opacity-30">{{ $match->ai_prediction['draw'] }}%</span>
                    <span class="text-[10px] font-black uppercase tracking-widest opacity-50">Draw</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-black text-slate-400">{{ $match->ai_prediction['away'] }}%</span>
                    <span class="text-[10px] font-black uppercase tracking-widest opacity-50">{{ $match->awayTeam->name ?? 'Away' }}</span>
                </div>
            </div>

            <div class="bg-primary-500 text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20">
                AI Verdict: {{ $match->ai_prediction['verdict'] }}
            </div>
        </div>
    </div>
    @endif

    <!-- Match Prediction Poll -->
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 border border-slate-100 dark:border-white/5 shadow-xl">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-black uppercase tracking-tight">Who will win?</h2>
            <p class="text-slate-500 text-sm font-medium mt-1">Cast your vote and see what other fans think!</p>
        </div>

        @php
            $totalVotes = $match->predictions->count();
            $homeVotes = $match->predictions->where('choice', 'home')->count();
            $drawVotes = $match->predictions->where('choice', 'draw')->count();
            $awayVotes = $match->predictions->where('choice', 'away')->count();
            
            $homePercent = $totalVotes > 0 ? round(($homeVotes / $totalVotes) * 100) : 33;
            $drawPercent = $totalVotes > 0 ? round(($drawVotes / $totalVotes) * 100) : 34;
            $awayPercent = $totalVotes > 0 ? 100 - $homePercent - $drawPercent : 33;

            $userPrediction = $match->predictions->where('session_id', session()->getId())->first();
        @endphp

        <div class="grid grid-cols-3 gap-4 md:gap-8">
            <form action="{{ route('matches.predict', $match->id) }}" method="POST">
                @csrf
                <input type="hidden" name="choice" value="home">
                <button type="submit" @if($match->status === 'finished') disabled @endif class="w-full group space-y-4">
                    <div class="relative h-24 md:h-32 bg-slate-50 dark:bg-slate-800/50 rounded-3xl border-2 transition-all flex flex-col items-center justify-center overflow-hidden {{ $userPrediction && $userPrediction->choice === 'home' ? 'border-primary-500 bg-primary-500/5' : 'border-transparent hover:border-slate-200 dark:hover:border-slate-700' }}">
                        <span class="text-3xl md:text-4xl font-black {{ $userPrediction ? 'text-slate-900 dark:text-white' : 'text-slate-300 dark:text-slate-700 group-hover:text-primary-500 transition-colors' }}">
                            {{ $homePercent }}%
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">{{ $match->homeTeam->name ?? $match->home_team_placeholder }}</span>
                        @if($userPrediction && $userPrediction->choice === 'home')
                            <div class="absolute top-2 right-2 w-2 h-2 bg-primary-500 rounded-full"></div>
                        @endif
                    </div>
                </button>
            </form>

            <form action="{{ route('matches.predict', $match->id) }}" method="POST">
                @csrf
                <input type="hidden" name="choice" value="draw">
                <button type="submit" @if($match->status === 'finished') disabled @endif class="w-full group space-y-4">
                    <div class="relative h-24 md:h-32 bg-slate-50 dark:bg-slate-800/50 rounded-3xl border-2 transition-all flex flex-col items-center justify-center overflow-hidden {{ $userPrediction && $userPrediction->choice === 'draw' ? 'border-primary-500 bg-primary-500/5' : 'border-transparent hover:border-slate-200 dark:hover:border-slate-700' }}">
                        <span class="text-3xl md:text-4xl font-black {{ $userPrediction ? 'text-slate-900 dark:text-white' : 'text-slate-300 dark:text-slate-700 group-hover:text-primary-500 transition-colors' }}">
                            {{ $drawPercent }}%
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Draw</span>
                        @if($userPrediction && $userPrediction->choice === 'draw')
                            <div class="absolute top-2 right-2 w-2 h-2 bg-primary-500 rounded-full"></div>
                        @endif
                    </div>
                </button>
            </form>

            <form action="{{ route('matches.predict', $match->id) }}" method="POST">
                @csrf
                <input type="hidden" name="choice" value="away">
                <button type="submit" @if($match->status === 'finished') disabled @endif class="w-full group space-y-4">
                    <div class="relative h-24 md:h-32 bg-slate-50 dark:bg-slate-800/50 rounded-3xl border-2 transition-all flex flex-col items-center justify-center overflow-hidden {{ $userPrediction && $userPrediction->choice === 'away' ? 'border-primary-500 bg-primary-500/5' : 'border-transparent hover:border-slate-200 dark:hover:border-slate-700' }}">
                        <span class="text-3xl md:text-4xl font-black {{ $userPrediction ? 'text-slate-900 dark:text-white' : 'text-slate-300 dark:text-slate-700 group-hover:text-primary-500 transition-colors' }}">
                            {{ $awayPercent }}%
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">{{ $match->awayTeam->name ?? $match->away_team_placeholder }}</span>
                        @if($userPrediction && $userPrediction->choice === 'away')
                            <div class="absolute top-2 right-2 w-2 h-2 bg-primary-500 rounded-full"></div>
                        @endif
                    </div>
                </button>
            </form>
        </div>

        <div class="mt-8 flex justify-center items-center space-x-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
            <i data-lucide="users" class="w-3 h-3"></i>
            <span>{{ number_format($totalVotes) }} FANS HAVE VOTED</span>
        </div>
    </div>

    <!-- Match Details Tabs -->
    <div x-data="{ activeTab: 'timeline' }" class="space-y-8">
        <!-- Tab Navigation -->
        <div class="flex p-1 bg-white/5 rounded-3xl w-full md:w-fit mx-auto border border-white/10 glass dark:glass-dark">
            <button 
                @click="activeTab = 'timeline'" 
                :class="{ 'bg-primary-500 text-white shadow-xl shadow-primary-500/20': activeTab === 'timeline', 'text-slate-500 hover:text-slate-700 dark:hover:text-slate-300': activeTab !== 'timeline' }"
                class="flex-1 md:flex-none px-8 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all"
            >
                Timeline
            </button>
            <button 
                @click="activeTab = 'lineups'" 
                :class="{ 'bg-primary-500 text-white shadow-xl shadow-primary-500/20': activeTab === 'lineups', 'text-slate-500 hover:text-slate-700 dark:hover:text-slate-300': activeTab !== 'lineups' }"
                class="flex-1 md:flex-none px-8 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all"
            >
                Lineups
            </button>
        </div>

        <!-- Tab Contents -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Left Column: Primary Tab Content -->
            <div class="md:col-span-8">
                <!-- Timeline Tab -->
                <div x-show="activeTab === 'timeline'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                    <h2 class="text-2xl font-black">Match Timeline</h2>
                    <div class="space-y-4 relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-200 dark:before:bg-slate-800">
                        @forelse($match->matchEvents->sortBy('minute') as $event)
                            <div class="relative pl-8">
                                <div class="absolute left-0 top-1.5 w-6 h-6 rounded-full bg-white dark:bg-slate-900 border-2 border-primary-500 z-10 flex items-center justify-center">
                                    <span class="text-[10px] font-bold">{{ $event->minute }}'</span>
                                </div>
                                <div class="p-6 rounded-3xl glass dark:glass-dark border border-white/5 flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                            @if($event->type === 'goal')
                                                <i data-lucide="goal" class="w-5 h-5 text-primary-500"></i>
                                            @elseif($event->type === 'yellow_card')
                                                <div class="w-3.5 h-5 bg-yellow-400 rounded-sm shadow-sm"></div>
                                            @elseif($event->type === 'red_card')
                                                <div class="w-3.5 h-5 bg-red-500 rounded-sm shadow-sm"></div>
                                            @else
                                                <i data-lucide="repeat" class="w-5 h-5 text-slate-400"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="text-[10px] font-black uppercase text-primary-500 block mb-0.5">{{ str_replace('_', ' ', $event->type) }}</span>
                                            <span class="font-black text-lg">{{ $event->player_name ?: ($event->player ? $event->player->name : 'Goal') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $event->team->name }}</span>
                                        @if($event->team->flag_url)
                                            <img src="{{ asset($event->team->flag_url) }}" class="w-6 h-4 object-cover rounded-sm" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-12 rounded-[3rem] glass dark:glass-dark text-center space-y-4">
                                <i data-lucide="info" class="w-12 h-12 text-slate-300 mx-auto"></i>
                                <p class="text-slate-500 font-bold italic text-lg">Waiting for match action...</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Lineups Tab -->
                <div x-show="activeTab === 'lineups'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    <h2 class="text-2xl font-black">Official Lineups</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach([['team' => $match->homeTeam, 'placeholder' => $match->home_team_placeholder], ['team' => $match->awayTeam, 'placeholder' => $match->away_team_placeholder]] as $side)
                            <div class="space-y-6">
                                <div class="flex items-center space-x-4 mb-6">
                                    @if($side['team'])
                                        <img src="{{ asset($side['team']->flag_url) }}" class="w-12 h-8 object-cover rounded-lg shadow-lg" alt="">
                                        <h3 class="font-black text-xl uppercase tracking-tighter">{{ $side['team']->name }}</h3>
                                    @else
                                        <div class="w-12 h-8 bg-slate-200 dark:bg-slate-800 rounded-lg flex items-center justify-center">
                                            <i data-lucide="users" class="w-5 h-5 text-slate-400"></i>
                                        </div>
                                        <h3 class="font-black text-xl text-slate-400 uppercase tracking-tighter">{{ $side['placeholder'] }}</h3>
                                    @endif
                                </div>

                                <!-- Starters -->
                                <div class="space-y-3">
                                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary-500 mb-4">Starting XI</h4>
                                    @php
                                        $starters = $side['team'] ? $match->lineups->where('team_id', $side['team']->id)->where('is_starter', true) : collect();
                                    @endphp
                                    @forelse($starters as $lineup)
                                        <div class="flex items-center justify-between p-4 bg-white dark:bg-slate-900/50 rounded-2xl border border-slate-100 dark:border-white/5 shadow-sm">
                                            <div class="flex items-center space-x-4">
                                                <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-xs font-black text-slate-500">
                                                    {{ $lineup->player->number ?? '—' }}
                                                </span>
                                                <div class="flex flex-col">
                                                    <span class="font-bold text-sm">{{ $lineup->player->name }}</span>
                                                    <span class="text-[9px] font-black uppercase text-slate-400">{{ $lineup->position_name ?: $lineup->player->position }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-xs text-slate-500 italic p-4">Starting XI not announced yet.</p>
                                    @endforelse
                                </div>

                                <!-- Subs -->
                                <div class="space-y-3">
                                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Substitutes</h4>
                                    @php
                                        $subs = $side['team'] ? $match->lineups->where('team_id', $side['team']->id)->where('is_starter', false) : collect();
                                    @endphp
                                    @forelse($subs as $lineup)
                                        <div class="flex items-center justify-between p-3 opacity-70">
                                            <div class="flex items-center space-x-4">
                                                <span class="w-6 h-6 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[10px] font-black text-slate-400">
                                                    {{ $lineup->player->number ?? '—' }}
                                                </span>
                                                <span class="font-bold text-xs">{{ $lineup->player->name }}</span>
                                            </div>
                                            <span class="text-[8px] font-black uppercase text-slate-400">{{ $lineup->position_name ?: $lineup->player->position }}</span>
                                        </div>
                                    @empty
                                        <p class="text-xs text-slate-400 italic px-4">No substitutes listed.</p>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                </div>
            </div>

            <!-- Right Column: Stadium & Info -->
            <div class="md:col-span-4 space-y-8">
                <section class="space-y-6">
                    <h2 class="text-2xl font-black">Venue Info</h2>
                    <div class="rounded-[3rem] overflow-hidden glass dark:glass-dark border border-white/10 group shadow-2xl">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $match->stadium->image_url }}" alt="{{ $match->stadium->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-8 left-8 right-8">
                                <h3 class="text-white font-black text-2xl leading-tight mb-2">{{ $match->stadium->name }}</h3>
                                <div class="flex items-center text-white/70 text-sm">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                                    <span>{{ $match->stadium->city }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-slate-500 uppercase font-black tracking-[0.2em] mb-1">Capacity</span>
                                    <div class="flex items-center text-primary-500">
                                        <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                                        <span class="font-black text-xl">{{ number_format($match->stadium->capacity) }}</span>
                                    </div>
                                </div>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($match->stadium->name . ' ' . $match->stadium->city) }}" target="_blank" class="p-4 bg-slate-100 dark:bg-slate-800 rounded-2xl text-slate-600 dark:text-slate-300 hover:text-primary-500 transition-colors shadow-sm">
                                    <i data-lucide="external-link" class="w-5 h-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Weather/Conditions (Mock) -->
                <div class="p-8 rounded-[2.5rem] bg-gradient-to-br from-primary-500 to-primary-600 text-white shadow-xl shadow-primary-500/20">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black uppercase tracking-widest opacity-70">Conditions</span>
                            <span class="text-2xl font-black">Partly Cloudy</span>
                        </div>
                        <i data-lucide="cloud-sun" class="w-8 h-8"></i>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 rounded-2xl p-4">
                            <span class="text-[10px] font-black uppercase tracking-widest opacity-70 block mb-1">Temp</span>
                            <span class="text-lg font-black">24°C</span>
                        </div>
                        <div class="bg-white/10 rounded-2xl p-4">
                            <span class="text-[10px] font-black uppercase tracking-widest opacity-70 block mb-1">Humidity</span>
                            <span class="text-lg font-black">45%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'The Anatomy of a World Cup Match',
        'content' => '
            <p>Every match in the FIFA World Cup™ is more than just a ninety-minute game; it is a high-stakes drama that captures the attention of millions and often defines the sporting legacy of a nation. The "Match Details" page provides a microscopic view of these epic encounters, tracking every goal, card, and substitution that shapes the final outcome. In the 2026 edition, with its expanded format and new Round of 32, the weight of each match has only intensified. A single moment of brilliance or a momentary lapse in concentration can be the difference between moving one step closer to the trophy or a heartbreaking exit from the tournament.</p>
            
            <p>The technical aspects of a World Cup match are a fascinating study for any football enthusiast. Modern matches are a blend of peak physical athleticism and complex tactical systems. Coaches spend months, even years, analyzing their opponents to identify weaknesses and develop strategies that can exploit them. Whether it is a high-pressing game designed to force turnovers in the opponent’s half or a deep-sitting defensive block aimed at neutralizing a world-class attacker, the tactical battles unfolding on the pitch are as compelling as the goals themselves. Our timeline captures these shifts in momentum, providing a narrative of how the match evolved from the first whistle to the last.</p>
            
            <p>Beyond the tactics, the emotional atmosphere of a World Cup match is unparalleled. The pressure on the players representing their countries is immense, with the hopes and dreams of millions resting on their shoulders. This pressure often brings out the best in the world’s greatest stars, leading to the "clutch" performances that become part of football folklore. The roar of the crowd in a stadium like the Azteca or the MetLife, the tension during a VAR review, and the pure elation of a late winner are all part of the unique experience that only the World Cup can provide. These matches are where national icons are forged and where the history of the sport is written in real-time.</p>
            
            <p>The significance of a match also extends to its impact on the tournament’s standings and the subsequent knockout bracket. In the group stage, a win provides the necessary points to secure a top-two finish, while a draw might be enough to stay in contention for one of the eight best third-placed slots. As we move into the knockout rounds, the matches become "all or nothing," where the specter of extra time and penalty shootouts looms over every play. The psychological resilience required to succeed in these "win or go home" scenarios is what separates the champions from the rest of the field.</p>
            
            <p>Our match details page also highlights the importance of the venue and the officials in the outcome of the game. The stadium’s pitch conditions, weather, and even the local altitude in cities like Mexico City can significantly affect player performance and match strategy. The referee and the VAR team also play a critical role, ensuring that the rules of the game are upheld and that key decisions are made with the highest degree of accuracy possible. We provide this context to give you a complete understanding of why a match unfolded the way it did, looking beyond just the final scoreline.</p>
            
            <p>Ultimately, a World Cup match is a celebration of humanity’s shared love for the beautiful game. It is a moment where people from different cultures, languages, and backgrounds come together to witness a display of skill, passion, and sporting excellence. As you explore the details of this match, remember that you are looking at a piece of history—a ninety-minute story that will be told and retold by fans for decades to come. Whether it is a group stage thriller or a knockout classic, every match in the 2026 World Cup is a vital chapter in the greatest sporting story ever told.</p>
        '
    ])
</div>
@endsection
