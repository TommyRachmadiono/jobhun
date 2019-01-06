<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'photo'
    ];

    public $createRules = [
        "userdata.name" => "required|string|max:191",
        "userdata.username" => "required|string|max:191|unique:users,username",
        "userdata.email" => "required|email|max:191|unique:users,email",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    public function Biodata() 
    {
        return $this->hasOne('App\Biodata');
    }

    public function scopeNamaMengandung($query,$filter){
        return $query->where('name','like','%'.$filter.'%');
    }
}
