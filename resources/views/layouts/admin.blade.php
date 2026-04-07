<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ $site_settings['app_name'] ?? 'FWC 2026' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100 font-sans antialiased">
    
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 hidden md:block">
            <div class="p-6">
                <span class="text-xl font-black text-primary-600 uppercase tracking-tighter">Admin Portal</span>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50 text-slate-500' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="font-bold">Dashboard</span>
                </a>
                <a href="{{ route('admin.matches') }}" class="flex items-center space-x-3 p-3 rounded-xl {{ request()->routeIs('admin.matches') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50 text-slate-500' }}">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                    <span class="font-bold">Manage Matches</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 p-3 rounded-xl {{ request()->routeIs('admin.settings') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50 text-slate-500' }}">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span class="font-bold">Portal Settings</span>
                </a>
                <a href="{{ route('admin.faqs') }}" class="flex items-center space-x-3 p-3 rounded-xl {{ request()->routeIs('admin.faqs') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50 text-slate-500' }}">
                    <i data-lucide="help-circle" class="w-5 h-5"></i>
                    <span class="font-bold">Manage FAQs</span>
                </a>
                <div class="pt-10">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 p-3 rounded-xl text-slate-400 hover:text-slate-600">
                        <i data-lucide="external-link" class="w-5 h-5"></i>
                        <span class="font-bold text-sm">View Live Site</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <header class="h-16 bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between px-8">
                <h2 class="font-bold">@yield('title')</h2>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-500">
                        <i data-lucide="bell" class="w-4 h-4"></i>
                    </button>
                    <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold text-xs">A</div>
                </div>
            </header>

            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500 text-white rounded-2xl font-bold text-sm shadow-lg shadow-green-500/20">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
