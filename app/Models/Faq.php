<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'pertanyaan',
        'jawaban',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'pertanyaan' => 'string',
        'jawaban' => 'string',
    ];
}