<div class="max-w-6xl mx-auto p-4">

    <!-- Header Branding -->
    <div class="bg-white rounded-2xl shadow-lg p-5 mb-6 flex items-center justify-center">
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Momsweetbaby by Bidan Yossy" class="h-20 object-contain">
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('error')): ?>
        <div class="p-3 mb-4 bg-red-100 border border-red-300 text-red-700 rounded-lg text-sm">
            ⚠️ <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Kolom Kiri & Tengah -->
        <div class="md:col-span-2 space-y-6 bg-white p-6 rounded-2xl shadow-md">

            <div>
                <label class="block font-bold mb-2 text-gray-700">👤 Pilih Pasien</label>
                <select wire:model.live="pasien_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none">
                    <option value="">-- Pilih Pasien --</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Daftar Obat -->
                <div>
                    <h3 class="font-bold border-b-2 border-pink-200 pb-2 text-rose-600 flex items-center gap-1">
                        💊 Daftar Obat
                    </h3>
                    <div class="space-y-2 mt-3 max-h-72 overflow-y-auto pr-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <button wire:click="tambahObat(<?php echo e($o->id); ?>)"
                                class="w-full text-left p-3 bg-pink-50 hover:bg-pink-100 active:scale-[0.98] transition border border-pink-100 rounded-lg text-xs flex justify-between items-center">
                                <span>
                                    <span class="block font-semibold text-gray-800"><?php echo e($o->nama); ?></span>
                                    <span class="text-gray-400">Stok: <?php echo e($o->stok); ?></span>
                                </span>
                                <span class="font-bold text-rose-600">Rp<?php echo e(number_format($o->harga_jual)); ?></span>
                            </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <p class="text-xs text-gray-400 italic">Belum ada data obat.</p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <!-- Tindakan / Layanan -->
                <div>
                    <h3 class="font-bold border-b-2 border-pink-200 pb-2 text-rose-600 flex items-center gap-1">
                        🩺 Tindakan / Layanan
                    </h3>
                    <div class="space-y-2 mt-3 max-h-72 overflow-y-auto pr-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $layanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <button wire:click="tambahLayanan(<?php echo e($l->id); ?>)"
                                class="w-full text-left p-3 bg-purple-50 hover:bg-purple-100 active:scale-[0.98] transition border border-purple-100 rounded-lg text-xs flex justify-between items-center">
                                <span class="font-semibold text-gray-800"><?php echo e($l->nama_layanan); ?></span>
                                <span class="font-bold text-purple-600">Rp<?php echo e(number_format($l->tarif)); ?></span>
                            </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <p class="text-xs text-gray-400 italic">Belum ada data layanan.</p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $keranjangObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="flex justify-between items-center bg-gray-50 p-2 border border-gray-100 rounded-lg">
                            <div>
                                <p class="font-semibold text-gray-800"><?php echo e($item['nama']); ?></p>
                                <div class="flex items-center gap-2 mt-1">
                                    <button wire:click="kurangObat(<?php echo e($id); ?>)" class="w-5 h-5 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-xs font-bold">-</button>
                                    <span class="text-xs"><?php echo e($item['qty']); ?> x Rp<?php echo e(number_format($item['harga'])); ?></span>
                                    <button wire:click="tambahObat(<?php echo e($id); ?>)" class="w-5 h-5 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-xs font-bold">+</button>
                                </div>
                            </div>
                            <button wire:click="hapusObat(<?php echo e($id); ?>)" class="text-red-400 hover:text-red-600 text-xs">✕</button>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $keranjangLayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="flex justify-between items-center bg-gray-50 p-2 border border-gray-100 rounded-lg">
                            <div>
                                <p class="font-semibold text-gray-800"><?php echo e($item['nama']); ?></p>
                                <p class="text-xs text-gray-500">Rp<?php echo e(number_format($item['tarif'])); ?></p>
                            </div>
                            <button wire:click="hapusLayanan(<?php echo e($id); ?>)" class="text-red-400 hover:text-red-600 text-xs">✕</button>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($keranjangObat) && empty($keranjangLayanan)): ?>
                        <p class="text-xs text-gray-400 italic text-center py-6">Keranjang masih kosong</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <div class="mt-4 pt-4 border-t">
                <div class="flex justify-between font-bold text-xl mb-4 text-rose-600">
                    <span>TOTAL:</span>
                    <span>Rp<?php echo e(number_format($totalHarga)); ?></span>
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
</div><?php /**PATH C:\Users\ZYREX\kasir-bidan-baru\resources\views/livewire/actions/kasir-utama.blade.php ENDPATH**/ ?>