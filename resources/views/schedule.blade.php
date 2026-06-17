@extends('layouts.app')

@section('title', '2026 World Cup Match Schedule & Results')
@section('meta_description', 'View the complete 2026 World Cup match schedule, including group stage games, knockout rounds, and final match dates and times.')

@section('content')
@php 
    $activeType = request('type', 'tournament');
@endphp

<div class="space-y-10 max-w-lg mx-auto md:max-w-none pb-12" x-data="{ activeTab: '{{ $activeType }}' }">
    <header class="flex flex-col space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <h1 class="text-3xl font-black">Match Schedule</h1>
            
            <div class="flex p-1 bg-slate-100 dark:bg-slate-900 rounded-2xl w-fit shadow-sm border border-white/5">
                <a href="{{ route('schedule', array_merge(request()->query(), ['type' => 'tournament'])) }}" 
                   :class="activeTab === 'tournament' ? 'bg-white dark:bg-slate-800 shadow-lg text-primary-500' : 'text-slate-500 hover:text-primary-500'" 
                   class="px-8 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all">
                    World Cup
                </a>
                <a href="{{ route('schedule', array_merge(request()->query(), ['type' => 'friendly'])) }}" 
                   :class="activeTab === 'friendly' ? 'bg-white dark:bg-slate-800 shadow-lg text-primary-500' : 'text-slate-500 hover:text-primary-500'" 
                   class="px-8 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all">
                    Friendlies
                </a>
            </div>
        </div>
        
        <div class="flex flex-col space-y-4">
            <!-- Filter Bar (Status) -->
            <div class="flex space-x-2 overflow-x-auto no-scrollbar pb-2">
                @php $status = request('status', 'all'); @endphp
                @foreach(['all', 'upcoming', 'live', 'finished'] as $f)
                    <a href="{{ route('schedule', array_merge(request()->query(), ['status' => $f, 'type' => $activeType])) }}" 
                       class="px-6 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap {{ $status === $f ? 'bg-primary-500 text-white shadow-lg shadow-primary-500/30' : 'glass dark:glass-dark text-slate-500' }}">
                        {{ strtoupper($f) }}
                    </a>
                @endforeach
            </div>

            <!-- Filter Bar (Stage) - Only show for tournament matches -->
            <div x-show="activeTab === 'tournament'" x-transition class="flex space-x-2 overflow-x-auto no-scrollbar pb-2 border-t border-white/5 pt-4">
                @php $stage = request('stage', 'all'); @endphp
                @foreach(['all', 'Group Stage', 'Knockout'] as $s)
                    <a href="{{ route('schedule', array_merge(request()->query(), ['stage' => $s, 'type' => 'tournament'])) }}" 
                       class="px-6 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap {{ $stage === $s ? 'border-2 border-primary-500 text-primary-500' : 'glass dark:glass-dark text-slate-500' }}">
                        {{ strtoupper($s) }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    <!-- Tournament Matches -->
    <div x-show="activeTab === 'tournament'" x-transition class="space-y-10">
        @forelse($tournamentMatches as $groupName => $matches)
            <section class="space-y-6">
                <h2 class="text-xl font-black text-slate-400 flex items-center space-x-3 px-4 uppercase tracking-tighter">
                    <span>{{ $groupName }}</span>
                    <span class="flex-1 h-px bg-white/5"></span>
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($matches as $match)
                        <div class="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 hover:border-primary-500/30 transition-colors cursor-pointer group shadow-xl"
                             data-match-id="{{ $match->id }}" data-live="{{ $match->status === 'live' ? 'true' : 'false' }}"
                             onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">                            <div class="flex justify-between items-center mb-4">
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $match->stage }}</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $match->status === 'live' ? 'bg-red-500 text-white animate-pulse' : 'bg-slate-200 dark:bg-slate-800 text-slate-500' }}">
                                    {{ strtoupper($match->status) }}
                                </span>
                            </div>

                            <div class="grid grid-cols-3 items-center">
                                <div class="flex flex-col items-center space-y-2">
                                    @if($match->homeTeam)
                                        <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-16 h-10 object-cover rounded-lg shadow-md group-hover:scale-110 transition-transform" alt="">
                                        <span class="font-bold text-sm text-center line-clamp-1">{{ $match->homeTeam->name }}</span>
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
                                        <div class="flex flex-col items-center mt-1 text-center">
                                            <div class="local-datetime-short text-[10px] font-bold text-primary-500" data-utc="{{ $match->match_date_utc }}">
                                                {{ \Carbon\Carbon::parse($match->match_date_utc)->format('H:i') }}
                                            </div>
                                        </div>
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
                                        <span class="font-bold text-sm text-center line-clamp-1">{{ $match->awayTeam->name }}</span>
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
                                    <span class="line-clamp-1 max-w-[120px]">{{ $match->stadium->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="text-center py-20 text-slate-500 italic">
                No tournament matches found for this selection.
            </div>
        @endforelse
    </div>

    <!-- Friendly Matches -->
    <div x-show="activeTab === 'friendly'" x-transition class="space-y-10">
        @forelse($friendlyMatches as $groupName => $matches)
            <section class="space-y-6">
                <h2 class="text-xl font-black text-slate-400 flex items-center space-x-3 px-4 uppercase tracking-tighter">
                    <span>{{ $groupName }}</span>
                    <span class="flex-1 h-px bg-white/5"></span>
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($matches as $match)
                        <div class="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 hover:border-primary-500/30 transition-colors cursor-pointer group shadow-xl"
                             data-match-id="{{ $match->id }}" data-live="{{ $match->status === 'live' ? 'true' : 'false' }}"
                             onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">                            <div class="flex justify-between items-center mb-4">
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">FRIENDLY</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $match->status === 'live' ? 'bg-red-500 text-white animate-pulse' : 'bg-slate-200 dark:bg-slate-800 text-slate-500' }}">
                                    {{ strtoupper($match->status) }}
                                </span>
                            </div>

                            <div class="grid grid-cols-3 items-center">
                                <div class="flex flex-col items-center space-y-2">
                                    @if($match->homeTeam)
                                        <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-16 h-10 object-cover rounded-lg shadow-md group-hover:scale-110 transition-transform" alt="">
                                        <span class="font-bold text-sm text-center line-clamp-1">{{ $match->homeTeam->name }}</span>
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
                                        <div class="flex flex-col items-center mt-1 text-center">
                                            <div class="local-datetime-short text-[10px] font-bold text-primary-500" data-utc="{{ $match->match_date_utc }}">
                                                {{ \Carbon\Carbon::parse($match->match_date_utc)->format('H:i') }}
                                            </div>
                                        </div>
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
                                        <span class="font-bold text-sm text-center line-clamp-1">{{ $match->awayTeam->name }}</span>
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
                                    <span class="line-clamp-1 max-w-[120px]">{{ $match->stadium->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="text-center py-20 text-slate-500 italic">
                No friendly matches found for this selection.
            </div>
        @endforelse
    </div>

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'Mastering the 2026 Match Calendar',
        'content' => '
            <p>The 2026 FIFA World Cup™ schedule is a masterpiece of logistical planning, designed to accommodate 104 matches across 16 host cities in three vast countries. This expanded schedule ensures that every participating nation has adequate rest between games while maximizing the excitement for fans across multiple time zones. From the opening match at the iconic Estadio Azteca in Mexico City to the final showdown in New Jersey, the calendar is packed with high-stakes football that will keep the world on the edge of its seat for nearly six weeks.</p>
            
            <p>One of the most significant changes in the 2026 schedule is the introduction of a new knockout round: the Round of 32. This additional phase means that the journey to the trophy now requires teams to navigate one extra high-pressure match, testing their depth, resilience, and tactical flexibility. The group stage itself will span the first two weeks of the tournament, with up to four matches played daily during peak periods. This dense schedule provides a feast of football for viewers, with games staggered throughout the day to ensure maximum global viewership.</p>
            
            <p>Logistically, the host cities have been divided into three geographic regions—West, Central, and East—to minimize travel for teams and fans. This regionalized approach is a crucial component of the schedule, allowing teams to play their group stage matches within a specific cluster of cities. For example, a team might play its matches in Vancouver and Seattle, or Mexico City and Guadalajara. This strategy not only reduces carbon footprints but also allows fans to follow their teams more easily across North America’s diverse landscapes.</p>
            
            <p>Kick-off times have been carefully selected to balance local attendance with global broadcasting requirements. Our portal automatically adjusts these times to your local time zone, ensuring you never miss a minute of the action. Whether it’s a morning match in the Pacific Northwest or a late-night thriller on the Atlantic coast, the schedule is designed to be accessible to as many people as possible. We also provide "Ground Time" for each match, giving you a sense of the atmosphere and conditions at the stadium venue itself.</p>
            
            <p>As the tournament progresses, the intensity will only increase. The transition from the group stage to the knockout rounds is a pivotal moment in the schedule, where the margin for error disappears. The winners and runners-up from each of the 12 groups, along with the eight best third-placed teams, will find themselves in a bracket where every goal could be the difference between glory and heartbreak. We update the schedule in real-time to reflect these advancing teams, providing a clear path from the group stage to the final match in New York New Jersey.</p>
            
            <p>Beyond the official tournament games, the schedule also acknowledges the importance of international friendlies and preparation matches. While these exhibition games don’t impact the official standings, they are vital for managers to fine-tune their squads and for fans to see their favorite stars in action before the main event. Our comprehensive schedule includes these matches, providing a complete picture of the international football calendar leading up to and during the 2026 World Cup. Get ready for an unprecedented summer of football that will define a generation.</p>
        '
    ])
</div>
@endsection
