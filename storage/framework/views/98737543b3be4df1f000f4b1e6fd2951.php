<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - <?php echo e($transaksi->kode_transaksi); ?></title>
    <style>
        /* Pengaturan ukuran kertas thermal (58mm) */
        @page { 
            size: 58mm auto; 
            margin: 0; 
        }
        body { 
            font-family: 'Courier New', Courier, monospace; 
            width: 48mm; /* Menyisakan margin kiri-kanan agar pas kertas 58mm */
            margin: 0 auto; 
            padding: 10px 0;
            font-size: 11px; 
            color: #000;
            line-height: 1.2;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .line { border-top: 1px dashed #000; margin: 5px 0; }
        .flex { display: flex; justify-content: space-between; }
        .bold { font-weight: bold; }
        .item-list { margin-bottom: 5px; }
    </style>
</head>
<body onload="window.print(); setTimeout(window.close, 500);">

    <div class="text-center">
        <img src="<?php echo e(asset('images/logo.png')); ?>" style="width: 100%; max-width: 150px; margin: 0 auto;">   
        <span style="font-size: 9px;">Layanan Kebidanan & Kesehatan Ibu Anak</span>
    </div>

    <div class="line"></div>

    <!-- Info Transaksi -->
    <div>
        <div class="flex"><span>No: <?php echo e($transaksi->kode_transaksi); ?></span></div>
        <div class="flex"><span>Tgl: <?php echo e($transaksi->created_at->format('d/m/Y H:i')); ?></span></div>
        <div class="flex"><span>Pasien: <?php echo e($transaksi->pasien->nama); ?></span></div>
    </div>

    <div class="line"></div>

    <!-- Rincian Layanan/Tindakan -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($transaksi->detailLayanan->count() > 0): ?>
        <span class="bold">[LAYANAN / TINDAKAN]</span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $transaksi->detailLayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="item-list">
                <div><?php echo e($lay->layanan->nama_layanan); ?></div>
                <div class="text-right">Rp <?php echo e(number_format($lay->tarif_satuan, 0, ',', '.')); ?></div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Rincian Obat -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($transaksi->detailObat->count() > 0): ?>
        <span class="bold">[OBAT & VITAMIN]</span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $transaksi->detailObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="item-list">
                <div><?php echo e($ob->obat->nama); ?></div>
                <div class="flex">
                    <span>  <?php echo e($ob->qty); ?> x Rp <?php echo e(number_format($ob->harga_satuan, 0, ',', '.')); ?></span>
                    <span>Rp <?php echo e(number_format($ob->harga_satuan * $ob->qty, 0, ',', '.')); ?></span>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="line"></div>

    <!-- Total Pembayaran -->
    <div class="flex bold" style="font-size: 12px;">
        <span>TOTAL:</span>
        <span>Rp <?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></span>
    </div>
    <div class="flex">
        <span>Status:</span>
        <span class="bold"><?php echo e($transaksi->status_pembayaran); ?></span>
    </div>

    <div class="line"></div>

    <div class="text-center" style="margin-top: 10px;">
        <span class="bold">TERIMA KASIH</span><br>
        <span>Semoga Lekas Sembuh 🙏</span>
    </div>

</body>
</html><?php /**PATH C:\projects\kasir-bidan-baru\resources\views/kasir/struk.blade.php ENDPATH**/ ?>