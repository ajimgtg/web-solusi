<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeService extends Model
{
    protected $table = 'beranda_layanan_kami';

    protected $guarded = [];

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