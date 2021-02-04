<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use Notifiable;
    protected $table='vendors';
    protected $fillable=['name','created_at','updated_at','email','phone','password'];
    protected $hidden=['created_at','updated_at','pivot'];

    public function products(){
        return $this->belongsToMany('App\Models\Product','vendors_products','vendor_id','product_id','id','id');

    }
}
