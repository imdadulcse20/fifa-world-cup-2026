@extends('layouts.app')

@section('title', '2026 World Cup Group Standings & Rankings')
@section('meta_description', 'Track the latest group standings and rankings for the 2026 World Cup. See points, goal differences, and qualification status for all teams.')

@section('content')
<div class="space-y-12 max-w-4xl mx-auto pb-20">
    <header>
        <h1 class="text-3xl font-black">Group Standings</h1>
        <p class="text-slate-500 text-sm mt-1">Real-time rankings for all 12 groups</p>
    </header>

    <!-- Group Tables -->
    <div class="grid grid-cols-1 gap-12">
        @foreach($standings as $groupName => $groupTeams)
            <section class="space-y-4">
                <h2 class="text-xl font-black px-4 text-primary-500 flex items-center space-x-2">
                    <span class="w-2 h-2 bg-primary-500 rounded-full"></span>
                    <span>{{ $groupName }}</span>
                </h2>
                <div class="overflow-hidden rounded-[2rem] glass dark:glass-dark border border-white/10 shadow-xl">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-white/5 text-[10px] font-black uppercase tracking-widest text-slate-500">
                            <tr>
                                <th class="px-6 py-4">Team</th>
                                <th class="px-4 py-4 text-center">P</th>
                                <th class="px-4 py-4 text-center">W</th>
                                <th class="px-4 py-4 text-center">D</th>
                                <th class="px-4 py-4 text-center">L</th>
                                <th class="px-4 py-4 text-center">GD</th>
                                <th class="px-6 py-4 text-center">PTS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach($groupTeams as $index => $standing)
                                <tr class="hover:bg-white/5 transition-colors {{ $index < 2 ? 'bg-primary-500/5' : '' }}">
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <span class="text-xs font-bold text-slate-500 w-4">{{ $index + 1 }}</span>
                                        <img src="{{ asset($standing->team->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                                        <span class="font-bold">{{ $standing->team->name }}</span>
                                    </td>
                                    <td class="px-4 py-4 text-center font-medium">{{ $standing->played }}</td>
                                    <td class="px-4 py-4 text-center font-medium text-green-500">{{ $standing->won }}</td>
                                    <td class="px-4 py-4 text-center font-medium text-slate-400">{{ $standing->drawn }}</td>
                                    <td class="px-4 py-4 text-center font-medium text-red-500">{{ $standing->lost }}</td>
                                    <td class="px-4 py-4 text-center font-medium">{{ $standing->goal_difference }}</td>
                                    <td class="px-6 py-4 text-center font-black text-primary-500">{{ $standing->points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @endforeach
    </div>

    <!-- Ranking of third-placed teams -->
    <section class="space-y-6 pt-12 border-t border-white/10">
        <header>
            <h2 class="text-2xl font-black">Ranking of third-placed teams</h2>
            <p class="text-slate-500 text-sm mt-1">The 8 best third-placed teams advance to the Round of 32.</p>
        </header>

        <div class="overflow-hidden rounded-[2rem] glass dark:glass-dark border border-white/10 shadow-2xl relative">
            <!-- Qualifying Zone Indicator -->
            <div class="absolute left-0 top-[164px] bottom-0 w-1 bg-green-500 h-[384px] z-10"></div>

            <table class="w-full text-left text-sm">
                <thead class="bg-white/5 text-[10px] font-black uppercase tracking-widest text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Grp</th>
                        <th class="px-6 py-4">Team</th>
                        <th class="px-4 py-4 text-center">P</th>
                        <th class="px-4 py-4 text-center">W</th>
                        <th class="px-4 py-4 text-center">D</th>
                        <th class="px-4 py-4 text-center">L</th>
                        <th class="px-4 py-4 text-center">GD</th>
                        <th class="px-6 py-4 text-center">PTS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($thirdPlacedRankings as $index => $standing)
                        <tr class="hover:bg-white/5 transition-colors {{ $index < 8 ? 'bg-green-500/5' : 'opacity-60' }}">
                            <td class="px-6 py-4 font-bold text-slate-500 text-xs">{{ substr($standing->group_name, -1) }}</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <span class="text-xs font-bold text-slate-500 w-4">{{ $index + 1 }}</span>
                                <img src="{{ asset($standing->team->flag_url) }}" class="w-8 h-5 object-cover rounded shadow-sm" alt="">
                                <span class="font-black">{{ $standing->team->name }}</span>
                                @if($index < 8)
                                    <span class="text-[8px] bg-green-500 text-white px-1.5 py-0.5 rounded-full font-bold">QUALIFIED</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center font-medium">{{ $standing->played }}</td>
                            <td class="px-4 py-4 text-center font-medium">{{ $standing->won }}</td>
                            <td class="px-4 py-4 text-center font-medium">{{ $standing->drawn }}</td>
                            <td class="px-4 py-4 text-center font-medium">{{ $standing->lost }}</td>
                            <td class="px-4 py-4 text-center font-medium">{{ $standing->goal_difference }}</td>
                            <td class="px-6 py-4 text-center font-black text-primary-500">{{ $standing->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="flex items-center space-x-2 text-[10px] font-bold text-slate-500 px-4">
            <div class="w-3 h-3 bg-green-500/20 border border-green-500/50 rounded-sm"></div>
            <span>ADVANCING TO ROUND OF 32</span>
        </div>
    </section>

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'Understanding the New Standing Dynamics',
        'content' => '
            <p>The 2026 FIFA World Cup™ introduces a transformative group stage format that redefines how teams qualify for the knockout rounds. With 48 teams competing in 12 groups of four, the standings tables are more dynamic and critical than ever before. Every goal scored, every clean sheet kept, and every card received can have a profound impact on a team’s destiny. In this new era, the race to the top of the group is just the beginning, as the qualifying criteria have expanded to include more opportunities and more complexity.</p>
            
            <p>The core rules of the standings remain familiar: three points for a win, one for a draw, and zero for a loss. However, with the introduction of 12 groups, the competition for the Round of 32 becomes a multi-layered challenge. While the top two teams from each group automatically advance, the true drama often lies in the "best third-placed" rankings. This "tournament within a tournament" compares the third-placed teams from all 12 groups, with the top eight advancing. This means that even a team that starts slowly can still find a path to glory if they finish their group stage strongly.</p>
            
            <p>Tie-breakers play a crucial role in the standings when teams finish level on points. The primary tie-breaker remains goal difference in all group matches, followed by the total number of goals scored. If teams are still level, their head-to-head record is consulted. This hierarchy ensures that attacking football is rewarded, as scoring more goals can often be the deciding factor between advancing or going home. In the rare event that teams are still tied after these criteria, fair play points—calculated based on yellow and red cards—are used as a final sporting measure before a random draw is required.</p>
            
            <p>Our real-time standings table is designed to keep you informed of these shifting dynamics as they happen. As live matches progress, the "as-it-stands" rankings update with every goal, allowing you to see which teams are currently in a qualifying position. This is particularly exciting during the final matches of each group, often played simultaneously, where a single goal in one stadium can send a team three cities away into the next round. The drama of the "live table" is one of the most thrilling aspects of the World Cup group stage.</p>
            
            <p>The expansion to 48 teams also means that more confederations have more representatives, leading to a greater variety of playing styles and matchups in the standings. Fans will see historic giants of the game competing in the same tables as emerging nations making their first-ever appearances. This diversity enriches the tournament and makes the standings a fascinating study of global football progress. Whether a team is a perennial favorite or a spirited underdog, their journey is captured perfectly in the numbers and rankings of our standings section.</p>
            
            <p>As we transition into the knockout phases, the standings serve as the foundation for the Round of 32 bracket. The positioning in the group determines a team’s potential path through the tournament, including which geographic regions they will play in and which opponents they might face. Understanding the standings is therefore essential for any fan who wants to predict the eventual champion. From Group A to Group L, every position matters, every point is precious, and every moment is part of the unfolding story of the greatest World Cup ever held.</p>
        '
    ])
</div>
@endsection
