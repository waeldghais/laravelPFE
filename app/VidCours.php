<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VidCours extends Model
{
    protected $fillable = ['cour_id','name', 'video'];

    public function cours_vid()
    {
        return $this->belongsTo('App\Post');
    }

}
