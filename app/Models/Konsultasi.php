<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'nama',
        'whatsapp',
        'perusahaan',
        'layanan_yang_dibutuhkan',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'whatsapp' => 'string',
        'perusahaan' => 'string',
        'layanan_yang_dibutuhkan' => 'string',
    ];
}