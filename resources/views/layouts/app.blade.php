<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard')</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    {{-- Load Tailwind via Vite --}}
    @vite(['resources/css/app.css', 'resources/css/map.css', 'resources/js/app.js'])
</head>


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<body class="relative min-h-screen">

    <!-- Glass Overlay -->
    <div class="fixed inset-0 bg-white/60 backdrop-blur-none z-0 pointer-events-none"></div>


    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Navbar --}}
    @include('components.navbar')

    <!-- Main Content -->
    <main class="relative z-10 lg:ml-64 p-6">
        @yield('content')
    </main>
 <x-floatingbutton title="Tambah Data" class="bg-black z-50 lg:hidden"></x-floatingbutton>
</body>

</html>
