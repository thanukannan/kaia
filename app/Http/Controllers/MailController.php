<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\exportinvoice;
use Auth;
use PDF;

use App\Booking;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function email($id){

         $bookings = Booking::find($id);
         $pdf = PDF::loadView('admin.booking.invoice', compact('bookings'));
         $pdf->save(storage_path().'Kaia.pdf');

         $data = array('email'=>'info@greefitech.com' );


        Mail::send('emails.invoice', $data, function($message) {

            $message->from('gokul@greefitech.com', 'Kaia Tourism');

            $message->to('info@greefitech.com')->subject('Kaia Voucher-reg.');;

            $message->attach(storage_path().'Kaia.pdf');
        });

    }
}
