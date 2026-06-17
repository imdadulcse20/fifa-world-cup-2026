<!DOCTYPE html>
<html lang="en">
<head>
    @if(config('services.google.analytics_id'))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ config('services.google.analytics_id') }}');
    </script>
    @endif
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site_settings['app_name'] ?? '2026 World Cup' }} - @yield('title')</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="{{ $site_settings['primary_color'] ?? '#0ea5e9' }}">
    
    <script>
        // Inline script to prevent theme flash
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <meta name="description" content="@yield('meta_description', 'Get the latest 2026 World Cup scores, schedule, standings and team news. Stay updated with live match events and stadium information.')">
    <meta name="keywords" content="@yield('meta_keywords', '2026 World Cup, football scores, live soccer, match schedule, world cup standings, stadiums')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $site_settings['app_name'] ?? '2026 World Cup' }} - @yield('title')">
    <meta property="og:description" content="@yield('meta_description', 'Get the latest 2026 World Cup scores, schedule, standings and team news.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $site_settings['app_name'] ?? '2026 World Cup' }} - @yield('title')">
    <meta property="twitter:description" content="@yield('meta_description', 'Get the latest 2026 World Cup scores, schedule, standings and team news.')">
    <meta property="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    @stack('meta')

    @include('layouts.schema')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        :root {
            --primary-hex: {{ $site_settings['primary_color'] ?? '#0ea5e9' }};
        }
        .text-primary-500 { color: var(--primary-hex) !important; }
        .bg-primary-500, .bg-primary-600 { background-color: var(--primary-hex) !important; }
        .border-primary-500 { border-color: var(--primary-hex) !important; }
        .focus\:ring-primary-500:focus { --tw-ring-color: var(--primary-hex) !important; }
        .selection\:bg-primary-500\/30::selection { background-color: rgba(var(--primary-hex), 0.3) !important; }

        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans selection:bg-primary-500/30 min-h-screen">
    
    <!-- Navigation (Sidebar Desktop) -->
    <nav class="fixed top-0 left-0 bottom-0 w-20 hidden md:flex flex-col justify-between items-center py-8 glass dark:glass-dark border-r border-white/10 z-[100]">
        <div class="flex flex-col items-center space-y-8">
            <div class="w-12 h-12 bg-primary-600 rounded-2xl flex items-center justify-center shadow-lg shadow-primary-500/20 overflow-hidden">
                <img src="{{ asset('images/logo.jpeg') }}" alt="2026 World Cup" class="w-full h-full object-cover">
            </div>
            
            <div class="flex flex-col space-y-6">
                @include('layouts.nav-item', ['route' => 'home', 'icon' => 'home', 'label' => 'Home'])
                @include('layouts.nav-item', ['route' => 'schedule', 'icon' => 'calendar', 'label' => 'Matches'])
                @include('layouts.nav-item', ['route' => 'standings', 'icon' => 'trophy', 'label' => 'Standings'])
                @include('layouts.nav-item', ['route' => 'teams', 'icon' => 'users', 'label' => 'Teams'])
                @include('layouts.nav-item', ['route' => 'search', 'icon' => 'search', 'label' => 'Search'])
                @include('layouts.nav-item', ['route' => 'friendlies', 'icon' => 'flag', 'label' => 'Friendlies'])
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <!-- Notifications (Desktop) -->
            @auth
            <div x-data="{ 
                open: false, 
                notifications: [], 
                unreadCount: 0,
                fetchNotifications() {
                    fetch('/api/notifications')
                        .then(res => res.json())
                        .then(data => {
                            this.notifications = data;
                            this.unreadCount = data.length;
                        });
                },
                markRead() {
                    fetch('/api/notifications/read', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
                        .then(() => {
                            this.unreadCount = 0;
                            this.notifications = [];
                        });
                }
            }" x-init="fetchNotifications(); setInterval(() => fetchNotifications(), 30000)" class="relative">
                <button @click="open = !open; if(open) markRead()" class="p-3 rounded-2xl bg-slate-100 dark:bg-slate-900 text-slate-700 dark:text-slate-300 transition-all hover:scale-110 active:scale-95 shadow-lg border border-slate-200 dark:border-slate-800 relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <template x-if="unreadCount > 0">
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-black rounded-full flex items-center justify-center border-2 border-white dark:border-slate-950" x-text="unreadCount"></span>
                    </template>
                </button>

                <div x-show="open" @click.away="open = false" class="absolute left-full ml-4 bottom-0 w-80 bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden z-[200]">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                        <h3 class="font-black text-xs uppercase tracking-widest">Notifications</h3>
                    </div>
                    <div class="max-h-96 overflow-y-auto no-scrollbar">
                        <template x-if="notifications.length === 0">
                            <div class="p-10 text-center space-y-3">
                                <i data-lucide="bell-off" class="w-8 h-8 text-slate-300 mx-auto"></i>
                                <p class="text-xs text-slate-500 font-bold">All caught up!</p>
                            </div>
                        </template>
                        <template x-for="notif in notifications" :key="notif.id">
                            <div class="p-6 border-b border-slate-50 dark:border-slate-800/50 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors cursor-pointer">
                                <p class="text-[10px] font-black text-primary-500 uppercase tracking-tighter mb-1" x-text="notif.data.title"></p>
                                <p class="text-sm font-bold text-slate-700 dark:text-slate-200" x-text="notif.data.message"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            @endauth

            <button x-data @click="toggleTheme()" class="p-3 rounded-2xl bg-slate-100 dark:bg-slate-900 text-slate-700 dark:text-slate-300 transition-all hover:scale-110 active:scale-95 shadow-lg border border-slate-200 dark:border-slate-800">
                <i data-lucide="sun" class="hidden dark:block w-5 h-5"></i>
                <i data-lucide="moon" class="block dark:hidden w-5 h-5"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Bottom Nav -->
    <nav class="md:hidden fixed bottom-6 left-6 right-6 h-16 glass dark:glass-dark rounded-2xl flex items-center justify-around px-4 border border-white/20 shadow-2xl z-[100]">
        @include('layouts.nav-item', ['route' => 'home', 'icon' => 'home', 'label' => 'Home'])
        @include('layouts.nav-item', ['route' => 'schedule', 'icon' => 'calendar', 'label' => 'Matches'])
        @include('layouts.nav-item', ['route' => 'standings', 'icon' => 'trophy', 'label' => 'Standings'])
        @include('layouts.nav-item', ['route' => 'teams', 'icon' => 'users', 'label' => 'Teams'])
        @include('layouts.nav-item', ['route' => 'search', 'icon' => 'search', 'label' => 'Search'])
    </nav>

    <!-- Main Content Wrapper -->
    <div class="md:pl-20">
        <main class="container mx-auto px-4 pt-12 pb-24 md:pb-12">
            @yield('content')

            @if(isset($faqs) && $faqs->count() > 0)
                <section class="mt-32 mb-12 relative">
                    <div class="max-w-3xl mx-auto">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-black text-slate-800 dark:text-white uppercase tracking-tight">Helpful Information</h2>
                            <div class="w-12 h-1.5 bg-primary-500 mx-auto mt-4 rounded-full"></div>
                        </div>
                        
                        <div class="space-y-4" x-data="{ activeFaq: null }">
                            @foreach($faqs as $faq)
                                <div class="bg-white dark:bg-slate-900/50 rounded-[2rem] border border-slate-100 dark:border-slate-800/50 overflow-hidden shadow-sm transition-all hover:shadow-md backdrop-blur-sm">
                                    <button 
                                        @click="activeFaq === {{ $faq->id }} ? activeFaq = null : activeFaq = {{ $faq->id }}"
                                        class="w-full px-8 py-6 text-left flex items-center justify-between group"
                                    >
                                        <span class="font-bold text-slate-700 dark:text-slate-200 group-hover:text-primary-500 transition-colors">{{ $faq->question }}</span>
                                        <i 
                                            data-lucide="chevron-down" 
                                            class="w-5 h-5 text-slate-400 transition-transform duration-300"
                                            :class="{ 'rotate-180 text-primary-500': activeFaq === {{ $faq->id }} }"
                                        ></i>
                                    </button>
                                    <div 
                                        x-show="activeFaq === {{ $faq->id }}" 
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        class="px-8 pb-6 text-slate-500 dark:text-slate-400 leading-relaxed text-sm"
                                    >
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </main>

        <footer class="relative pt-24 pb-12 overflow-hidden bg-slate-50/50 dark:bg-transparent">
            <!-- Decoration Background -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-primary-500/20 to-transparent"></div>
            <div class="absolute -top-48 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-primary-500/[0.03] blur-[120px] rounded-full pointer-events-none"></div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
                    <!-- Brand Section -->
                    <div class="lg:col-span-4 space-y-8">
                        <div class="space-y-4">
                            <a href="{{ route('home') }}" class="inline-flex items-center space-x-3 group">
                                <div class="w-12 h-12 bg-primary-600 rounded-2xl flex items-center justify-center shadow-2xl shadow-primary-500/40 group-hover:rotate-6 transition-transform duration-500 overflow-hidden">
                                    <img src="{{ asset('images/logo.jpeg') }}" alt="2026 World Cup" class="w-full h-full object-cover">
                                </div>
                                <span class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tighter">
                                    {{ $site_settings['app_name'] ?? 'FWC 2026' }}
                                </span>
                            </a>
                            <p class="text-slate-500 dark:text-slate-400 font-medium leading-relaxed max-w-sm text-sm">
                                Experience the magic of the world's greatest stage. Every goal, every moment, every emotion — captured in real-time.
                            </p>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            @foreach(['twitter', 'facebook', 'instagram', 'youtube'] as $social)
                                <a href="#" class="w-11 h-11 bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl flex items-center justify-center text-slate-400 hover:text-primary-500 hover:border-primary-500/50 hover:shadow-lg hover:shadow-primary-500/10 transition-all duration-300">
                                    <i data-lucide="{{ $social }}" class="w-5 h-5"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Links Grid -->
                    <div class="lg:col-span-5 grid grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <h3 class="text-[11px] font-black uppercase tracking-[0.2em] text-primary-500">Tournament</h3>
                            <ul class="space-y-4">
                                @foreach([
                                    'schedule' => 'Match Schedule',
                                    'standings' => 'Group Standings',
                                    'teams' => 'National Teams',
                                    'stadiums' => 'Host Stadiums'
                                ] as $route => $label)
                                    <li>
                                        <a href="{{ route($route) }}" class="group flex items-center text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white font-bold text-sm transition-all">
                                            <span class="w-0 group-hover:w-4 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                                            {{ $label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="space-y-6">
                            <h3 class="text-[11px] font-black uppercase tracking-[0.2em] text-primary-500">Legal & Support</h3>
                            <ul class="space-y-4">
                                @foreach([
                                    'about' => 'About the Event',
                                    'contact' => 'Get in Touch',
                                    'privacy-policy' => 'Privacy Policy',
                                    'terms-conditions' => 'Terms of Service'
                                ] as $route => $label)
                                    <li>
                                        <a href="{{ route($route) }}" class="group flex items-center text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white font-bold text-sm transition-all">
                                            <span class="w-0 group-hover:w-4 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                                            {{ $label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Newsletter Section -->
                    <div class="lg:col-span-3 space-y-6">
                        <div class="bg-white dark:bg-slate-900/50 rounded-[2.5rem] p-8 border border-slate-100 dark:border-white/5 relative overflow-hidden group shadow-sm">
                            <div class="absolute -right-4 -top-4 w-24 h-24 bg-primary-500/10 blur-2xl rounded-full"></div>
                            
                            <h3 class="text-sm font-black text-slate-800 dark:text-white uppercase tracking-tight mb-2">Stay in the Loop</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mb-6 leading-relaxed">Get the latest scores and news delivered to your inbox.</p>
                            
                            <form action="#" class="space-y-3" onsubmit="alert('Subscribed!'); return false;">
                                <input type="email" placeholder="Your email..." required class="w-full bg-slate-50 dark:bg-slate-950 border-none rounded-2xl p-4 text-xs font-bold focus:ring-2 focus:ring-primary-500 transition-all">
                                <button type="submit" class="w-full py-4 bg-primary-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Bottom Copyright Section -->
                <div class="pt-10 border-t border-slate-100 dark:border-slate-900 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center space-x-6">
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">
                            &copy; {{ date('Y') }} {{ $site_settings['app_name'] ?? 'FWC 2026' }}
                        </p>
                        <div class="h-4 w-px bg-slate-200 dark:bg-slate-800 hidden md:block"></div>
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest hidden md:block">
                            Designed for the beautiful game
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-2 px-4 py-2 bg-slate-100 dark:bg-slate-900 rounded-full border border-slate-200 dark:border-slate-800">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Powered by</span>
                        <span class="text-[9px] font-black text-primary-500 uppercase">Football Spirit</span>
                        <i data-lucide="heart" class="w-3 h-3 text-red-500 fill-current ml-1"></i>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const formatTimezone = (date) => {
                const offset = -date.getTimezoneOffset();
                const sign = offset >= 0 ? '+' : '-';
                const hours = Math.floor(Math.abs(offset) / 60);
                const minutes = Math.abs(offset) % 60;
                return `GMT${sign}${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;
            };

            // Short local datetime for schedule list
            document.querySelectorAll('.local-datetime-short').forEach(el => {
                const utc = el.getAttribute('data-utc');
                if (utc) {
                    const date = new Date(utc + 'Z');
                    const timeStr = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false });
                    const dateStr = date.toLocaleDateString([], { month: 'short', day: 'numeric' });
                    el.textContent = `${dateStr}, ${timeStr} (${formatTimezone(date)})`;
                }
            });

            // Full local datetime for match details
            document.querySelectorAll('.local-datetime-full').forEach(el => {
                const utc = el.getAttribute('data-utc');
                if (utc) {
                    const date = new Date(utc + 'Z');
                    const options = { 
                        month: 'long', 
                        day: 'numeric', 
                        year: 'numeric',
                        hour: '2-digit', 
                        minute: '2-digit', 
                        hour12: true 
                    };
                    el.textContent = `${date.toLocaleString([], options)} (${formatTimezone(date)})`;
                }
            });

            // Live Score Auto Update
            function updateLiveScores() {
                const liveElements = document.querySelectorAll('[data-live="true"]');
                // Even if no live elements, we check if any upcoming matches started
                const matchContainer = document.querySelector('[data-match-id]');
                if (!matchContainer && liveElements.length === 0) return;

                fetch('/api/matches?status=live')
                    .then(response => response.json())
                    .then(json => {
                        const matches = json.data;
                        if (!matches) return;

                        // Check for status changes (e.g. upcoming -> live or live -> finished)
                        const activeIds = matches.map(m => m.id.toString());
                        let needsRefresh = false;
                        
                        // Check if any match that was live is now finished
                        liveElements.forEach(el => {
                            const id = el.getAttribute('data-match-id');
                            if (!activeIds.includes(id)) {
                                needsRefresh = true;
                            }
                        });

                        // Check if any match that is currently live is not marked as live in UI
                        matches.forEach(match => {
                            const el = document.querySelector(`[data-match-id="${match.id}"]`);
                            if (el && el.getAttribute('data-live') !== 'true') {
                                needsRefresh = true;
                            }
                        });

                        if (needsRefresh) {
                            window.location.reload();
                            return;
                        }

                        matches.forEach(match => {
                            const el = document.querySelector(`[data-match-id="${match.id}"]`);
                            if (el) {
                                // Update Score
                                const homeScoreEl = el.querySelector('.home-score');
                                const awayScoreEl = el.querySelector('.away-score');
                                const scoreBox = el.querySelector('.live-score-box');
                                
                                if (homeScoreEl && awayScoreEl) {
                                    if (homeScoreEl.textContent != match.home_score || awayScoreEl.textContent != match.away_score) {
                                        homeScoreEl.textContent = match.home_score;
                                        awayScoreEl.textContent = match.away_score;
                                        
                                        if (scoreBox) {
                                            scoreBox.classList.add('animate-pulse', 'scale-110');
                                            setTimeout(() => scoreBox.classList.remove('animate-pulse', 'scale-110'), 2000);
                                        }
                                    }
                                }

                                // Update Time/Status
                                const timeEl = el.querySelector('.match-time-display');
                                if (timeEl && match.match_time) {
                                    timeEl.textContent = match.match_time;
                                }

                                // Update Goal Scorers (Home/Schedule list)
                                const homeScorersContainer = el.querySelector('.goal-scorers-home');
                                const awayScorersContainer = el.querySelector('.goal-scorers-away');
                                
                                if (homeScorersContainer && awayScorersContainer && match.match_events) {
                                    const homeGoals = match.match_events.filter(e => e.type === 'goal' && e.team_id == match.home_team_id);
                                    const awayGoals = match.match_events.filter(e => e.type === 'goal' && e.team_id == match.away_team_id);
                                    
                                    // Update Home Scorers
                                    if (homeScorersContainer.children.length !== homeGoals.length) {
                                        homeScorersContainer.innerHTML = homeGoals.sort((a, b) => a.minute - b.minute).map(event => `
                                            <div class="flex items-center space-x-2 text-[9px] text-slate-500">
                                                <i data-lucide="goal" class="w-2.5 h-2.5 text-primary-500"></i>
                                                <span class="font-bold truncate">${event.player_name || (event.player ? event.player.name : 'Goal')}</span>
                                                <span class="text-slate-400 font-medium">${event.minute}'</span>
                                            </div>
                                        `).join('');
                                    }
                                    
                                    // Update Away Scorers
                                    if (awayScorersContainer.children.length !== awayGoals.length) {
                                        awayScorersContainer.innerHTML = awayGoals.sort((a, b) => a.minute - b.minute).map(event => `
                                            <div class="flex items-center justify-end space-x-2 text-[9px] text-slate-500">
                                                <span class="text-slate-400 font-medium">${event.minute}'</span>
                                                <span class="font-bold truncate">${event.player_name || (event.player ? event.player.name : 'Goal')}</span>
                                                <i data-lucide="goal" class="w-2.5 h-2.5 text-primary-500"></i>
                                            </div>
                                        `).join('');
                                    }
                                    
                                    if (window.lucide) window.lucide.createIcons();
                                }

                                // Update Timeline/Details (if on match details page)
                                const timelineContainer = document.getElementById('match-timeline-container');
                                if (timelineContainer && match.match_events) {
                                    if (timelineContainer.getAttribute('data-event-count') != match.match_events.length) {
                                        window.location.reload();
                                    }
                                }
                            }
                        });
                    })
                    .catch(err => console.error('Error fetching live scores:', err));
            }

            // Poll every 30 seconds if there are match elements on the page
            if (document.querySelectorAll('[data-match-id]').length > 0) {
                setInterval(updateLiveScores, 30000);
            }
        });

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => console.log('Service worker registered.', reg))
                    .catch(err => console.log('Service worker registration failed:', err));
            });
        }
    </script>
</body>
</html>
