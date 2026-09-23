<header class="sticky top-0 z-50 bg-mystic-950/90 backdrop-blur border-b border-gold-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <span class="text-2xl">🔮</span>
                <span class="font-mystic text-xl md:text-2xl tracking-wide text-gold-400 group-hover:text-gold-300 transition">GARAM MAGIC</span>
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-gold-400 transition {{ request()->routeIs('home') ? 'text-gold-400' : 'text-mystic-200' }}">Home</a>
                <a href="{{ route('about') }}" class="hover:text-gold-400 transition {{ request()->routeIs('about') ? 'text-gold-400' : 'text-mystic-200' }}">Tentang</a>
                <a href="{{ route('products.index') }}" class="hover:text-gold-400 transition {{ request()->routeIs('products.*') ? 'text-gold-400' : 'text-mystic-200' }}">Produk</a>
                <a href="{{ route('education') }}" class="hover:text-gold-400 transition {{ request()->routeIs('education') ? 'text-gold-400' : 'text-mystic-200' }}">Tata Cara Mandi</a>
                <a href="{{ route('faq') }}" class="hover:text-gold-400 transition {{ request()->routeIs('faq') ? 'text-gold-400' : 'text-mystic-200' }}">FAQ</a>
                <a href="{{ route('contact') }}" class="hover:text-gold-400 transition {{ request()->routeIs('contact') ? 'text-gold-400' : 'text-mystic-200' }}">Kontak</a>
            </nav>

            <div class="flex items-center gap-4">
                <a href="{{ route('cart.index') }}" class="relative flex items-center gap-2 bg-mystic-800/60 hover:bg-mystic-700/70 border border-gold-500/30 rounded-full px-4 py-2 transition">
                    <span>🛒</span>
                    <span class="hidden sm:inline text-sm">Keranjang</span>
                    @php $cartCount = collect(session('cart', []))->sum(); @endphp
                    @if ($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-gold-500 text-mystic-950 text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                    @endif
                </a>

                <button x-data @click="mobileMenu = !mobileMenu" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="lg:hidden text-2xl text-gold-400">☰</button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-mystic-900 border-t border-gold-500/20 px-4 py-4 space-y-3 text-sm">
        <a href="{{ route('home') }}" class="block hover:text-gold-400">Home</a>
        <a href="{{ route('about') }}" class="block hover:text-gold-400">Tentang</a>
        <a href="{{ route('products.index') }}" class="block hover:text-gold-400">Produk</a>
        <a href="{{ route('education') }}" class="block hover:text-gold-400">Tata Cara Mandi</a>
        <a href="{{ route('faq') }}" class="block hover:text-gold-400">FAQ</a>
        <a href="{{ route('contact') }}" class="block hover:text-gold-400">Kontak</a>
    </div>
</header>
