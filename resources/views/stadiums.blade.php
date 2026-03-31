@extends('layouts.app')

@section('title', 'Stadiums')

@section('content')
<div class="space-y-6 max-w-lg mx-auto md:max-w-none pb-12">
    <header>
        <h1 class="text-3xl font-black">2026 Stadiums</h1>
        <p class="text-slate-500 text-sm mt-1">Explore the venues across North America</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($stadiums as $stadium)
            <div class="rounded-[2.5rem] overflow-hidden glass dark:glass-dark border border-white/10 group shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $stadium->image_url }}" alt="{{ $stadium->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
                    <div class="absolute bottom-4 left-6 right-6">
                        <h3 class="text-white font-black text-xl leading-tight">{{ $stadium->name }}</h3>
                        <div class="flex items-center text-white/80 text-xs mt-1">
                            <i data-lucide="map-pin" class="w-3 h-3 mr-1"></i>
                            <span>{{ $stadium->city }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 flex justify-between items-center">
                    <div class="flex flex-col">
                        <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Capacity</span>
                        <div class="flex items-center space-x-1 mt-1 text-primary-500">
                            <i data-lucide="users" class="w-3.5 h-3.5"></i>
                            <span class="font-bold text-slate-900 dark:text-slate-100">{{ number_format($stadium->capacity) }}</span>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-primary-500 text-white rounded-full text-[10px] font-bold shadow-lg shadow-primary-500/30">
                            MATCHES
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
