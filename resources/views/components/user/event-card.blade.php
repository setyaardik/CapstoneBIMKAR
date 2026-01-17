@props(['title', 'date', 'location', 'price', 'image', 'href' => '#'])

@php
$formattedPrice = $price ? 'Rp ' . number_format($price, 0, ',', '.') : 'Gratis';

$formattedDate = $date
    ? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d M Y • H:i')
    : 'Tanggal belum tersedia';

$imageUrl = $image
    ? (filter_var($image, FILTER_VALIDATE_URL)
        ? $image
        : asset('images/events/' . $image))
    : asset('images/konser.jpeg');
@endphp

<a href="{{ $href }}" class="group block">
    <div class="group bg-white text-gray-900 rounded-2xl overflow-hidden shadow hover:shadow-xl transition-all">

        {{-- IMAGE --}}
        <div class="relative h-52 overflow-hidden">
            <img src="{{ $imageUrl }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

            <span class="absolute top-3 left-3 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">
                EVENT
            </span>
        </div>

        {{-- CONTENT --}}
        <div class="p-5 space-y-2">
            <h3 class="font-bold text-lg line-clamp-2 text-gray-900">
                {{ $title }}
            </h3>

            <p class="text-sm text-slate-500">
                📅 {{ $formattedDate }}
            </p>

            <p class="text-sm text-slate-500">
                📍 {{ $location }}
            </p>

            <div class="pt-4 flex items-center justify-between">
                <span class="font-extrabold text-blue-700 text-lg">
                    {{ $formattedPrice }}
                </span>

                <span class="text-sm font-semibold text-blue-600 group-hover:underline">
                    Lihat →
                </span>
            </div>
        </div>
    </div>
</a>
