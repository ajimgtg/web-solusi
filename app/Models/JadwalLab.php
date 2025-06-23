<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalLab extends Model
{
    protected $table = 'jadwal_lab';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'hari',
        'sesi',
        'jam',
        'status',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'hari' => 'integer',
        'sesi' => 'integer',
        'jam' => 'string',
        'status' => 'integer',
    ];
}