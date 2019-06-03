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
        'name','prenom', 'email', 'admin','password','matiere','facebook',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function packs()
    {
        return $this->hasMany('App\Pack');
    }
   public function cours()
    {
        return $this->hasMany('App\Post');
    }
    public function coursenli()
    {
        return $this->hasMany('App\Cours_En_Lunge');
    }
     public function demande_enseigant()
    {
        return $this->hasMany('App\Denseigant');
    }
    public function matiere()
    {
        return $this->belongsTo('App\Category','matiere');
    }
}
