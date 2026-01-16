<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-white">

    {{-- NAVBAR USER --}}
    <x-user.navigation />

    {{-- CONTENT --}}
    <main class="max-w-7xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>

</body>
</html>
