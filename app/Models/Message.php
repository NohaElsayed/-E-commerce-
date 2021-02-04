<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='messages';
    protected $fillable=['m_body','customer_id','created_at','updated_at'];
    protected $hidden=['updated_at'];

    public function customers(){
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }
}
