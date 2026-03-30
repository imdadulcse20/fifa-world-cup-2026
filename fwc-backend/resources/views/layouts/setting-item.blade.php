<div class="flex items-center justify-between p-5 cursor-pointer border-b border-white/5 last:border-0 hover:bg-white/5 transition-colors">
    <div class="flex items-center space-x-4">
        <div class="p-2 rounded-xl bg-white dark:bg-slate-800 shadow-sm {{ $iconColor }}">
            <i data-lucide="{{ $icon }}" class="w-5 h-5"></i>
        </div>
        <span class="font-bold text-sm">{{ $label }}</span>
    </div>
    <div class="flex items-center space-x-2 text-slate-500">
        @isset($value)
            <span class="text-xs font-medium">{{ $value }}</span>
        @endisset
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
    </div>
</div>
