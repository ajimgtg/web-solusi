<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'vision',
        'mission',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'vision' => 'string',
        'mission' => 'string',
    ];
}