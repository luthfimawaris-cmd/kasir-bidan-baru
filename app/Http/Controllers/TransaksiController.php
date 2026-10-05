<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function cetakStruk($id)
    {
        // Mengambil data transaksi beserta relasi pasien, detail obat, dan detail layanannya
        $transaksi = Transaksi::with(['pasien', 'detailObat.obat', 'detailLayanan.layanan'])->findOrFail($id);

        // Mengarahkan ke file struk.blade.php yang ada di dalam folder resources/views/kasir/
        return view('kasir.struk', compact('transaksi'));
    }
}