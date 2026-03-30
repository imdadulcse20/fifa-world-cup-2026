@extends('layouts.app')

@section('title', 'Teams')

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
</div>
@endsection
