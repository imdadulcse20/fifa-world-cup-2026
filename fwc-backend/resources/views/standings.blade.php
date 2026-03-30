@extends('layouts.app')

@section('title', 'Standings')

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
                            @foreach($groupTeams->sortByDesc('points')->sortByDesc('goal_difference')->sortByDesc('goals_for') as $index => $standing)
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
</div>
@endsection
