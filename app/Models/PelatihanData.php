<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelatihanData extends Model
{
    protected $table = 'pelatihan_data';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'title',
        'description',
        'list',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'list' => 'string',
    ];
}