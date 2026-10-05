<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Actions\KasirUtama;
use App\Livewire\PasienManager;
use App\Livewire\ObatManager;
use App\Livewire\LayananManager; // <-- DIUBAH ADA KATA "Actions"-NYA

// 1. Jalur untuk cetak struk
Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'cetakStruk'])->name('cetak.struk');

// 2. Jalur kasir langsung diarahkan ke Class Livewire yang di dalam folder Actions
Route::get('/kasir', KasirUtama::class);
Route::get('/pasien', PasienManager::class);
Route::get('/obat', ObatManager::class);
Route::get('/layanan', LayananManager::class);