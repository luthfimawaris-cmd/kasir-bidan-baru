<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Kasir Bidan' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow-sm mb-4">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center gap-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 object-contain">
            <a href="/kasir" class="text-sm text-gray-600 hover:text-rose-600">Kasir</a>
            <a href="/pasien" class="text-sm text-gray-600 hover:text-rose-600">Pasien</a>
            <a href="/obat" class="text-sm text-gray-600 hover:text-rose-600">Obat</a>
            <a href="/layanan" class="text-sm text-gray-600 hover:text-rose-600">Layanan</a>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>