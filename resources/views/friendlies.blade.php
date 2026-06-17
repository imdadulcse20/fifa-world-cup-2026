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
                     data-match-id="{{ $match->id }}" data-live="{{ $match->status === 'live' ? 'true' : 'false' }}"
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

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'The Strategic Importance of Friendlies',
        'content' => '
            <p>International friendly matches, often referred to as exhibition games, serve as a vital laboratory for national team managers as they prepare for the ultimate test of the FIFA World Cup™. While these matches do not award points in a tournament standings table, their strategic importance cannot be overstated. They provide the necessary platform for coaches to experiment with tactical formations, integrate new players into the squad, and build the team chemistry that is essential for success on the world stage. For the 2026 World Cup, where the field has expanded to 48 teams, these preparation matches are more crucial than ever.</p>
            
            <p>For the elite nations, friendlies are an opportunity to fine-tune their established systems against high-quality opposition. These "heavyweight" matchups often draw massive crowds and provide a glimpse into the potential deep-run contenders of the upcoming tournament. For emerging nations and debutants, friendlies are a chance to gain valuable experience playing against world-class stars, helping them adapt to the speed and physicality of international football. These games allow players to overcome the "stage fright" of representing their country, ensuring they are mentally and physically ready when the first whistle blows in the group stage.</p>
            
            <p>The 2026 preparation cycle is unique due to the three-nation hosting arrangement. Many teams are scheduling friendlies in North American cities to acclimate to the local climates, altitudes, and time zones. Playing a match in the humidity of Miami or the high altitude of Mexico City provides invaluable data for sports scientists and coaches. These "warm-up" tours also allow fans in the host nations to see global icons up close, fueling the excitement and anticipation for the main event. A friendly in Toronto or Los Angeles can become a major cultural event, celebrating the global reach of the sport.</p>
            
            <p>Tactically, friendlies allow for a degree of experimentation that competitive matches simply do not. A manager might test a new three-man defensive line or try a young attacking prodigy in a high-pressure role. These matches often feature a higher number of substitutions, allowing more squad members to get "minutes in the legs" and prove their worth for a spot in the final 26-man roster. The data gathered from these games—tracking player fitness, pass completion rates, and defensive positioning—is meticulously analyzed to refine the team’s strategy for the World Cup.</p>
            
            <p>Our portal tracks these international friendlies with the same dedication as the tournament matches themselves. We provide live scores, lineups, and key events for all major exhibition games involving World Cup contenders. Following these matches allows fans to track their team’s "form curve" and identify the rising stars who might become the breakout players of the tournament. A strong performance in a friendly can shift a nation’s momentum and build the confidence needed to overcome the challenges of a 48-team bracket.</p>
            
            <p>Ultimately, international friendlies are a celebration of football’s global community. They bring together nations in a spirit of sportsmanship and mutual respect, providing fans with beautiful moments of skill and passion outside the rigid structure of a competitive season. Whether it’s a historic rivalry renewed in a neutral city or a first-ever meeting between two distant nations, friendlies enrich the international football calendar. As we count down to the 2026 World Cup, these matches are the prologue to what promises to be the greatest story in the history of the beautiful game.</p>
        '
    ])
</div>
@endsection
