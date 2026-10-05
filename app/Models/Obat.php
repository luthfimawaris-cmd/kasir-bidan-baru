<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['nama', 'stok', 'harga_jual', 'expired_at'];

    protected $casts = [
        'expired_at' => 'date',
    ];
}