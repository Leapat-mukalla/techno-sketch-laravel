<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artwork_photo',
        'artist',
        'artist_photo','description',
    ];
    public function likes()
    {
        return $this->belongsToMany(Like::class);
    }
}
