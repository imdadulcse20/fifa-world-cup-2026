@extends('layouts.app')

@section('title', '2026 World Cup Live Scores, Schedule & Standings')
@section('meta_description', 'Stay updated with the 2026 World Cup. Get live scores, match schedules, group standings, and stadium information in one place.')

@push('meta')
    <meta name="google-site-verification" content="b7uLfYQBrBkddjmhlhAkskVTsJEoDC9kOzXevLwtwN0" />
@endpush

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
                         data-match-id="{{ $match->id }}" data-live="true"
                         onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">
                        
                        <div class="absolute top-4 right-4 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full flex items-center space-x-1">
                            <i data-lucide="play" class="w-2 h-2 fill-current"></i>
                            <span class="match-time-display">{{ $match->match_time ?: 'LIVE' }}</span>
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
                                <div class="text-3xl font-black text-primary-500 flex items-center space-x-2 live-score-box">
                                    <span class="home-score">{{ $match->home_score }}</span>
                                    <span class="text-slate-300 dark:text-slate-700">:</span>
                                    <span class="away-score">{{ $match->away_score }}</span>
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

                        <div class="flex items-center justify-center space-x-2 text-slate-500 text-[10px] font-medium mb-4">
                            <i data-lucide="map-pin" class="w-3 h-3"></i>
                            <span>{{ $match->stadium->name }}, {{ $match->stadium->city }}</span>
                        </div>

                        <!-- Goal Scorers Section -->
                        <div class="border-t border-slate-100 dark:border-slate-800 pt-4 goal-scorers-list space-y-1">
                            @foreach($match->matchEvents->where('type', 'goal')->sortBy('minute') as $event)
                                <div class="flex items-center justify-center space-x-2 text-[10px] text-slate-500">
                                    <i data-lucide="goal" class="w-3 h-3 text-primary-500"></i>
                                    <span class="font-bold">{{ $event->player_name ?: ($event->player ? $event->player->name : 'Goal') }}</span>
                                    <span class="text-slate-400 font-medium">{{ $event->minute }}'</span>
                                </div>
                            @endforeach
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

    <!-- Upcoming Matches with Tabs -->
    <section x-data="{ tab: 'tournament' }">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
            <h2 class="text-xl font-bold uppercase tracking-tight">Upcoming Matches</h2>
            <div class="flex p-1 bg-slate-100 dark:bg-slate-900 rounded-2xl w-fit">
                <button @click="tab = 'tournament'" :class="tab === 'tournament' ? 'bg-white dark:bg-slate-800 shadow-sm text-primary-500' : 'text-slate-500'" class="px-6 py-2 rounded-xl text-xs font-black uppercase tracking-widest transition-all">
                    World Cup
                </button>
                <button @click="tab = 'friendly'" :class="tab === 'friendly' ? 'bg-white dark:bg-slate-800 shadow-sm text-primary-500' : 'text-slate-500'" class="px-6 py-2 rounded-xl text-xs font-black uppercase tracking-widest transition-all">
                    Friendlies
                </button>
            </div>
        </div>

        <!-- Tournament Matches Tab -->
        <div x-show="tab === 'tournament'" x-transition class="space-y-4">
            @forelse($upcomingTournamentMatches as $match)
                <div class="flex items-center justify-between p-4 rounded-3xl glass dark:glass-dark border border-white/5 cursor-pointer hover:border-primary-500/30 transition-all"
                     onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">
                    <div class="flex items-center space-x-4 flex-1">
                        @if($match->homeTeam)
                            <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                            <span class="font-bold text-sm">{{ $match->homeTeam->name }}</span>
                        @else
                            <div class="w-8 h-5 bg-slate-200 dark:bg-slate-800 rounded flex items-center justify-center text-slate-400">
                                <i data-lucide="users" class="w-3 h-3"></i>
                            </div>
                            <span class="font-bold text-[10px] text-slate-500 uppercase">{{ $match->home_team_placeholder }}</span>
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
                            <span class="font-bold text-sm text-right">{{ $match->awayTeam->name }}</span>
                            <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                        @else
                            <span class="font-bold text-[10px] text-right text-slate-500 uppercase">{{ $match->away_team_placeholder }}</span>
                            <div class="w-8 h-5 bg-slate-200 dark:bg-slate-800 rounded flex items-center justify-center text-slate-400">
                                <i data-lucide="users" class="w-3 h-3"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-8 rounded-3xl glass dark:glass-dark text-center text-slate-500 italic">
                    No upcoming tournament matches found.
                </div>
            @endforelse
            @if($upcomingTournamentMatches->count() > 0)
                <div class="text-center pt-2">
                    <a href="{{ route('schedule') }}" class="text-primary-500 text-xs font-black uppercase tracking-widest hover:underline">View Full Schedule</a>
                </div>
            @endif
        </div>

        <!-- Friendly Matches Tab -->
        <div x-show="tab === 'friendly'" x-transition class="space-y-4">
            @forelse($upcomingFriendlyMatches as $match)
                <div class="flex items-center justify-between p-4 rounded-3xl glass dark:glass-dark border border-white/5 cursor-pointer hover:border-primary-500/30 transition-all"
                     onclick="window.location='{{ route('match-details', ['slug_id' => $match->slug . '-' . $match->id]) }}'">
                    <div class="flex items-center space-x-4 flex-1">
                        @if($match->homeTeam)
                            <img src="{{ asset($match->homeTeam->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                            <span class="font-bold text-sm">{{ $match->homeTeam->name }}</span>
                        @else
                            <div class="w-8 h-5 bg-slate-200 dark:bg-slate-800 rounded flex items-center justify-center text-slate-400">
                                <i data-lucide="users" class="w-3 h-3"></i>
                            </div>
                            <span class="font-bold text-[10px] text-slate-500 uppercase">{{ $match->home_team_placeholder }}</span>
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
                            <span class="font-bold text-sm text-right">{{ $match->awayTeam->name }}</span>
                            <img src="{{ asset($match->awayTeam->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                        @else
                            <span class="font-bold text-[10px] text-right text-slate-500 uppercase">{{ $match->away_team_placeholder }}</span>
                            <div class="w-8 h-5 bg-slate-200 dark:bg-slate-800 rounded flex items-center justify-center text-slate-400">
                                <i data-lucide="users" class="w-3 h-3"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-8 rounded-3xl glass dark:glass-dark text-center text-slate-500 italic">
                    No upcoming friendly matches found.
                </div>
            @endforelse
            @if($upcomingFriendlyMatches->count() > 0)
                <div class="text-center pt-2">
                    <a href="{{ route('friendlies') }}" class="text-primary-500 text-xs font-black uppercase tracking-widest hover:underline">View All Friendlies</a>
                </div>
            @endif
        </div>
    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'The Road to 2026: A Historic Tournament',
        'content' => '
            <p>The FIFA World Cup 2026™ is set to be the most ambitious and expansive sporting event ever organized. For the first time in history, the tournament will feature 48 teams, an increase from the 32-team format that has been in place since 1998. This expansion reflects FIFAs commitment to making the World Cup a truly global celebration, offering more opportunities for nations from every corner of the earth to compete on the grandest stage of all. With more teams comes more matches, more goals, and more unforgettable moments that will be etched into the collective memory of football fans worldwide.</p>
            
            <p>This edition is also unique for its hosting arrangement. Canada, Mexico, and the United States will co-host the tournament across 16 iconic cities. This three-nation collaboration demonstrates the unifying power of football, bringing together different cultures and communities under a shared passion for the beautiful game. From the high-altitude stadiums of Mexico City to the modern arenas of the United States and the vibrant coastal cities of Canada, the 2026 World Cup will showcase the incredible diversity and hospitality of North America.</p>
            
            <p>The new tournament structure will consist of 12 groups of four teams each. The top two teams from each group, along with the eight best third-placed teams, will advance to a new Round of 32, marking the beginning of a high-stakes knockout phase. This format ensures that every match in the group stage carries significant weight, providing fans with non-stop excitement from the opening whistle to the final trophy presentation. A total of 104 matches will be played over 39 days, culminating in the final at MetLife Stadium in East Rutherford, New Jersey.</p>
            
            <p>Beyond the pitch, the 2026 World Cup aims to leave a lasting legacy. It is expected to generate unprecedented economic growth, promote tourism, and inspire a new generation of footballers across the host nations and beyond. The tournament will also prioritize sustainability and inclusivity, setting new standards for how major international events are conducted in the 21st century. Whether you are a lifelong supporter or a newcomer to the sport, the 2026 World Cup promises to be a spectacle of skill, drama, and pure emotion that you wont want to miss.</p>
            
            <p>Our portal is designed to be your ultimate companion throughout this journey. We provide real-time updates on live scores, detailed match schedules, up-to-the-minute group standings, and comprehensive team profiles. Stay tuned for the latest news, injury updates, and tactical analyses as we count down to the kick-off of the greatest show on Earth. The beautiful game is coming to North America, and we are here to ensure you dont miss a single beat of the action.</p>
            
            <p>As the teams prepare and the host cities finalize their preparations, the excitement is palpable. Fans from around the globe are already planning their travels, looking forward to experiencing the unique atmosphere that only a World Cup can provide. The 2026 tournament is not just about the matches; it is about the stories of the players, the chants in the stands, and the shared joy of a goal that unites people across borders. It is a celebration of humanity, resilience, and the relentless pursuit of excellence that defines the spirit of football.</p>
        '
    ])
</div>
@endsection
