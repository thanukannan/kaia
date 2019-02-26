<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use DB;
use App\BookingPayment;


class paymentController extends Controller
{

    // ADD PAYMENT
    public function AddPaymentAdmin($value=''){
    	foreach (request()->bill as $key => $value) {
    		if ($value!='') {
    			if(request()->mop=='client'){
    				$type='netamount';
    			}else{
    				$type='kaia_commission';
    			}
    			$Booking=Booking::findOrfail($key);
    			if($Booking->$type==$value){
    				$Booking->paymentstatus=1;
    				$Booking->save();
    				$BookingPayment = new BookingPayment;
			        $BookingPayment->bookingId = $Booking->id;
			        $BookingPayment->date = request('bookingdate');
			        $BookingPayment->clientId = $Booking->clientname;
                    if (request()->mop!='client') {
                        $BookingPayment->hotelId = $Booking->hotelname;
                    }
			        $BookingPayment->amount = $value;
			        $BookingPayment->save();
    			}
    		}
    	}
    	return back()->with('success','Payment Successfully!!');
    }


    public function viewAdminPayment(){
        $payments = BookingPayment::get()->all();
        return view('admin.payments.view',compact('payments'));
    }


    
}
