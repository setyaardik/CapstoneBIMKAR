<nav class="bg-slate-900/80 backdrop-blur border-b border-slate-700">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        {{-- LEFT --}}
        <div class="flex items-center gap-10">
            <a href="{{ route('home') }}" class="text-xl font-bold text-white">
                BengTix
            </a>

            <div class="hidden md:flex gap-6 text-sm">
                <a href="{{ route('home') }}" class="hover:text-blue-400">Home</a>
                <a href="{{ route('home') }}#event">Event</a>
                <a href="#cara-kerja" class="hover:text-blue-400">Cara Kerja</a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('login') }}" class="px-4 py-2 border border-slate-600 rounded hover:bg-slate-800">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 rounded hover:bg-blue-700">
                    Register
                </a>
            @endguest

            @auth
                <div class="relative group">
                    <button class="flex items-center gap-2">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="absolute right-0 mt-2 w-40 bg-slate-800 rounded shadow-lg hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 hover:bg-slate-700">Riwayat</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-red-600">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>

    </div>
</nav>
