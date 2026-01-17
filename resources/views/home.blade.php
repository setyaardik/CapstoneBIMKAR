@extends('layouts.user')

@section('title', 'Home')

@section('content')

{{-- HERO --}}
<section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-950 py-36">
    <div class="max-w-5xl mx-auto text-center px-6">
        <h1 class="text-5xl md:text-6xl font-extrabold text-black mb-6 leading-tight">
            Amankan Tiket <span class="text-blue-500">Event Favoritmu</span>
        </h1>

        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            BengTix membantu kamu beli tiket event dengan cepat, aman, dan tanpa ribet.
        </p>
    </div>
</section>

{{-- EVENT LIST --}}
<section class="max-w-7xl mx-auto px-6 -mt-20 text-gray-900">

    <div class="bg-white rounded-3xl p-8 shadow-2xl">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <h2 class="text-2xl font-extrabold">
                🎉 Event Terbaru
            </h2>

            <div class="flex gap-2 flex-wrap">
                <a href="{{ route('home') }}">
                    <x-user.category-pill label="Semua" :active="!request('kategori')" />
                </a>

                @foreach($categories as $kategori)
                    <a href="{{ route('home', ['kategori' => $kategori->id]) }}">
                        <x-user.category-pill
                            :label="$kategori->nama"
                            :active="request('kategori') == $kategori->id" />
                    </a>
                @endforeach
            </div>
        </div>

        {{-- GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($events as $event)
                <x-user.event-card
                    :title="$event->judul"
                    :date="$event->tanggal_waktu"
                    :location="$event->lokasi"
                    :price="$event->tikets_min_harga"
                    :image="$event->gambar"
                />
            @empty
                <p class="col-span-full text-center text-slate-500">
                    Belum ada event tersedia
                </p>
            @endforelse
        </div>

    </div>
</section>

@endsection
