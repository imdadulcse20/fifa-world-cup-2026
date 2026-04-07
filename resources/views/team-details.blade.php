@extends('layouts.app')

@section('title', $team->name . ' - Team Profile')

@section('content')
<div class="max-w-5xl mx-auto space-y-10 pb-20">
    <a href="{{ route('teams') }}" class="inline-flex p-2 rounded-xl glass dark:glass-dark text-slate-500 hover:text-primary-500 transition-colors">
        <i data-lucide="arrow-left"></i>
    </a>

    <!-- Team Header Card -->
    <div class="relative p-10 rounded-[3rem] glass dark:glass-dark border border-white/20 shadow-2xl overflow-hidden">
        <div class="absolute -right-10 -bottom-10 opacity-5">
            <img src="{{ asset($team->flag_url) }}" class="w-96 h-auto" alt="">
        </div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 relative z-10">
            <div class="flex items-center space-x-8">
                <img src="{{ asset($team->flag_url) }}" class="w-32 h-20 md:w-48 md:h-32 object-cover rounded-3xl shadow-2xl border-4 border-white/10" alt="">
                <div class="space-y-2">
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-primary-500">{{ $team->group_name }}</span>
                    <h1 class="text-4xl md:text-6xl font-black">{{ $team->name }}</h1>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2 bg-white/5 px-3 py-1 rounded-full">
                            <i data-lucide="user" class="w-3 h-3 text-slate-400"></i>
                            <span class="text-sm font-bold">{{ $team->coach }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row md:flex-col items-center md:items-end gap-4">
                <div class="text-center md:text-right">
                    <span class="text-[10px] font-black text-slate-500 uppercase block tracking-widest">Current FIFA Rank</span>
                    <span class="text-5xl font-black text-primary-500 leading-none">#{{ $team->fifa_rank }}</span>
                </div>
                <div class="flex space-x-2">
                    <div class="bg-green-500/10 px-3 py-1 rounded-lg border border-green-500/20">
                        <span class="text-[8px] font-bold text-green-500 block uppercase">High</span>
                        <span class="text-xs font-black text-green-500">#{{ $team->highest_rank }}</span>
                    </div>
                    <div class="bg-red-500/10 px-3 py-1 rounded-lg border border-red-500/20">
                        <span class="text-[8px] font-bold text-red-500 block uppercase">Low</span>
                        <span class="text-xs font-black text-red-500">#{{ $team->lowest_rank }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Squad List -->
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between px-4">
                <h2 class="text-2xl font-black">Official Squad</h2>
                <span class="bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $team->players->count() }} Players</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($team->players as $player)
                    <div class="p-5 rounded-3xl glass dark:glass-dark border border-white/5 flex items-center justify-between hover:border-primary-500/30 transition-all group">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center font-black text-primary-500 text-lg group-hover:bg-primary-500 group-hover:text-white transition-colors">
                                {{ $player->number }}
                            </div>
                            <div>
                                <span class="font-black block">{{ $player->name }}</span>
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $player->position }}</span>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-600"></i>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Schedule & Group Context -->
        <div class="space-y-8">
            <section class="space-y-6">
                <h2 class="text-2xl font-black px-4">Match Schedule</h2>
                <div class="space-y-4">
                    @foreach($matches as $match)
                        <div class="p-5 rounded-3xl glass dark:glass-dark border border-white/5 space-y-4 cursor-pointer hover:bg-white/5 transition-colors"
                             onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">                            <div class="flex justify-between items-center text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                <span>{{ $match->stage }}</span>
                                <span class="{{ $match->status === 'live' ? 'text-red-500 animate-pulse' : '' }}">{{ $match->status }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex flex-col items-center flex-1">
                                    <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-10 h-6 object-cover rounded shadow-sm" alt="">
                                    <span class="text-[10px] font-bold mt-1 truncate w-16 text-center">{{ $match->homeTeam->name }}</span>
                                </div>
                                <div class="text-center px-2">
                                    @if($match->status === 'upcoming')
                                        <span class="text-sm font-black opacity-30 italic">VS</span>
                                    @else
                                        <span class="text-lg font-black text-primary-500">{{ $match->home_score }} - {{ $match->away_score }}</span>
                                    @endif
                                </div>
                                <div class="flex flex-col items-center flex-1">
                                    <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-10 h-6 object-cover rounded shadow-sm" alt="">
                                    <span class="text-[10px] font-bold mt-1 truncate w-16 text-center">{{ $match->awayTeam->name }}</span>
                                </div>
                            </div>

                            <div class="pt-3 border-t border-white/5 flex items-center space-x-2 text-[9px] font-bold text-slate-500 uppercase">
                                <i data-lucide="calendar" class="w-3 h-3"></i>
                                <span>{{ \Carbon\Carbon::parse($match->match_date_utc)->format('M d, H:i') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
