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
                                    <span class="font-bold">{{ $event->player_name ?: ($event->player ? $event->player->name : 'Goal') }}</span>
                                    @if($event->details)
                                        <p class="text-xs text-slate-500 mt-1">{{ $event->details }}</p>
                                    @endif
                                </div>
                                <span class="text-xs font-medium text-slate-400">{{ $event->team->name ?? 'Match Event' }}</span>
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
