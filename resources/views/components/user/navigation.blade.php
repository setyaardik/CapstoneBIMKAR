<nav class="sticky top-0 z-50 backdrop-blur-md bg-slate-950/80 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        {{-- LEFT --}}
        <div class="flex items-center gap-12">
            <a href="{{ route('home') }}"
               class="flex items-center gap-1 text-2xl font-extrabold tracking-tight">
                <span class="text-blue-500">Beng</span>
                <span class="text-white">Tix</span>
            </a>

            <div class="hidden md:flex gap-8 text-sm font-medium text-slate-400">
                @php
                    $navClass = 'relative transition hover:text-white
                        after:absolute after:left-0 after:-bottom-1
                        after:h-0.5 after:w-0 after:bg-blue-500
                        after:transition-all hover:after:w-full';
                @endphp

                <a href="{{ route('home') }}" class="{{ $navClass }}">Home</a>
                <a href="#event" class="{{ $navClass }}">Event</a>
                <a href="#cara-kerja" class="{{ $navClass }}">Cara Kerja</a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-medium rounded-lg
                          border border-slate-700 text-slate-300
                          hover:text-white hover:border-slate-500
                          hover:bg-slate-900 transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 text-sm font-semibold rounded-lg
                          bg-blue-600 text-white
                          hover:bg-blue-700 transition shadow-md">
                    Register
                </a>
            @endguest

            @auth
                <div class="relative group">
                    <button
                        class="flex items-center gap-2 px-4 py-2 rounded-lg
                               bg-slate-800/70 hover:bg-slate-800
                               text-white transition">
                        <span class="text-sm font-medium">
                            {{ Auth::user()->name }}
                        </span>
                        <svg class="w-4 h-4 text-slate-300 transition group-hover:rotate-180"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div
                        class="absolute right-0 mt-3 w-48 rounded-xl
                               bg-slate-900 border border-slate-700
                               shadow-xl overflow-hidden
                               opacity-0 invisible
                               group-hover:opacity-100 group-hover:visible
                               translate-y-2 group-hover:translate-y-0
                               transition-all duration-200">

                        <a href="#"
                           class="block px-4 py-3 text-sm text-slate-300
                                  hover:bg-slate-800 hover:text-white">
                            Riwayat Pembelian
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="w-full text-left px-4 py-3 text-sm
                                       text-red-400 hover:bg-red-500/10
                                       hover:text-red-500">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>

    </div>
</nav>
