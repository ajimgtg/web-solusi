<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'name',
        'position',
        'link_linkedin',
        'group',
        'image',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'position' => 'string',
        'link_linkedin' => 'string',
        'group' => 'string',
        'image' => 'string',
    ];
}
