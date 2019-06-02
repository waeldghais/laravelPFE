<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour_Etudiant extends Model
{
    protected $fillable = [
        'id_cour','id_etudiant',
    ];
    protected $table = "cour_etudiant";



    public function etudiant_cours()
    {
        return $this->hasMany('App\Etudiant','id_etudiant');
    }
    public function cours_etudiant()
    {
        return $this->hasMany('App\Post','id_cour');
    }
}
