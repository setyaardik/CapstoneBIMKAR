<x-app-layout>
<div class="relative bg-gradient-to-br from-blue-900 via-slate-900 to-black py-32">
    <div class="absolute inset-0 bg-[url('/images/noise.png')] opacity-10"></div>

    <div class="relative max-w-6xl mx-auto px-6 text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
            Amankan Tiket <br>
            <span class="text-blue-400">Event Favoritmu</span>
        </h1>

        <p class="mt-6 text-lg text-slate-300 max-w-xl">
            BengTix memudahkan kamu beli tiket konser, seminar, dan event seru lainnya.
        </p>

        <div class="mt-8 flex gap-4">
            <a href="#event" class="btn btn-primary px-8">
                Jelajahi Event
            </a>
            <a href="#" class="btn btn-outline text-white">
                Cara Kerja
            </a>
        </div>
    </div>
</div>

    <section class="max-w-7xl mx-auto py-12 px-6 bg-white rounded-xl -mt-20 relative z-10">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black uppercase italic">Event</h2>
            <div class="flex gap-2">
                <a href="{{ route('home') }}">
                    <x-user.category-pill :label="'Semua'" :active="!request('kategori')" />
                </a>
                @foreach($categories as $kategori)
                <a href="{{ route('home', ['kategori' => $kategori->id]) }}">
                    <x-user.category-pill :label="$kategori->nama" :active="request('kategori') == $kategori->id" />
                </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($events as $event)
            <x-user.event-card :title="$event->judul" :date="$event->tanggal_waktu" :location="$event->lokasi"
                :price="$event->tikets_min_harga" :image="$event->gambar" />
            @endforeach
        </div>
    </section>
</x-app-layout>