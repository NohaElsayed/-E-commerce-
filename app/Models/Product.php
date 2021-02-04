<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table='products';
   protected $fillable=['name','price','description','photo','pricebefore_sale','category_id','created_at','updated_at'];
   protected $hidden=['created_at','updated_at','pivot'];

   //1-M Relationship
   public function categories(){
       return $this->belongsTo('App\Models\Category','category_id','id');
   }
   public function vendors(){
       return $this->belongsToMany('App\Models\Vendor','vendors_products','vendor_id','product_id','id','id');
   }

}
