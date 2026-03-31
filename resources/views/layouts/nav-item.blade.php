<a href="{{ route($route) }}" 
   class="p-2 rounded-xl transition-all duration-300 flex flex-col items-center justify-center space-y-1 relative group {{ request()->routeIs($route) ? 'text-primary-500' : 'text-slate-500 hover:text-slate-700 dark:hover:text-slate-300' }}">
    <div class="relative z-10 transition-transform duration-300 group-hover:scale-110 {{ request()->routeIs($route) ? 'scale-110' : '' }}">
        <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
    </div>
    <span class="text-[10px] font-medium md:hidden">{{ $label }}</span>
    @if(request()->routeIs($route))
        <div class="absolute inset-0 bg-primary-500/10 rounded-xl"></div>
    @endif
</a>
