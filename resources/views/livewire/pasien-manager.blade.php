<div class="max-w-6xl mx-auto p-4">
    <div class="bg-gradient-to-r from-pink-400 to-rose-400 rounded-2xl shadow-lg p-5 mb-6 text-white">
        <h1 class="text-xl font-bold">👤 Manajemen Data Pasien</h1>
        <p class="text-sm text-pink-50">Momsweetbaby by Bidan Yossy</p>
    </div>

    @if (session()->has('success'))
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h3 class="font-bold text-gray-700 mb-4">{{ $editId ? '✏️ Edit Pasien' : '➕ Tambah Pasien Baru' }}</h3>
        <form wire:submit.prevent="simpan" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-semibold mb-1">Nama *</label>
                <input type="text" wire:model="nama" class="w-full p-2 border rounded-lg">
                @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">NIK</label>
                <input type="text" wire:model="nik" class="w-full p-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
                <select wire:model="jenis_kelamin" class="w-full p-2 border rounded-lg">
                    <option value="">-- Pilih --</option>
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-laki</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
                <input type="date" wire:model="tanggal_lahir" class="w-full p-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">No HP</label>
                <input type="text" wire:model="no_hp" class="w-full p-2 border rounded-lg">
            </div>
            <div class="md:col-span-3">
                <label class="block text-sm font-semibold mb-1">Alamat</label>
                <textarea wire:model="alamat" class="w-full p-2 border rounded-lg" rows="2"></textarea>
            </div>
            <div class="md:col-span-3 flex gap-2">
                <button type="submit" class="px-6 py-2 bg-rose-500 hover:bg-rose-600 text-white font-bold rounded-lg">
                    {{ $editId ? 'Update' : 'Simpan' }}
                </button>
                @if($editId)
                    <button type="button" wire:click="resetForm" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                        Batal
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-2xl shadow-md overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-pink-50 text-gray-700">
                <tr>
                    <th class="p-3 text-left">No RM</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">JK</th>
                    <th class="p-3 text-left">Tgl Lahir</th>
                    <th class="p-3 text-left">No HP</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pasiens as $p)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $p->no_rekam_medis }}</td>
                        <td class="p-3 font-semibold">{{ $p->nama }}</td>
                        <td class="p-3">{{ $p->jenis_kelamin }}</td>
                        <td class="p-3">{{ $p->tanggal_lahir?->format('d/m/Y') }}</td>
                        <td class="p-3">{{ $p->no_hp }}</td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit({{ $p->id }})" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="hapus({{ $p->id }})" wire:confirm="Yakin hapus data ini?" class="text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-4 text-center text-gray-400 italic">Belum ada data pasien</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>