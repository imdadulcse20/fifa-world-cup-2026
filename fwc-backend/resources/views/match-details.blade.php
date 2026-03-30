@extends('layouts.app')

@section('title', 'Match Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-8 pb-20">
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
                <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-24 h-16 md:w-32 md:h-20 object-cover rounded-2xl shadow-2xl mb-4" alt="">
                <span class="text-xl md:text-3xl font-black text-center">{{ $match->homeTeam->name }}</span>
            </div>

            <div class="flex flex-col items-center">
                <div class="text-6xl md:text-8xl font-black flex items-center space-x-4">
                    <span>{{ $match->home_score }}</span>
                    <span class="text-slate-300 dark:text-slate-800">:</span>
                    <span>{{ $match->away_score }}</span>
                </div>
                <span class="text-xs font-bold text-slate-500 mt-4 uppercase">Match {{ $match->status }}</span>
            </div>

            <div class="flex flex-col items-center space-y-4">
                <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-24 h-16 md:w-32 md:h-20 object-cover rounded-2xl shadow-2xl mb-4" alt="">
                <span class="text-xl md:text-3xl font-black text-center">{{ $match->awayTeam->name }}</span>
            </div>
        </div>

        <div class="mt-12 flex flex-wrap justify-center gap-6 pt-8 border-t border-white/5 text-sm text-slate-500 font-medium">
            <div class="flex items-center space-x-2">
                <i data-lucide="calendar" class="w-4 h-4 text-primary-500"></i>
                <span>{{ \Carbon\Carbon::parse($match->match_date_utc)->format('F d, Y') }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="clock" class="w-4 h-4 text-primary-500"></i>
                <span>{{ \Carbon\Carbon::parse($match->match_date_utc)->format('H:i') }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="map-pin" class="w-4 h-4 text-primary-500"></i>
                <span>{{ $match->stadium->name }}, {{ $match->stadium->city }}</span>
            </div>
        </div>
    </div>

    <!-- Timeline & Stadium -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <section class="space-y-6">
            <h2 class="text-2xl font-black">Timeline</h2>
            <div class="space-y-4 relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-200 dark:before:bg-slate-800">
                @forelse($match->matchEvents as $event)
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1.5 w-6 h-6 rounded-full bg-white dark:bg-slate-900 border-2 border-primary-500 z-10 flex items-center justify-center">
                            <span class="text-[10px] font-bold">{{ $event->minute }}'</span>
                        </div>
                        <div class="p-4 rounded-2xl glass dark:glass-dark border border-white/5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span class="text-[10px] font-black uppercase text-primary-500 block mb-1">{{ $event->type }}</span>
                                    <span class="font-bold">{{ $event->player->name }}</span>
                                    @if($event->details)
                                        <p class="text-xs text-slate-500 mt-1">{{ $event->details }}</p>
                                    @endif
                                </div>
                                <span class="text-xs font-medium text-slate-400">{{ $event->team->name }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 rounded-3xl glass dark:glass-dark text-center text-slate-500 italic">
                        No match events recorded yet.
                    </div>
                @endforelse
            </div>
        </section>

        <section class="space-y-6">
            <h2 class="text-2xl font-black">Stadium Info</h2>
            <div class="rounded-[2.5rem] overflow-hidden glass dark:glass-dark border border-white/10 group shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $match->stadium->image_url }}" alt="{{ $match->stadium->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60"></div>
                    <div class="absolute bottom-4 left-6">
                        <h3 class="text-white font-black text-xl leading-tight">{{ $match->stadium->name }}</h3>
                        <div class="flex items-center text-white/80 text-xs mt-1">
                            <i data-lucide="map-pin" class="w-3 h-3 mr-1"></i>
                            <span>{{ $match->stadium->city }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Capacity</span>
                            <span class="font-bold mt-1">{{ number_format($match->stadium->capacity) }} fans</span>
                        </div>
                        <button class="px-6 py-2 bg-primary-500 text-white rounded-full text-[10px] font-bold shadow-lg shadow-primary-500/30">
                            VIEW MAP
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
