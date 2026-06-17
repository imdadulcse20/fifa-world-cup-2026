@extends('layouts.admin')

@section('title', 'Manage Match Events')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Event Form -->
    <div class="lg:col-span-1 space-y-8">
        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-700 p-8">
            <h3 class="font-black text-slate-900 dark:text-white uppercase tracking-widest text-xs mb-8 flex items-center">
                <i data-lucide="plus-circle" class="w-4 h-4 mr-2 text-primary-500"></i>
                Add New Event
            </h3>

            <form action="{{ route('admin.matches.events.store', $match->id) }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Team</label>
                    <select name="team_id" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500 appearance-none">
                        <option value="{{ $match->home_team_id }}">{{ $match->homeTeam->name }} (Home)</option>
                        <option value="{{ $match->away_team_id }}">{{ $match->awayTeam->name }} (Away)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Event Type</label>
                    <select name="type" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500 appearance-none">
                        <option value="goal">Goal</option>
                        <option value="yellow_card">Yellow Card</option>
                        <option value="red_card">Red Card</option>
                        <option value="substitution">Substitution</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Player</label>
                    <select name="player_id" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500 appearance-none">
                        <optgroup label="{{ $match->homeTeam->name }}">
                            @foreach($match->homeTeam->players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="{{ $match->awayTeam->name }}">
                            @foreach($match->awayTeam->players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Minute</label>
                    <input type="number" name="minute" min="1" max="120" value="1" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                </div>

                <button type="submit" class="w-full py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    ADD EVENT
                </button>
            </form>
        </div>

        <!-- Match Stats Form -->
        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-700 p-8">
            <h3 class="font-black text-slate-900 dark:text-white uppercase tracking-widest text-xs mb-8 flex items-center">
                <i data-lucide="bar-chart-2" class="w-4 h-4 mr-2 text-primary-500"></i>
                Match Statistics
            </h3>

            <form action="{{ route('admin.matches.stats.update', $match->id) }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Possession (%)</label>
                        <input type="number" name="home_possession" value="{{ $match->stats->home_possession ?? 50 }}" min="0" max="100" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Shots</label>
                            <input type="number" name="home_shots" value="{{ $match->stats->home_shots ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away Shots</label>
                            <input type="number" name="away_shots" value="{{ $match->stats->away_shots ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home S.O.T</label>
                            <input type="number" name="home_shots_on_target" value="{{ $match->stats->home_shots_on_target ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away S.O.T</label>
                            <input type="number" name="away_shots_on_target" value="{{ $match->stats->away_shots_on_target ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Corners</label>
                            <input type="number" name="home_corners" value="{{ $match->stats->home_corners ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away Corners</label>
                            <input type="number" name="away_corners" value="{{ $match->stats->away_corners ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Fouls</label>
                            <input type="number" name="home_fouls" value="{{ $match->stats->home_fouls ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away Fouls</label>
                            <input type="number" name="away_fouls" value="{{ $match->stats->away_fouls ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Yellow</label>
                            <input type="number" name="home_yellow_cards" value="{{ $match->stats->home_yellow_cards ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away Yellow</label>
                            <input type="number" name="away_yellow_cards" value="{{ $match->stats->away_yellow_cards ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Red</label>
                            <input type="number" name="home_red_cards" value="{{ $match->stats->home_red_cards ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away Red</label>
                            <input type="number" name="away_red_cards" value="{{ $match->stats->away_red_cards ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Home Offsides</label>
                            <input type="number" name="home_offsides" value="{{ $match->stats->home_offsides ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Away Offsides</label>
                            <input type="number" name="away_offsides" value="{{ $match->stats->away_offsides ?? 0 }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-slate-900 dark:bg-slate-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl hover:scale-[1.02] active:scale-95 transition-all">
                    SAVE STATISTICS
                </button>
            </form>
        </div>
    </div>

    <!-- Events & Lineups List -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Lineups Section -->
        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-700 overflow-hidden">
            <div class="p-8 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <h3 class="font-black text-slate-900 dark:text-white uppercase tracking-widest text-xs">Match Lineups</h3>
                <button onclick="document.getElementById('addLineupForm').classList.toggle('hidden')" class="p-2 text-primary-500 hover:scale-110 transition-transform">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                </button>
            </div>

            <div id="addLineupForm" class="hidden p-8 bg-slate-50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-700">
                <form action="{{ route('admin.matches.lineups.store', $match->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @csrf
                    <div class="md:col-span-1">
                        <select name="team_id" required class="w-full bg-white dark:bg-slate-800 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                            <option value="{{ $match->home_team_id }}">{{ $match->homeTeam->name }}</option>
                            <option value="{{ $match->away_team_id }}">{{ $match->awayTeam->name }}</option>
                        </select>
                    </div>
                    <div class="md:col-span-1">
                        <select name="player_id" required class="w-full bg-white dark:bg-slate-800 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                            @foreach($match->homeTeam->players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }} ({{ $match->homeTeam->name }})</option>
                            @endforeach
                            @foreach($match->awayTeam->players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }} ({{ $match->awayTeam->name }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-1 flex items-center space-x-4">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="is_starter" checked class="w-4 h-4 rounded text-primary-500 focus:ring-primary-500">
                            <span class="text-[10px] font-black uppercase text-slate-500">Starter</span>
                        </label>
                        <input type="text" name="position_name" placeholder="Pos (GK, FW...)" class="flex-1 bg-white dark:bg-slate-800 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-primary-500">
                    </div>
                    <button type="submit" class="bg-primary-500 text-white rounded-xl font-black text-[10px] uppercase tracking-widest shadow-lg shadow-primary-500/20">
                        ADD TO LINEUP
                    </button>
                </form>
            </div>

            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Home Lineup -->
                <div class="space-y-4">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary-500 mb-4">{{ $match->homeTeam->name }}</h4>
                    <div class="space-y-2">
                        @foreach($match->lineups->where('team_id', $match->home_team_id)->sortByDesc('is_starter') as $lineup)
                            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-100 dark:border-slate-800">
                                <div class="flex items-center space-x-3">
                                    <span class="text-[8px] font-black {{ $lineup->is_starter ? 'text-green-500' : 'text-slate-400' }} uppercase">{{ $lineup->is_starter ? 'Starter' : 'Sub' }}</span>
                                    <span class="font-bold text-xs">{{ $lineup->player->name }}</span>
                                    @if($lineup->position_name)
                                        <span class="text-[10px] font-black text-slate-400">/ {{ $lineup->position_name }}</span>
                                    @endif
                                </div>
                                <form action="{{ route('admin.matches.lineups.delete', $lineup->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-500">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Away Lineup -->
                <div class="space-y-4">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary-500 mb-4">{{ $match->awayTeam->name }}</h4>
                    <div class="space-y-2">
                        @foreach($match->lineups->where('team_id', $match->away_team_id)->sortByDesc('is_starter') as $lineup)
                            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-100 dark:border-slate-800">
                                <div class="flex items-center space-x-3">
                                    <span class="text-[8px] font-black {{ $lineup->is_starter ? 'text-green-500' : 'text-slate-400' }} uppercase">{{ $lineup->is_starter ? 'Starter' : 'Sub' }}</span>
                                    <span class="font-bold text-xs">{{ $lineup->player->name }}</span>
                                    @if($lineup->position_name)
                                        <span class="text-[10px] font-black text-slate-400">/ {{ $lineup->position_name }}</span>
                                    @endif
                                </div>
                                <form action="{{ route('admin.matches.lineups.delete', $lineup->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-500">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-700 overflow-hidden">
            <div class="p-8 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <h3 class="font-black text-slate-900 dark:text-white uppercase tracking-widest text-xs">Timeline of Events</h3>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <span class="font-black text-2xl">{{ $match->home_score }}</span>
                        <span class="text-slate-300">-</span>
                        <span class="font-black text-2xl">{{ $match->away_score }}</span>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="relative space-y-8 before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent">
                    @forelse($match->matchEvents->sortBy('minute') as $event)
                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                            <!-- Icon -->
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white dark:border-slate-700 bg-slate-100 dark:bg-slate-900 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                                @if($event->type === 'goal')
                                    <i data-lucide="circle-dot" class="w-4 h-4 text-primary-500"></i>
                                @elseif($event->type === 'yellow_card')
                                    <div class="w-3 h-4 bg-yellow-400 rounded-sm"></div>
                                @elseif($event->type === 'red_card')
                                    <div class="w-3 h-4 bg-red-500 rounded-sm"></div>
                                @else
                                    <i data-lucide="repeat" class="w-4 h-4 text-slate-400"></i>
                                @endif
                            </div>
                            <!-- Content -->
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-slate-50 dark:bg-slate-900/50 p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <span class="font-black text-primary-500 text-sm">{{ $event->minute }}'</span>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-sm">{{ $event->player_name ?: ($event->player->name ?? 'Goal') }}</span>
                                        <span class="text-[10px] uppercase font-black text-slate-400 tracking-widest">{{ $event->team->name ?? 'Unknown Team' }}</span>
                                    </div>
                                </div>
                                <form action="{{ route('admin.matches.events.delete', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-500 p-2">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <i data-lucide="info" class="w-12 h-12 text-slate-200 mx-auto mb-4"></i>
                            <p class="text-slate-400 font-bold">No events recorded for this match yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
