<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeProduct extends Model
{
    protected $table = 'katalog_produk';

    protected $guarded = [];

    protected $fillable = [
        'id',
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
        'gambar_produk',
        'link_shopee',
        'link_tokped',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'nama_produk' => 'string',
        'harga_produk' => 'decimal:2',
        'deskripsi_produk' => 'string',
        'gambar_produk' => 'string',
        'link_shopee' => 'string',
        'link_tokped' => 'string'
    ];
}
