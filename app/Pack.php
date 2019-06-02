<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $fillable = [
        'titel', 'content','user_id','photo','prix','slug',
    ];
    protected $date=['delete_at'];
    public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function etudiant()
    {
        return $this->belongsToMany('App\Etudiant');
    }
    protected $table = "packs";
}
