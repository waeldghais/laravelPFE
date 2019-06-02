<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    protected $fillable = [
        'id_paiement','id_etudiant',
    ];
}
