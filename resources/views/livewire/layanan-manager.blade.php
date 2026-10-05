<div class="max-w-4xl mx-auto p-4">
    <div class="bg-gradient-to-r from-pink-400 to-rose-400 rounded-2xl shadow-lg p-5 mb-6 text-white">
        <h1 class="text-xl font-bold">🩺 Manajemen Layanan / Poli</h1>
        <p class="text-sm text-pink-50">Momsweetbaby by Bidan Yossy</p>
    </div>

    @if (session()->has('success'))
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h3 class="font-bold text-gray-700 mb-4">{{ $editId ? '✏️ Edit Layanan' : '➕ Tambah Layanan Baru' }}</h3>
        <form wire:submit.prevent="simpan" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Nama Layanan *</label>
                <input type="text" wire:model="nama_layanan" class="w-full p-2 border rounded-lg" placeholder="Contoh: Pemeriksaan USG">
                @error('nama_layanan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Tarif *</label>
                <input type="number" wire:model="tarif" class="w-full p-2 border rounded-lg">
                @error('tarif') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="md:col-span-3 flex gap-2">
                <button type="submit" class="px-6 py-2 bg-rose-500 hover:bg-rose-600 text-white font-bold rounded-lg">
                    {{ $editId ? 'Update' : 'Simpan' }}
                </button>
                @if($editId)
                    <button type="button" wire:click="resetForm" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Batal</button>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-md overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-pink-50 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Nama Layanan</th>
                    <th class="p-3 text-left">Tarif</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $l)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3 font-semibold">{{ $l->nama_layanan }}</td>
                        <td class="p-3">Rp{{ number_format($l->tarif) }}</td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit({{ $l->id }})" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="hapus({{ $l->id }})" wire:confirm="Yakin hapus layanan ini?" class="text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="p-4 text-center text-gray-400 italic">Belum ada data layanan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>