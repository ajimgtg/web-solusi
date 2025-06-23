<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerandaLayananKami extends Model
{
    protected $table = 'beranda_layanan_kami';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
    ];
}