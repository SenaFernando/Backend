<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'release_year', 'artist'];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}