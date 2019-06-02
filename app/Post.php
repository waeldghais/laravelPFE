<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelet;

class Post extends Model
{

	 protected $fillable = [
        'titel', 'content', 'matiere_id','user_id','photo','prix','gratuit','slug',
    ];

protected $date=['delete_at'];

	 public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }

   public function matieres()
    {
        return $this->belongsTo('App\Category');
    }
     public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function etudiant()
    {
        return $this->belongsToMany('App\Etudiant');
    }
   
protected $table = "cours";
}

