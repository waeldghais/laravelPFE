<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['blog_name' ,'phone_number','other_Phone','blog_email','adresse','RIB'];
}
