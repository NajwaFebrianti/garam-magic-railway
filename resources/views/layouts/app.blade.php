<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GARAM MAGIC — Garam Mandi Metafisik Penetral Energi Negatif')</title>
    <meta name="description" content="GARAM MAGIC — Garam mandi metafisik untuk membersihkan aura, menarik pengasihan, dan melancarkan rezeki. Garam AURA & Garam HOKI, masing-masing Rp 40.000.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mystic: {
                            950: '#12071f',
                            900: '#1e0b36',
                            800: '#2c1152',
                            700: '#3c1a72',
                            600: '#4f2196',
                            500: '#6b2fc0',
                            400: '#8b4fdb',
                            300: '#b083ea',
                            200: '#d6bdf5',
                            100: '#ede2fb',
                        },
                        gold: {
                            400: '#e8c874',
                            500: '#d4af37',
                            600: '#b08c26',
                        },
                    },
                    fontFamily: {
                        mystic: ['"Cinzel Decorative"', 'serif'],
                        body: ['Poppins', 'sans-serif'],
                    },
                    backgroundImage: {
                        'mystic-gradient': 'radial-gradient(circle at 20% 20%, rgba(139,79,219,0.25), transparent 45%), radial-gradient(circle at 80% 0%, rgba(212,175,55,0.12), transparent 40%), linear-gradient(180deg, #12071f 0%, #1e0b36 50%, #2c1152 100%)',
                    },
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-mystic { font-family: 'Cinzel Decorative', serif; }
        .sparkle-divider { background: linear-gradient(90deg, transparent, #d4af37, transparent); height: 1px; }
        .glow-card { box-shadow: 0 0 0 1px rgba(212,175,55,0.15), 0 10px 40px -10px rgba(107,47,192,0.5); }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1e0b36; }
        ::-webkit-scrollbar-thumb { background: #6b2fc0; border-radius: 4px; }
    </style>
    @stack('styles')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-mystic-gradient text-mystic-100 min-h-screen flex flex-col">

    @include('partials.navbar')

    @if (session('success'))
        <div class="max-w-4xl mx-auto w-full px-4 mt-4">
            <div class="bg-mystic-800/80 border border-gold-500/40 text-gold-400 rounded-lg px-4 py-3 text-sm text-center backdrop-blur">
                ✨ {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-4xl mx-auto w-full px-4 mt-4">
            <div class="bg-red-950/60 border border-red-500/40 text-red-300 rounded-lg px-4 py-3 text-sm text-center backdrop-blur">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
