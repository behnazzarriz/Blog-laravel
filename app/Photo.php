<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $uploads='/images/';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getNameAttribute($photo)
    {
    return $this->uploads.$photo;
    }
}
