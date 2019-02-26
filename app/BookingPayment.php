<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    public $guarded = ['id', 'created_at', 'updated_at'];

    public function bookings(){
       return $this->belongsTo(Booking::class, 'bookingId');
    }

    public function hotels(){
       return $this->belongsTo(Hotel::class, 'hotelId');
    }

    public function clients(){
       return $this->belongsTo(Client::class, 'clientId');
    }
}
