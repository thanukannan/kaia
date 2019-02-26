<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $guarded = ['id', 'created_at', 'updated_at'];

    public function hotel(){
        return $this->hasOne('App\Hotel', 'id', 'hotelname');
    }
   public function client(){
        return $this->hasone('App\Client','id','clientname');
   }
}
