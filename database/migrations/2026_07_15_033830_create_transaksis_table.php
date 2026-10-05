<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pasien_id')->constrained('pasiens')->cascadeOnDelete();
    $table->string('kode_transaksi')->unique();
    $table->decimal('total_harga', 12, 2);
    $table->enum('status_pembayaran', ['Pending', 'Sukses', 'Gagal'])->default('Pending');
    $table->string('qris_url')->nullable(); // Untuk menyimpan mock/link QRIS
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
