<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihan';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'nama',
        'whatsapp',
        'pelatihan',
        // 'gambar',
        // 'deskripsi_singkat',
        // 'deskripsi_lengkap',
        // 'harga',
        // 'link',
        // 'status',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'whatsapp' => 'string',
        'pelatihan' => 'string',
        // 'gambar' => 'string',
        // 'deskripsi_singkat' => 'string',
        // 'deskripsi_lengkap' => 'string',
        // 'harga' => 'integer',
        // 'link' => 'string',
        // 'status' => 'integer',
    ];
}