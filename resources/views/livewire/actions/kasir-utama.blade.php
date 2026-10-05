<div class="max-w-6xl mx-auto p-4">

    <!-- Header Branding -->
    <div class="bg-white rounded-2xl shadow-lg p-5 mb-6 flex items-center justify-center">
        <img src="{{ asset('images/logo.png') }}" alt="Momsweetbaby by Bidan Yossy" class="h-20 object-contain">
    </div>
    @if (session()->has('error'))
        <div class="p-3 mb-4 bg-red-100 border border-red-300 text-red-700 rounded-lg text-sm">
            ⚠️ {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Kolom Kiri & Tengah -->
        <div class="md:col-span-2 space-y-6 bg-white p-6 rounded-2xl shadow-md">

            <div>
                <label class="block font-bold mb-2 text-gray-700">👤 Pilih Pasien</label>
                <select wire:model.live="pasien_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Daftar Obat -->
                <div>
                    <h3 class="font-bold border-b-2 border-pink-200 pb-2 text-rose-600 flex items-center gap-1">
                        💊 Daftar Obat
                    </h3>
                    <div class="space-y-2 mt-3 max-h-72 overflow-y-auto pr-1">
                        @forelse($obats as $o)
                            <button wire:click="tambahObat({{ $o->id }})"
                                class="w-full text-left p-3 bg-pink-50 hover:bg-pink-100 active:scale-[0.98] transition border border-pink-100 rounded-lg text-xs flex justify-between items-center">
                                <span>
                                    <span class="block font-semibold text-gray-800">{{ $o->nama }}</span>
                                    <span class="text-gray-400">Stok: {{ $o->stok }}</span>
                                </span>
                                <span class="font-bold text-rose-600">Rp{{ number_format($o->harga_jual) }}</span>
                            </button>
                        @empty
                            <p class="text-xs text-gray-400 italic">Belum ada data obat.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Tindakan / Layanan -->
                <div>
                    <h3 class="font-bold border-b-2 border-pink-200 pb-2 text-rose-600 flex items-center gap-1">
                        🩺 Tindakan / Layanan
                    </h3>
                    <div class="space-y-2 mt-3 max-h-72 overflow-y-auto pr-1">
                        @forelse($layanans as $l)
                            <button wire:click="tambahLayanan({{ $l->id }})"
                                class="w-full text-left p-3 bg-purple-50 hover:bg-purple-100 active:scale-[0.98] transition border border-purple-100 rounded-lg text-xs flex justify-between items-center">
                                <span class="font-semibold text-gray-800">{{ $l->nama_layanan }}</span>
                                <span class="font-bold text-purple-600">Rp{{ number_format($l->tarif) }}</span>
                            </button>
                        @empty
                            <p class="text-xs text-gray-400 italic">Belum ada data layanan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan -->
        <div class="bg-white p-5 border border-gray-100 rounded-2xl shadow-md flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-lg border-b pb-3 mb-3 text-gray-700 flex items-center gap-2">
                    🛒 Ringkasan Transaksi
                </h3>

                <div class="space-y-2 text-sm max-h-72 overflow-y-auto pr-1">
                    @forelse($keranjangObat as $id => $item)
                        <div class="flex justify-between items-center bg-gray-50 p-2 border border-gray-100 rounded-lg">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item['nama'] }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <button wire:click="kurangObat({{ $id }})" class="w-5 h-5 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-xs font-bold">-</button>
                                    <span class="text-xs">{{ $item['qty'] }} x Rp{{ number_format($item['harga']) }}</span>
                                    <button wire:click="tambahObat({{ $id }})" class="w-5 h-5 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-xs font-bold">+</button>
                                </div>
                            </div>
                            <button wire:click="hapusObat({{ $id }})" class="text-red-400 hover:text-red-600 text-xs">✕</button>
                        </div>
                    @empty
                    @endforelse

                    @forelse($keranjangLayanan as $id => $item)
                        <div class="flex justify-between items-center bg-gray-50 p-2 border border-gray-100 rounded-lg">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item['nama'] }}</p>
                                <p class="text-xs text-gray-500">Rp{{ number_format($item['tarif']) }}</p>
                            </div>
                            <button wire:click="hapusLayanan({{ $id }})" class="text-red-400 hover:text-red-600 text-xs">✕</button>
                        </div>
                    @empty
                    @endforelse

                    @if(empty($keranjangObat) && empty($keranjangLayanan))
                        <p class="text-xs text-gray-400 italic text-center py-6">Keranjang masih kosong</p>
                    @endif
                </div>
            </div>

            <div class="mt-4 pt-4 border-t">
                <div class="flex justify-between font-bold text-xl mb-4 text-rose-600">
                    <span>TOTAL:</span>
                    <span>Rp{{ number_format($totalHarga) }}</span>
                </div>
                <button wire:click="simpanTransaksi"
                    wire:loading.attr="disabled"
                    class="w-full py-3 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-bold rounded-xl shadow transition disabled:opacity-50">
                    <span wire:loading.remove>💵 BAYAR & CETAK STRUK</span>
                    <span wire:loading>⏳ Memproses...</span>
                </button>
            </div>
        </div>
    </div>
</div>