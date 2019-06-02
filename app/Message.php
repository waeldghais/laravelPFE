<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'email','subject','comment','matiere','etudiant_id',
    ];
    public function etudiant()
    {
        return $this->belongsTo('App\Etudiant','email');
    }
}
