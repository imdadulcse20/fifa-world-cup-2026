@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="max-w-lg mx-auto space-y-8 pb-20">
    <header>
        <h1 class="text-3xl font-black">Settings</h1>
        <p class="text-slate-500 text-sm mt-1">Manage your preferences and account</p>
    </header>

    <div class="space-y-4">
        <section class="space-y-2">
            <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-500 px-4">Preference</h2>
            <div class="rounded-[2rem] glass dark:glass-dark border border-white/10 overflow-hidden">
                @include('layouts.setting-item', ['icon' => 'globe', 'iconColor' => 'text-blue-500', 'label' => 'Language', 'value' => 'English'])
                @include('layouts.setting-item', ['icon' => 'bell', 'iconColor' => 'text-red-500', 'label' => 'Notifications', 'value' => 'On'])
                @include('layouts.setting-item', ['icon' => 'moon', 'iconColor' => 'text-purple-500', 'label' => 'Theme', 'value' => 'Dark'])
            </div>
        </section>

        <section class="space-y-2">
            <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-500 px-4">Support</h2>
            <div class="rounded-[2rem] glass dark:glass-dark border border-white/10 overflow-hidden">
                @include('layouts.setting-item', ['icon' => 'shield', 'iconColor' => 'text-green-500', 'label' => 'Privacy Policy'])
                @include('layouts.setting-item', ['icon' => 'info', 'iconColor' => 'text-slate-500', 'label' => 'About 2026 App'])
            </div>
        </section>
    </div>

    <div class="p-8 rounded-[2rem] bg-primary-500 text-white shadow-2xl shadow-primary-500/30 relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="font-black text-xl mb-2">FIFA World Cup 2026</h3>
            <p class="text-white/80 text-sm mb-6">Get the most out of the tournament with premium features.</p>
            <button class="bg-white text-primary-600 px-6 py-2 rounded-full font-bold text-xs shadow-lg">
                GO PREMIUM
            </button>
        </div>
        <div class="absolute -right-4 -bottom-4 opacity-10">
            <i data-lucide="settings" class="w-32 h-32"></i>
        </div>
    </div>
    
    <p class="text-center text-[10px] text-slate-500 font-bold uppercase tracking-widest">Version 1.0.0 (Blade Edition)</p>
</div>
@endsection
