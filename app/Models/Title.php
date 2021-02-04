<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table='titles';
    protected $fillable=['name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

  public function posts(){
    return $this->hasMany('App\Models\Post');
  }
}

