<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VidPack extends Model
{
    protected $fillable = ['pack_id','name', 'video'];

    public function packs_vid()
    {
        return $this->belongsTo('App\Pack');
    }
}
