<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'date',
        'created_at',
        'updated_at',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}