<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksiLayanan extends Model
{
    protected $fillable = ['transaksi_id', 'layanan_id', 'tarif_satuan'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}