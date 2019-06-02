<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
        'name', 'content','photo',
    ];
    protected $date=['delete_at'];

	 public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }

   public function cours()
    {
        return $this->hasMany('App\Post');
    }
   protected $table='matieres';
    public function enseignat()
    {
        return $this->hasMany('App\User');
    }
}
