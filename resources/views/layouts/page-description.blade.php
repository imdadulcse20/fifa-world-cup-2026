<section class="mt-16 mb-12" x-data="{ expanded: false }">
    <div class="bg-white dark:bg-slate-900/50 rounded-[2.5rem] p-8 md:p-12 border border-slate-100 dark:border-slate-800/50 shadow-sm backdrop-blur-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-500/5 blur-3xl rounded-full -mr-16 -mt-16"></div>
        
        <h2 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tight mb-6 flex items-center">
            <span class="w-8 h-1 bg-primary-500 rounded-full mr-4"></span>
            {{ $title }}
        </h2>

        <div class="prose dark:prose-invert prose-slate max-w-none">
            <div class="text-slate-600 dark:text-slate-400 leading-relaxed font-medium transition-all duration-300">
                <!-- Preview Text (approx 120 chars) -->
                <div x-show="!expanded" class="relative">
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($content), 120) }}</p>
                    <div class="absolute bottom-0 left-0 right-0 h-4 bg-gradient-to-t from-white dark:from-slate-900/50 to-transparent"></div>
                </div>

                <!-- Full Content -->
                <div x-show="expanded" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    {!! $content !!}
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <button @click="expanded = !expanded" 
                    class="group flex items-center space-x-2 px-6 py-3 bg-slate-100 dark:bg-slate-800 hover:bg-primary-500 hover:text-white text-slate-600 dark:text-slate-300 rounded-2xl font-black text-[10px] uppercase tracking-widest transition-all duration-300">
                <span x-text="expanded ? 'Show Less' : 'Read Full Description'"></span>
                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300" :class="expanded ? 'rotate-180' : ''"></i>
            </button>
        </div>
    </div>
</section>

<style>
    [x-cloak] { display: none !important; }
</style>
