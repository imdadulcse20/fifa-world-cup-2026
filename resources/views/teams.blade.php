@extends('layouts.app')

@section('title', '2026 World Cup Participating Teams & Squads')
@section('meta_description', 'Explore all 48 teams participating in the 2026 World Cup. View team profiles, squads, coaches, and FIFA rankings.')

@section('content')
<div class="space-y-12 max-w-lg mx-auto md:max-w-none pb-12">
    <header>
        <h1 class="text-3xl font-black">Teams</h1>
        <p class="text-slate-500 text-sm mt-1">Participating nations by group & FIFA Ranking</p>
    </header>

    @foreach($teams as $groupName => $groupTeams)
        <section class="space-y-6">
            <div class="flex items-center justify-between px-4">
                <h2 class="text-2xl font-black text-primary-500 flex items-center space-x-3">
                    <span class="w-8 h-1 bg-primary-500 rounded-full"></span>
                    <span>{{ $groupName }}</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($groupTeams as $team)
                    <div class="p-6 rounded-[2.5rem] glass dark:glass-dark border border-white/10 flex flex-col space-y-4 hover:scale-[1.02] transition-all cursor-pointer group shadow-lg relative overflow-hidden"
                         onclick="window.location='{{ route('team-details', $team->id) }}'">
                        <!-- Ranking Badge -->
                        <div class="absolute top-4 right-6 flex flex-col items-end">
                            <span class="text-[10px] font-black text-slate-500 uppercase">FIFA RANK</span>
                            <span class="text-2xl font-black text-primary-500">#{{ $team->fifa_rank }}</span>
                        </div>

                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($team->flag_url) }}" class="w-20 h-14 object-cover rounded-xl shadow-2xl group-hover:rotate-2 transition-transform duration-500" alt="">
                            <div>
                                <span class="font-black text-xl block leading-tight">{{ $team->name }}</span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">{{ $team->coach }}</span>
                            </div>
                        </div>

                        <!-- Ranking Stats -->
                        <div class="grid grid-cols-2 gap-2 pt-4 border-t border-white/5">
                            <div class="bg-white/5 p-3 rounded-2xl">
                                <span class="text-[8px] font-black text-slate-500 uppercase block">Highest</span>
                                <span class="font-bold text-green-500 text-sm">#{{ $team->highest_rank }}</span>
                            </div>
                            <div class="bg-white/5 p-3 rounded-2xl">
                                <span class="text-[8px] font-black text-slate-500 uppercase block">Lowest</span>
                                <span class="font-bold text-red-500 text-sm">#{{ $team->lowest_rank }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'A Global Showcase of 48 Nations',
        'content' => '
            <p>The 2026 FIFA World Cup™ features an unprecedented gathering of 48 national teams, making it the most inclusive and diverse edition of the tournament since its inception in 1930. This expansion from the traditional 32-team format allows for a broader representation of global football talent, bringing more nations from Africa, Asia, North America, South America, Oceania, and Europe into the spotlight. The "Teams" section of our portal is your gateway to exploring the stories, squads, and ambitions of these 48 contenders as they vie for the most coveted trophy in sports.</p>
            
            <p>Each participating nation brings its own unique footballing heritage and cultural identity to the tournament. From the rhythmic flair of South American giants to the disciplined tactical prowess of European powerhouses, the variety of playing styles on display is staggering. The expansion particularly benefits emerging football regions, providing a platform for smaller nations to test themselves against the world’s best. This creates a fascinating dynamic where established legends of the game meet rising stars and spirited underdogs, ensuring that every group is a melting pot of styles and stories.</p>
            
            <p>Host nations Canada, Mexico, and the United States qualify automatically, each carrying the weight of home expectations. Mexico, as a two-time host, brings its rich World Cup history and the iconic Estadio Azteca into the fold. The United States, having seen massive growth in the sport since 1994, aims to leverage its world-class facilities and passionate home support. Canada, making its third appearance, represents the growing North American interest in the beautiful game. Together, these hosts provide the backdrop for 45 other nations to chase their dreams across the continent.</p>
            
            <p>Individual team profiles on our site provide a deep dive into each squad’s composition. From the experienced veterans who have seen it all to the young prodigies making their debut on the world stage, we track every player’s journey. You can find detailed information on head coaches and their tactical philosophies, as well as recent form and historical performance data. Understanding the "human element" of each team—the sacrifices, the triumphs, and the collective spirit—is what makes following the World Cup so compelling for millions of fans worldwide.</p>
            
            <p>FIFA Rankings offer a glimpse into the perceived strength of each team, but as every football fan knows, the World Cup is where rankings often get thrown out the window. The tournament is famous for its "giant-killers" and "Cinderella stories," where a supposedly lesser team finds the inspiration to defeat a global superpower. Our portal tracks these shifts in real-time, reflecting how tournament performance impacts a nation’s standing in the world of football. Whether a team is ranked #1 or #48, their potential for greatness is what keeps us watching every single match.</p>
            
            <p>As the teams navigate the group stage and hopefully progress into the knockout rounds, their stories will evolve. New heroes will emerge, records will be broken, and national icons will be forged in the heat of competition. Following the 48 teams of the 2026 World Cup is more than just following sports; it is about witnessing the heartbeat of nations and the universal language of football. We are committed to providing you with the most comprehensive and engaging team data to ensure you are part of every goal, every save, and every celebration throughout this historic event.</p>
        '
    ])
</div>
@endsection
