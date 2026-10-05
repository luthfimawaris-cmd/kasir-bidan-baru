<div class="max-w-5xl mx-auto p-4">
    <div class="bg-gradient-to-r from-pink-400 to-rose-400 rounded-2xl shadow-lg p-5 mb-6 text-white">
        <h1 class="text-xl font-bold">💊 Manajemen Obat</h1>
        <p class="text-sm text-pink-50">Momsweetbaby by Bidan Yossy</p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h3 class="font-bold text-gray-700 mb-4"><?php echo e($editId ? '✏️ Edit Obat' : '➕ Tambah Obat Baru'); ?></h3>
        <form wire:submit.prevent="simpan" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Nama Obat *</label>
                <input type="text" wire:model="nama" class="w-full p-2 border rounded-lg">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Stok *</label>
                <input type="number" wire:model="stok" class="w-full p-2 border rounded-lg">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Harga Jual *</label>
                <input type="number" wire:model="harga_jual" class="w-full p-2 border rounded-lg">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['harga_jual'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Kadaluarsa</label>
                <input type="date" wire:model="expired_at" class="w-full p-2 border rounded-lg">
            </div>
            <div class="md:col-span-4 flex gap-2">
                <button type="submit" class="px-6 py-2 bg-rose-500 hover:bg-rose-600 text-white font-bold rounded-lg">
                    <?php echo e($editId ? 'Update' : 'Simpan'); ?>

                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editId): ?>
                    <button type="button" wire:click="resetForm" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Batal</button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3 font-semibold"><?php echo e($o->nama); ?></td>
                        <td class="p-3"><?php echo e($o->stok); ?></td>
                        <td class="p-3">Rp<?php echo e(number_format($o->harga_jual)); ?></td>
                        <td class="p-3"><?php echo e($o->expired_at?->format('d/m/Y')); ?></td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit(<?php echo e($o->id); ?>)" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="hapus(<?php echo e($o->id); ?>)" wire:confirm="Yakin hapus obat ini?" class="text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr><td colspan="5" class="p-4 text-center text-gray-400 italic">Belum ada data obat</td></tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div><?php /**PATH C:\projects\kasir-bidan-baru\resources\views/livewire/obat-manager.blade.php ENDPATH**/ ?>