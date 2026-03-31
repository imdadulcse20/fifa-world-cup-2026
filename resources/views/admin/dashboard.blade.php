@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white dark:bg-slate-800 p-6 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-700">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 text-blue-500 rounded-2xl">
                <i data-lucide="calendar"></i>
            </div>
            <span class="text-xs font-bold text-slate-400">TOTAL</span>
        </div>
        <span class="text-3xl font-black">{{ $stats['total_matches'] }}</span>
        <p class="text-xs text-slate-500 mt-1 font-bold">Matches Scheduled</p>
    </div>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-700">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-red-50 text-red-500 rounded-2xl">
                <i data-lucide="play" class="fill-current"></i>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase">Live</span>
        </div>
        <span class="text-3xl font-black text-red-500">{{ $stats['live_matches'] }}</span>
        <p class="text-xs text-slate-500 mt-1 font-bold">Matches in Progress</p>
    </div>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-700">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 text-green-500 rounded-2xl">
                <i data-lucide="check-circle"></i>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase">Done</span>
        </div>
        <span class="text-3xl font-black text-green-500">{{ $stats['finished_matches'] }}</span>
        <p class="text-xs text-slate-500 mt-1 font-bold">Results Finalized</p>
    </div>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-700">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-50 text-purple-500 rounded-2xl">
                <i data-lucide="users"></i>
            </div>
            <span class="text-xs font-bold text-slate-400 uppercase">Teams</span>
        </div>
        <span class="text-3xl font-black">{{ $stats['total_teams'] }}</span>
        <p class="text-xs text-slate-500 mt-1 font-bold">Nations Participating</p>
    </div>
</div>

<div class="mt-10 bg-primary-600 rounded-[3rem] p-10 text-white relative overflow-hidden shadow-2xl shadow-primary-500/30">
    <div class="relative z-10">
        <h2 class="text-3xl font-black mb-4">Welcome back, Admin!</h2>
        <p class="text-primary-100 max-w-lg mb-8 font-medium">You have full control over the 2026 World Cup data. Update scores in real-time, manage schedules, and customize the portal settings from this dashboard.</p>
        <a href="{{ route('admin.matches') }}" class="inline-flex items-center space-x-2 bg-white text-primary-600 px-8 py-3 rounded-2xl font-black text-sm shadow-xl hover:scale-105 transition-all">
            <span>START UPDATING SCORES</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>
    <div class="absolute -right-20 -bottom-20 opacity-10">
        <i data-lucide="trophy" class="w-96 h-96"></i>
    </div>
</div>
@endsection
