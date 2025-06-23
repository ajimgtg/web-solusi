<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    // Allow mass assignment for these attributes
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'whatsapp',
        'instagram',
        'youtube',
        'linkedin',
        'address',
        'hari_oprasional',
        'jam_oprasional',
        'link_maps',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'whatsapp' => 'string',
        'instagram' => 'string',
        'youtube' => 'string',
        'linkedin' => 'string',
        'address' => 'string',
        'hari_oprasional' => 'string',
        'jam_oprasional' => 'string',
        'link_maps' => 'string',
    ];

    public function setLinkMapsAttribute($value)
    {
        // Cari nilai di dalam atribut src=""
        if (preg_match('/src="([^"]+)"/', $value, $matches)) {
            $this->attributes['link_maps'] = $matches[1]; // Simpan hanya nilai src
        } else {
            $this->attributes['link_maps'] = $value; // Simpan apa adanya jika tidak cocok
        }
    }
}