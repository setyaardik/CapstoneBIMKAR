<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LOGO -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="font-bold text-xl">
                    BengTix Admin
                </a>
            </div>

            <!-- MENU DESKTOP -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-black">
                    Dashboard
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-black">
                        Admin Panel
                    </a>
                @endif

                <!-- DROPDOWN USER -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-gray-700">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- HAMBURGER -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" class="sm:hidden px-4 pb-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block">Dashboard</a>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="block">Admin Panel</a>
        @endif

        <a href="{{ route('profile.edit') }}" class="block">Profile</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-left w-full">Logout</button>
        </form>
    </div>
</nav>
