@extends('layouts.app')

@section('title', 'International Friendly Matches')
@section('meta_description', 'View the schedule and results of international friendly football matches.')

@section('content')
<div class="space-y-10 max-w-lg mx-auto md:max-w-none pb-12">
    <header class="flex flex-col space-y-4 text-center md:text-left">
        <h1 class="text-3xl font-black">International Friendlies</h1>
        <p class="text-slate-500 font-medium">Global prep matches and exhibition games</p>
    </header>

    @if($matches->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($matches as $match)
                <div class="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 hover:border-primary-500/30 transition-colors cursor-pointer group shadow-xl"
                     onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $match->status === 'live' ? 'bg-red-500 text-white animate-pulse' : 'bg-slate-200 dark:bg-slate-800 text-slate-500' }}">
                            {{ strtoupper($match->status) }}
                        </span>
                        <div class="flex items-center space-x-1 text-[10px] text-slate-500 font-bold uppercase tracking-widest">
                            <i data-lucide="map-pin" class="w-3 h-3 text-primary-500"></i>
                            <span>{{ $match->stadium->city }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 items-center gap-4">
                        <div class="flex flex-col items-center space-y-2">
                            @if($match->homeTeam)
                                <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-12 h-8 object-cover rounded shadow-md group-hover:scale-110 transition-transform" alt="">
                                <span class="font-bold text-xs text-center truncate w-full">{{ $match->homeTeam->name }}</span>
                            @endif
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="text-2xl font-black text-primary-500">
                                @if($match->status === 'upcoming')
                                    <span class="opacity-20">VS</span>
                                @else
                                    <span>{{ $match->home_score }} - {{ $match->away_score }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col items-center space-y-2">
                            @if($match->awayTeam)
                                <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-12 h-8 object-cover rounded shadow-md group-hover:scale-110 transition-transform" alt="">
                                <span class="font-bold text-xs text-center truncate w-full">{{ $match->awayTeam->name }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/5 flex flex-col items-center space-y-1">
                        <div class="local-datetime-short text-[10px] font-bold text-slate-400" data-utc="{{ $match->match_date_utc }}">
                            {{ \Carbon\Carbon::parse($match->match_date_utc)->format('M d, H:i') }}
                        </div>
                        <div class="text-[8px] text-slate-500 font-medium uppercase tracking-tighter">
                            Ground: {{ $match->ground_time }} ({{ $match->stadium->timezone }})
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 bg-white/5 rounded-[3rem] border border-dashed border-white/10">
            <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                <i data-lucide="flag" class="w-8 h-8"></i>
            </div>
            <p class="text-slate-500 italic">No international friendly matches scheduled at the moment.</p>
        </div>
    @endif
</div>
@endsection
