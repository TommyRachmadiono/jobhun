<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'author_id', 'featured_image',
    ];

    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
    
}
