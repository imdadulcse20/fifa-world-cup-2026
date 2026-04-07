@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] shadow-xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-10 md:p-16 space-y-8">
                <div>
                    <h1 class="text-4xl font-black text-slate-800 dark:text-white uppercase tracking-tight mb-4">Contact Us</h1>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Have questions or feedback about the 2026 World Cup? We'd love to hear from you.</p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-500/10 rounded-2xl flex items-center justify-center text-primary-500">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Email Address</p>
                            <p class="font-bold text-slate-700 dark:text-slate-200">support@fwc2026.com</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-500/10 rounded-2xl flex items-center justify-center text-primary-500">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Main Office</p>
                            <p class="font-bold text-slate-700 dark:text-slate-200">New York, United States</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 dark:bg-slate-800/50 p-10 md:p-16">
                <form action="#" method="POST" class="space-y-6" onsubmit="alert('Message sent! (Demo only)'); return false;">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Full Name</label>
                        <input type="text" required class="w-full bg-white dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Email Address</label>
                        <input type="email" required class="w-full bg-white dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Message</label>
                        <textarea rows="4" required class="w-full bg-white dark:bg-slate-900 border-none rounded-2xl p-4 font-medium focus:ring-2 focus:ring-primary-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        SEND MESSAGE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
