<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    use HasFactory;

    protected $table = 'sertifikasi';

    protected $fillable = [
        'nama',
        'whatsapp',
        'skema',
    ];
}