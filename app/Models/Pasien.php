<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'no_rekam_medis', 'nik', 'nama', 'jenis_kelamin',
        'tanggal_lahir', 'no_hp', 'alamat'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}