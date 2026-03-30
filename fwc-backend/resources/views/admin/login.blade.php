<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - 2026 World Cup</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <div class="w-20 h-20 bg-primary-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-primary-500/20 mx-auto mb-6">
                <span class="text-white font-black text-4xl">26</span>
            </div>
            <h1 class="text-2xl font-black text-white">FIFA World Cup 2026</h1>
            <p class="text-slate-500 text-sm font-bold uppercase tracking-widest mt-2">Admin Portal Access</p>
        </div>

        <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-10 rounded-[3rem] shadow-2xl">
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Email Address</label>
                    <input type="email" name="email" required class="w-full bg-white/5 border-none rounded-2xl p-4 font-bold text-white focus:ring-2 focus:ring-primary-500" placeholder="admin@fwc2026.com">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Password</label>
                    <input type="password" name="password" required class="w-full bg-white/5 border-none rounded-2xl p-4 font-bold text-white focus:ring-2 focus:ring-primary-500" placeholder="••••••••">
                </div>

                @if($errors->any())
                    <div class="p-4 bg-red-500/10 border border-red-500/20 rounded-2xl text-red-500 text-xs font-bold text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        LOGIN TO DASHBOARD
                    </button>
                </div>
            </form>
        </div>
        
        <p class="text-center text-[10px] text-slate-600 font-bold uppercase tracking-widest mt-10">Authorized Personnel Only</p>
    </div>
</body>
</html>
