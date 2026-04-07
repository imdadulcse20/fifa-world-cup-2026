@extends('layouts.app')

@section('title', 'About the Tournament')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 md:p-16 shadow-xl border border-slate-100 dark:border-slate-800">
        <h1 class="text-4xl font-black mb-8 text-slate-800 dark:text-white uppercase tracking-tight">About FIFA World Cup 2026</h1>
        
        <div class="prose dark:prose-invert prose-slate max-w-none space-y-8 text-slate-600 dark:text-slate-400">
            <p class="text-xl font-medium leading-relaxed">The FIFA World Cup 2026™ will be the 23rd FIFA World Cup, the quadrennial international men's football championship contested by the national teams of the member associations of FIFA.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-8">
                <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl text-center">
                    <div class="text-3xl font-black text-primary-500 mb-2">48</div>
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400">Teams</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl text-center">
                    <div class="text-3xl font-black text-primary-500 mb-2">16</div>
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400">Host Cities</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl text-center">
                    <div class="text-3xl font-black text-primary-500 mb-2">3</div>
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400">Host Nations</p>
                </div>
            </div>

            <section class="space-y-4 pt-8">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tight">The Vision</h2>
                <p>The 2026 edition marks a historic milestone in football history. By expanding to 48 teams, FIFA aims to provide more opportunities for nations across the globe to participate in the world's most prestigious sporting event.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tight">Host Nations</h2>
                <p>For the first time, the tournament will be hosted by three North American countries: Canada, Mexico, and the United States. This collaboration reflects the unifying power of football and the shared passion for the sport across the continent.</p>
            </section>
        </div>
    </div>
</div>
@endsection
