<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends  Authenticatable
{
	use Notifiable;

    protected $fillable = [
        'name','prenom', 'email' ,'password',
    ];

protected $hidden = [
        'password', 'remember_token',
    ];
    public function packs()
    {
        return $this->belongsToMany('App\Pack');
    }

    public function cours()
    {
        return $this->belongsToMany('App\Post');
    }
    public function message()
    {
        return $this->hasMany('App\Message');
    }
}
