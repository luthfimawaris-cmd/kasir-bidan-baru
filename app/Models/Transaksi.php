<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['kode_transaksi', 'pasien_id', 'total_harga', 'status_pembayaran'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function detailObat()
    {
        return $this->hasMany(DetailTransaksiObat::class, 'transaksi_id');
    }

    public function detailLayanan()
    {
        return $this->hasMany(DetailTransaksiLayanan::class, 'transaksi_id');
    }
}