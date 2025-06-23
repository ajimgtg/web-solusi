<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderBeranda extends Model
{
    protected $table = 'slider_beranda';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'image',
        'judul',
        'description',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'judul' => 'string',
        'description' => 'string',
    ];
}