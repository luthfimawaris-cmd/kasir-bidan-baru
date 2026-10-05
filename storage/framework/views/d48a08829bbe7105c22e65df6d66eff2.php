<div class="max-w-6xl mx-auto p-4">
    <div class="bg-gradient-to-r from-pink-400 to-rose-400 rounded-2xl shadow-lg p-5 mb-6 text-white">
        <h1 class="text-xl font-bold">👤 Manajemen Data Pasien</h1>
        <p class="text-sm text-pink-50">Momsweetbaby by Bidan Yossy</p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
        <div class="p-3 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">
            ✅ <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Form -->
    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h3 class="font-bold text-gray-700 mb-4"><?php echo e($editId ? '✏️ Edit Pasien' : '➕ Tambah Pasien Baru'); ?></h3>
        <form wire:submit.prevent="simpan" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-semibold mb-1">Nama *</label>
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
                    <?php echo e($editId ? 'Update' : 'Simpan'); ?>

                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editId): ?>
                    <button type="button" wire:click="resetForm" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                        Batal
                    </button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3"><?php echo e($p->no_rekam_medis); ?></td>
                        <td class="p-3 font-semibold"><?php echo e($p->nama); ?></td>
                        <td class="p-3"><?php echo e($p->jenis_kelamin); ?></td>
                        <td class="p-3"><?php echo e($p->tanggal_lahir?->format('d/m/Y')); ?></td>
                        <td class="p-3"><?php echo e($p->no_hp); ?></td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit(<?php echo e($p->id); ?>)" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="hapus(<?php echo e($p->id); ?>)" wire:confirm="Yakin hapus data ini?" class="text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr><td colspan="6" class="p-4 text-center text-gray-400 italic">Belum ada data pasien</td></tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div><?php /**PATH C:\Users\ZYREX\kasir-bidan-baru\resources\views/livewire/pasien-manager.blade.php ENDPATH**/ ?>