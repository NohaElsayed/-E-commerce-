<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['title','post_body','photo','title_id','created_at','updated_at'];
    protected $hidden=['updated_at'];

    public function titles(){
        return $this->belongsTo('App\Models\Title','title_id','id');
    }
}
