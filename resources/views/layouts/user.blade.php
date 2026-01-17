<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BengTix')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white min-h-screen">

    {{-- NAVBAR --}}
    <x-user.navigation />

    {{-- CONTENT --}}
    <main class="bg-slate-950 text-white">
        @yield('content')
    </main>

</body>
</html>
