<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - {{ $transaksi->kode_transaksi }}</title>
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
        <img src="{{ asset('images/logo.png') }}" style="width: 100%; max-width: 150px; margin: 0 auto;">   
        <span style="font-size: 9px;">Layanan Kebidanan & Kesehatan Ibu Anak</span>
    </div>

    <div class="line"></div>

    <!-- Info Transaksi -->
    <div>
        <div class="flex"><span>No: {{ $transaksi->kode_transaksi }}</span></div>
        <div class="flex"><span>Tgl: {{ $transaksi->created_at->format('d/m/Y H:i') }}</span></div>
        <div class="flex"><span>Pasien: {{ $transaksi->pasien->nama }}</span></div>
    </div>

    <div class="line"></div>

    <!-- Rincian Layanan/Tindakan -->
    @if($transaksi->detailLayanan->count() > 0)
        <span class="bold">[LAYANAN / TINDAKAN]</span>
        @foreach($transaksi->detailLayanan as $lay)
            <div class="item-list">
                <div>{{ $lay->layanan->nama_layanan }}</div>
                <div class="text-right">Rp {{ number_format($lay->tarif_satuan, 0, ',', '.') }}</div>
            </div>
        @endforeach
    @endif

    <!-- Rincian Obat -->
    @if($transaksi->detailObat->count() > 0)
        <span class="bold">[OBAT & VITAMIN]</span>
        @foreach($transaksi->detailObat as $ob)
            <div class="item-list">
                <div>{{ $ob->obat->nama }}</div>
                <div class="flex">
                    <span>  {{ $ob->qty }} x Rp {{ number_format($ob->harga_satuan, 0, ',', '.') }}</span>
                    <span>Rp {{ number_format($ob->harga_satuan * $ob->qty, 0, ',', '.') }}</span>
                </div>
            </div>
        @endforeach
    @endif

    <div class="line"></div>

    <!-- Total Pembayaran -->
    <div class="flex bold" style="font-size: 12px;">
        <span>TOTAL:</span>
        <span>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
    </div>
    <div class="flex">
        <span>Status:</span>
        <span class="bold">{{ $transaksi->status_pembayaran }}</span>
    </div>

    <div class="line"></div>

    <div class="text-center" style="margin-top: 10px;">
        <span class="bold">TERIMA KASIH</span><br>
        <span>Semoga Lekas Sembuh 🙏</span>
    </div>

</body>
</html>