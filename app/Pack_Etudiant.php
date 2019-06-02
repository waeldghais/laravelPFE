<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack_Etudiant extends Model
{
    protected $fillable = [
        'id_pack','id_etudiant',
    ];
    protected $table = "pack_etudiant";



    public function etudiant_packs()
    {
        return $this->hasMany('App\Etudiant','id_etudiant');
    }
    public function packs_etudiant()
    {
        return $this->hasMany('App\Pack','id_pack');
    }
}
