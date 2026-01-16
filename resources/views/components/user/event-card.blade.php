@props(['title', 'date', 'location', 'price', 'image', 'href' => null])

@php
// Format Indonesian price
$formattedPrice = $price ? 'Rp ' . number_format($price, 0, ',', '.') : 'Harga tidak tersedia';

$formattedDate = $date
? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
: 'Tanggal tidak tersedia';

// Safe image URL: use external URL if provided, otherwise use asset (storage path)
$imageUrl = $image
? (filter_var($image, FILTER_VALIDATE_URL)
? $image
: asset('images/events/' . $image))
: asset('images/konser.jpeg');

@endphp

<div class="group bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transition-all">
    <div class="relative h-52 overflow-hidden">
        <img src="{{ $imageUrl }}"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

        <span class="absolute top-3 right-3 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">
            Event
        </span>
    </div>

    <div class="p-5">
        <h3 class="font-bold text-lg line-clamp-2">
            {{ $title }}
        </h3>

        <p class="text-sm text-gray-500 mt-2">
            📅 {{ $formattedDate }}
        </p>

        <p class="text-sm text-gray-500">
            📍 {{ $location }}
        </p>

        <div class="mt-4 flex justify-between items-center">
            <span class="font-extrabold text-blue-700 text-lg">
                {{ $formattedPrice }}
            </span>

            <button class="btn btn-sm btn-primary">
                Beli
            </button>
        </div>
    </div>
</div>
