<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Layanan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ngisi data pasien contoh
        Pasien::create(['nama' => 'Siti Aminah', 'no_hp' => '0812345', 'alamat' => 'Jakarta']);
        Pasien::create(['nama' => 'Budi Santoso', 'no_hp' => '0856789', 'alamat' => 'Bandung']);

        // Ngisi data obat contoh (Stok harus di atas 0 biar muncul di kasir)
        Obat::create(['nama' => 'Paracetamol', 'stok' => 50, 'harga_jual' => 15000]);
        Obat::create(['nama' => 'Amoxicillin', 'stok' => 30, 'harga_jual' => 25000]);
        Obat::create(['nama' => 'Vitamin C', 'stok' => 100, 'harga_jual' => 10000]);

        // Ngisi data layanan/tindakan bidan
        Layanan::create(['nama_layanan' => 'Pemeriksaan Kehamilan', 'tarif' => 50000]);
        Layanan::create(['nama_layanan' => 'Imunisasi Anak', 'tarif' => 35000]);
        Layanan::create(['nama_layanan' => 'Persalinan Normal', 'tarif' => 1500000]);
    }
}