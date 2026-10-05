<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class StrukController extends Controller
{
    public function cetak($id)
    {
        // Load Eager Loading agar query efisien (Best Practice)
        $transaksi = Transaksi::with(['pasien', 'detailObat.obat', 'detailLayanan.layanan'])->findOrFail($id);
        return view('kasir.struk', compact('transaksi'));
    }
}