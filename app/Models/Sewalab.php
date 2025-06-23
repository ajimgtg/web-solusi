<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sewalab extends Model
{
    protected $table = 'sewalab';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'nama',
        'whatsapp',
        'perusahaan',
        'tujuan',
        'hari',
        'tanggal',
        'jam_mulai',
        'jam_berakhir',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'whatsapp' => 'string',
        'perusahaan' => 'string',
        'tujuan' => 'string',
        'hari' => 'string',
        'tanggal' => 'string',
        'jam_mulai' => 'string',
        'jam_berakhir' => 'string',
    ];
}