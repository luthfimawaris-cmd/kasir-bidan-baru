<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir Bidan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">

    <nav class="bg-emerald-600 p-4 text-white shadow-md">
        <div class="container mx-auto font-bold text-lg">
            🩺 Sistem Kasir Klinik Bidan
        </div>
    </nav>

    <div class="container mx-auto p-6">
    @livewire('App\Livewire\KasirUtama')
</div>

    @livewireScripts
</body>
</html>