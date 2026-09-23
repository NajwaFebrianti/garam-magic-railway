<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — GARAM MAGIC</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: {
                    mystic: { 950:'#12071f',900:'#1e0b36',800:'#2c1152',700:'#3c1a72',600:'#4f2196',500:'#6b2fc0',400:'#8b4fdb',300:'#b083ea',200:'#d6bdf5',100:'#ede2fb' },
                    gold: { 400:'#e8c874',500:'#d4af37',600:'#b08c26' },
                },
                fontFamily: { mystic: ['"Cinzel Decorative"','serif'], body: ['Poppins','sans-serif'] },
            }}
        }
    </script>
    <style>body{font-family:'Poppins',sans-serif;} .font-mystic{font-family:'Cinzel Decorative',serif;}</style>
</head>
<body class="bg-mystic-950 text-mystic-100 min-h-screen flex">

    <aside class="w-64 bg-mystic-900 border-r border-gold-500/20 flex-shrink-0 hidden md:flex md:flex-col">
        <div class="p-6 border-b border-gold-500/20">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <span class="text-xl">🔮</span>
                <span class="font-mystic text-gold-400">GARAM MAGIC</span>
            </a>
            <p class="text-xs text-mystic-400 mt-1">Admin Panel</p>
        </div>
        <nav class="flex-1 p-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-mystic-700 text-gold-400' : 'text-mystic-300 hover:bg-mystic-800' }}">📊 Dashboard</a>
            <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.orders.*') ? 'bg-mystic-700 text-gold-400' : 'text-mystic-300 hover:bg-mystic-800' }}">📦 Pesanan</a>
            <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.customers.*') ? 'bg-mystic-700 text-gold-400' : 'text-mystic-300 hover:bg-mystic-800' }}">👥 Pelanggan</a>
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.products.*') ? 'bg-mystic-700 text-gold-400' : 'text-mystic-300 hover:bg-mystic-800' }}">🧂 Produk</a>
            <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'bg-mystic-700 text-gold-400' : 'text-mystic-300 hover:bg-mystic-800' }}">✉️ Pesan Masuk</a>
        </nav>
        <div class="p-4 border-t border-gold-500/20">
            <a href="{{ route('home') }}" class="block text-xs text-mystic-400 hover:text-gold-400 mb-3">← Lihat Website</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left text-sm text-red-400 hover:text-red-300">🚪 Keluar</button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-mystic-900/60 border-b border-gold-500/20 px-6 py-4 flex items-center justify-between">
            <h1 class="font-mystic text-lg text-gold-400">@yield('title', 'Dashboard')</h1>
            <span class="text-sm text-mystic-300">{{ auth()->user()->name ?? 'Admin' }}</span>
        </header>

        <main class="flex-1 p-6">
            @if (session('success'))
                <div class="mb-4 bg-mystic-800/80 border border-gold-500/40 text-gold-400 rounded-lg px-4 py-3 text-sm">✨ {{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-4 bg-red-950/60 border border-red-500/40 text-red-300 rounded-lg px-4 py-3 text-sm">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
