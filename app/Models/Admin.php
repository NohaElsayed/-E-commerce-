<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table='admins';
    protected $fillable=['email','username','password','role','photo'];
    protected $hidden=['created_at','updated_at'];

//Accessor for admin role
    public function getRoleAttribute($value){
        if($value==1){
            return $value="Admin";
        }
        if($value==2){
            return $value="User";

        }
        if($value == 3){
            return $value="Vendor";
        }




    }


}




