<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyLeader extends Model
{
    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'name',
        'position',
        'description',
        'nip',
        'email',
        'image',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'position' => 'string',
        'description' => 'string',
        'nip' => 'string',
        'email' => 'string',
        'image' => 'string',
    ];
}