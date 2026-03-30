@extends('layouts.admin')

@section('title', 'Portal Customization')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl border border-slate-100 dark:border-slate-700 overflow-hidden">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="p-10 space-y-8">
            @csrf
            
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Application Name</label>
                <input type="text" name="app_name" value="{{ $settings['app_name'] ?? '' }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Portal Description</label>
                <textarea name="portal_description" rows="4" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-medium focus:ring-2 focus:ring-primary-500">{{ $settings['portal_description'] ?? '' }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Footer Text</label>
                <input type="text" name="footer_text" value="{{ $settings['footer_text'] ?? '' }}" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    SAVE CHANGES
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
