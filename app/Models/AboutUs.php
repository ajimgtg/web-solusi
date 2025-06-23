<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'id',
        'judul1',
        'description1',
        'image1',
        'judul2',
        'description2',
        'link_yutub',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'id' => 'integer',
        'judul1' => 'string',
        'description1' => 'string',
        'image1' => 'string',
        'judul2' => 'string',
        'description2' => 'string',
        'link_yutub' => 'string',
    ];

    /**
     * Mutator for link_yutub to convert YouTube links to embed format.
     */
    public function setLinkYutubAttribute($value)
    {
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $value, $matches)) {
            $this->attributes['link_yutub'] = 'https://www.youtube.com/embed/' . $matches[1];
        } elseif (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $value, $matches)) {
            $this->attributes['link_yutub'] = 'https://www.youtube.com/embed/' . $matches[1];
        } else {
            $this->attributes['link_yutub'] = $value; // Save as is if no match
        }
    }
}