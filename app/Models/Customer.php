<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;


class Customer extends Model
{
    use Notifiable;
    protected $table='customers';
    protected $fillable=['name','email','orders','password','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }
}


