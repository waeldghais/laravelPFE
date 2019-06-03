<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours_En_Linge extends Model
{
    protected $fillable = [
        'titel', 'content', 'matiere_id','user_id','photo','prix','slug',
    ];

    public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }

    public function etudiant()
    {
        return $this->belongsToMany('App\Etudiant');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function matieres()
    {
        return $this->belongsTo('App\Category');
    }
    protected $table = "cours_en_linge";
}
