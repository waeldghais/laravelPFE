<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours_Linge_etud extends Model
{
    protected $fillable = [
        'id_cour_l','id_etudiant',
    ];
    protected $table = "cour_linge_etudiant";



    public function etudiant_cours()
    {
        return $this->hasMany('App\Etudiant','id_etudiant');
    }
    public function cours_etudiant()
    {
        return $this->hasMany('App\Cour_En_Linge','id_cour_l');
    }
}
