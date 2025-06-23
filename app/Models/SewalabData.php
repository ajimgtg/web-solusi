<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SewalabData extends Model
{
    protected $table = 'sewalab_data';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'title',
        'description',
        'list_1',
        'list_2',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'list_1' => 'string',
        'list_2' => 'string',
    ];
}