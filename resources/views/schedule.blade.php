@extends('layouts.app')

@section('title', 'Schedule')

@section('content')
<div class="space-y-10 max-w-lg mx-auto md:max-w-none pb-12">
    <header class="flex flex-col space-y-6">
        <h1 class="text-3xl font-black">Match Schedule</h1>
        
        <div class="flex flex-col space-y-4">
            <div class="flex space-x-2 overflow-x-auto no-scrollbar pb-2">
                @php $status = request('status', 'all'); @endphp
                @foreach(['all', 'upcoming', 'live', 'finished'] as $f)
                    <a href="{{ route('schedule', array_merge(request()->query(), ['status' => $f])) }}" 
                       class="px-6 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap {{ $status === $f ? 'bg-primary-500 text-white shadow-lg shadow-primary-500/30' : 'glass dark:glass-dark text-slate-500' }}">
                        {{ strtoupper($f) }}
                    </a>
                @endforeach
            </div>

            <div class="flex space-x-2 overflow-x-auto no-scrollbar pb-2 border-t border-white/5 pt-4">
                @php $stage = request('stage', 'all'); @endphp
                @foreach(['all', 'Group Stage', 'Knockout'] as $s)
                    <a href="{{ route('schedule', array_merge(request()->query(), ['stage' => $s])) }}" 
                       class="px-6 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap {{ $stage === $s ? 'border-2 border-primary-500 text-primary-500' : 'glass dark:glass-dark text-slate-500' }}">
                        {{ strtoupper($s) }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    @forelse($groupedMatches as $groupName => $matches)
        <section class="space-y-6">
            <h2 class="text-xl font-black text-slate-400 flex items-center space-x-3 px-4 uppercase tracking-tighter">
                <span>{{ $groupName }}</span>
                <span class="flex-1 h-px bg-white/5"></span>
            </h2>
            
            <div class="space-y-6">
                @foreach($matches as $match)
                    <div class="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 hover:border-primary-500/30 transition-colors cursor-pointer group shadow-xl"
                         onclick="window.location='{{ route('match-details', $match->id) }}'">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $match->stage }}</span>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $match->status === 'live' ? 'bg-red-500 text-white animate-pulse' : 'bg-slate-200 dark:bg-slate-800 text-slate-500' }}">
                                {{ strtoupper($match->status) }}
                            </span>
                        </div>

                        <div class="grid grid-cols-3 items-center">
                            <div class="flex flex-col items-center space-y-2">
                                @if($match->homeTeam)
                                    <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-16 h-10 object-cover rounded-lg shadow-md group-hover:scale-110 transition-transform" alt="">
                                    <span class="font-bold text-sm text-center">{{ $match->homeTeam->name }}</span>
                                @else
                                    <div class="w-16 h-10 bg-slate-200 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-400">
                                        <i data-lucide="users" class="w-6 h-6"></i>
                                    </div>
                                    <span class="font-bold text-[10px] text-center text-slate-500 uppercase">{{ $match->home_team_placeholder }}</span>
                                @endif
                            </div>

                            <div class="flex flex-col items-center">
                                @if($match->status === 'upcoming')
                                    <span class="text-2xl font-black opacity-20">VS</span>
                                    <span class="text-[10px] font-bold text-primary-500 mt-1">
                                        {{ \Carbon\Carbon::parse($match->match_date_utc)->format('H:i') }}
                                    </span>
                                @else
                                    <div class="text-3xl font-black flex items-center space-x-3 text-primary-500">
                                        <span>{{ $match->home_score }}</span>
                                        <span class="text-slate-300 dark:text-slate-700 opacity-30 text-xl">-</span>
                                        <span>{{ $match->away_score }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="flex flex-col items-center space-y-2">
                                @if($match->awayTeam)
                                    <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-16 h-10 object-cover rounded-lg shadow-md group-hover:scale-110 transition-transform" alt="">
                                    <span class="font-bold text-sm text-center">{{ $match->awayTeam->name }}</span>
                                @else
                                    <div class="w-16 h-10 bg-slate-200 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-400">
                                        <i data-lucide="users" class="w-6 h-6"></i>
                                    </div>
                                    <span class="font-bold text-[10px] text-center text-slate-500 uppercase">{{ $match->away_team_placeholder }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-white/5 flex justify-between items-center text-[10px] text-slate-500 font-medium uppercase tracking-widest">
                            <div class="flex items-center space-x-1">
                                <i data-lucide="calendar" class="w-3 h-3 text-primary-500"></i>
                                <span>{{ \Carbon\Carbon::parse($match->match_date_utc)->format('D, M d') }}</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="map-pin" class="w-3 h-3 text-primary-500"></i>
                                <span>{{ $match->stadium->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @empty
        <div class="text-center py-20 text-slate-500 italic">
            No matches found for this selection.
        </div>
    @endforelse
</div>
@endsection
