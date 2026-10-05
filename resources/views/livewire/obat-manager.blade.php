<div class="max-w-5xl mx-auto p-4">
    <div class="bg-gradient-to-r from-pink-400 to-rose-400 rounded-2xl shadow-lg p-5 mb-6 text-white">
        <h1 class="text-xl font-bold">💊 Manajemen Obat</h1>
        <p class="text-sm text-pink-50">Momsweetbaby by Bidan Yossy</p>
    </div>

    @if (session()->has('success'))
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h3 class="font-bold text-gray-700 mb-4">{{ $editId ? '✏️ Edit Obat' : '➕ Tambah Obat Baru' }}</h3>
        <form wire:submit.prevent="simpan" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Nama Obat *</label>
                <input type="text" wire:model="nama" class="w-full p-2 border rounded-lg">
                @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Stok *</label>
                <input type="number" wire:model="stok" class="w-full p-2 border rounded-lg">
                @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Harga Jual *</label>
                <input type="number" wire:model="harga_jual" class="w-full p-2 border rounded-lg">
                @error('harga_jual') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Kadaluarsa</label>
                <input type="date" wire:model="expired_at" class="w-full p-2 border rounded-lg">
            </div>
            <div class="md:col-span-4 flex gap-2">
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
                    <th class="p-3 text-left">Nama Obat</th>
                    <th class="p-3 text-left">Stok</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-left">Kadaluarsa</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obats as $o)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3 font-semibold">{{ $o->nama }}</td>
                        <td class="p-3">{{ $o->stok }}</td>
                        <td class="p-3">Rp{{ number_format($o->harga_jual) }}</td>
                        <td class="p-3">{{ $o->expired_at?->format('d/m/Y') }}</td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit({{ $o->id }})" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="hapus({{ $o->id }})" wire:confirm="Yakin hapus obat ini?" class="text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-4 text-center text-gray-400 italic">Belum ada data obat</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>