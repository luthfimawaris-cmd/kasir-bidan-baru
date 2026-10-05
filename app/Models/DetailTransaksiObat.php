<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksiObat extends Model
{
    protected $fillable = ['transaksi_id', 'obat_id', 'qty', 'harga_satuan'];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}