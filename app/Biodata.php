<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
        'phone', 'gender', 'website', 'date_of_birth', 'place_of_birth', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
