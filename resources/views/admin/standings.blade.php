@extends('layouts.admin')

@section('title', 'Manage Point Table')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tighter">Standings & Point Table</h1>
        <p class="text-slate-500 dark:text-slate-400 font-bold text-xs uppercase tracking-widest mt-1">Recalculate and monitor tournament rankings</p>
    </div>
    
    <form action="{{ route('admin.standings.recalculate') }}" method="POST">
        @csrf
        <button type="submit" class="inline-flex items-center space-x-2 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-primary-500/20 active:scale-95">
            <i data-lucide="refresh-cw" class="w-4 h-4"></i>
            <span>Recalculate All Standings</span>
        </button>
    </form>
</div>

<div class="grid grid-cols-1 gap-8">
    @forelse($groups as $groupName => $standings)
        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 dark:border-slate-700/50 bg-slate-50/50 dark:bg-slate-800/50 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-primary-500/20">
                        <span class="font-black text-lg">{{ substr($groupName, -1) }}</span>
                    </div>
                    <h3 class="text-lg font-black text-slate-800 dark:text-white uppercase tracking-tight">{{ $groupName }}</h3>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-50 dark:border-slate-700/50">
                            <th class="px-8 py-4">#</th>
                            <th class="px-4 py-4">Team</th>
                            <th class="px-4 py-4 text-center">P</th>
                            <th class="px-4 py-4 text-center">W</th>
                            <th class="px-4 py-4 text-center">D</th>
                            <th class="px-4 py-4 text-center">L</th>
                            <th class="px-4 py-4 text-center">GD</th>
                            <th class="px-4 py-4 text-center">PTS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-slate-700/50">
                        @foreach($standings->sortByDesc('points')->values() as $index => $standing)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors">
                                <td class="px-8 py-4">
                                    <span class="w-6 h-6 flex items-center justify-center rounded-lg {{ $index < 2 ? 'bg-green-100 text-green-600' : 'bg-slate-100 text-slate-500' }} text-[10px] font-black">
                                        {{ $index + 1 }}
                                    </span>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ asset('uploads/flags/' . strtolower(str_replace(' ', '_', $standing->team->name)) . '.png') }}" 
                                             alt="{{ $standing->team->name }}" 
                                             class="w-8 h-5 object-cover rounded shadow-sm">
                                        <span class="font-bold text-sm text-slate-700 dark:text-slate-200 uppercase tracking-tight">{{ $standing->team->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-center font-bold text-sm text-slate-500">{{ $standing->played }}</td>
                                <td class="px-4 py-4 text-center font-bold text-sm text-slate-500">{{ $standing->won }}</td>
                                <td class="px-4 py-4 text-center font-bold text-sm text-slate-500">{{ $standing->drawn }}</td>
                                <td class="px-4 py-4 text-center font-bold text-sm text-slate-500">{{ $standing->lost }}</td>
                                <td class="px-4 py-4 text-center font-bold text-sm {{ $standing->goal_difference > 0 ? 'text-green-500' : ($standing->goal_difference < 0 ? 'text-red-500' : 'text-slate-500') }}">
                                    {{ $standing->goal_difference > 0 ? '+' : '' }}{{ $standing->goal_difference }}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <span class="bg-primary-50 dark:bg-primary-500/10 text-primary-600 dark:text-primary-400 px-3 py-1 rounded-lg font-black text-sm">
                                        {{ $standing->points }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] p-20 text-center border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="w-20 h-20 bg-slate-50 dark:bg-slate-700/50 rounded-[2rem] flex items-center justify-center mx-auto mb-6">
                <i data-lucide="info" class="w-10 h-10 text-slate-300"></i>
            </div>
            <h3 class="text-xl font-black text-slate-800 dark:text-white uppercase">No standings data yet</h3>
            <p class="text-slate-500 dark:text-slate-400 font-bold text-xs uppercase tracking-widest mt-2">Finish some matches or click recalculate to generate the point table.</p>
        </div>
    @endforelse
</div>
@endsection
