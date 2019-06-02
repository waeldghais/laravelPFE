<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denseigant extends Model
{
    protected $fillable = [
        'name','prenom', 'email', 'matiere','phone','cv',
    ];

     public function getfileAttribute($cv)
    {
        return asset($cv);
    }
    protected $table = "demande_enseigants";
   public function users()
    {
        return $this->belongsTo('App\User');
    }
}