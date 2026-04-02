<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site_settings['app_name'] ?? '2026 World Cup' }} - @yield('title')</title>
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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
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
<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans selection:bg-primary-500/30 min-h-screen pb-24 md:pb-0 md:pl-20">
    
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 md:bottom-0 md:right-auto md:w-20 glass dark:glass-dark border-b md:border-r border-white/10 px-4 py-2 md:py-8 flex flex-row md:flex-col justify-between items-center">
        <div class="flex items-center space-x-2 md:space-x-0 md:space-y-8 md:flex-col">
            <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/20">
                <span class="text-white font-bold text-xl">26</span>
            </div>
        </div>

        <div class="hidden md:flex flex-col space-y-6">
            @include('layouts.nav-item', ['route' => 'home', 'icon' => 'home', 'label' => 'Home'])
            @include('layouts.nav-item', ['route' => 'schedule', 'icon' => 'calendar', 'label' => 'Matches'])
            @include('layouts.nav-item', ['route' => 'standings', 'icon' => 'trophy', 'label' => 'Standings'])
            @include('layouts.nav-item', ['route' => 'teams', 'icon' => 'users', 'label' => 'Teams'])
            @include('layouts.nav-item', ['route' => 'friendlies', 'icon' => 'flag', 'label' => 'Friendlies'])
        </div>

        <button x-data @click="document.documentElement.classList.toggle('dark')" class="p-2 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 transition-all hover:scale-110 active:scale-95 shadow-lg">
            <i data-lucide="sun" class="hidden dark:block w-5 h-5"></i>
            <i data-lucide="moon" class="block dark:hidden w-5 h-5"></i>
        </button>
    </nav>

    <!-- Mobile Bottom Nav -->
    <nav class="md:hidden fixed bottom-6 left-6 right-6 z-50 h-16 glass dark:glass-dark rounded-2xl flex items-center justify-around px-4 border border-white/20 shadow-2xl">
        @include('layouts.nav-item', ['route' => 'home', 'icon' => 'home', 'label' => 'Home'])
        @include('layouts.nav-item', ['route' => 'schedule', 'icon' => 'calendar', 'label' => 'Matches'])
        @include('layouts.nav-item', ['route' => 'standings', 'icon' => 'trophy', 'label' => 'Standings'])
        @include('layouts.nav-item', ['route' => 'teams', 'icon' => 'users', 'label' => 'Teams'])
        @include('layouts.nav-item', ['route' => 'friendlies', 'icon' => 'flag', 'label' => 'Friendlies'])
        @include('layouts.nav-item', ['route' => 'settings', 'icon' => 'settings', 'label' => 'Settings'])
    </nav>

    <main class="container mx-auto px-4 pt-20 md:pt-8">
        @yield('content')
    </main>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

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
        });
    </script>
</body>
</html>
l>
