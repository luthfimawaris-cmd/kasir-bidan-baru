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
        Schema::create('detail_transaksi_layanans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('transaksi_id')->constrained('transaksis')->cascadeOnDelete();
    $table->foreignId('layanan_id')->constrained('layanans');
    $table->decimal('tarif_satuan', 12, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_layanans');
    }
};
