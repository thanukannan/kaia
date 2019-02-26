<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Hotel;
use App\Booking;

class OperationController extends Controller
{
    public function showClient (Request $request){
        return view ('operation.operationcategory.addclient');
    }

    public function addClient(){
        Client::create([
            'clientname' => request('clientname'),
            'contactperson' => request('contactperson'),
            'gst'        => request('gst'),
            'emailid'    => request('emailid'),
            'mobilenumber' => request('mobilenumber'),
            'address' =>request('address')
        ]);
        return back()->with('success','Client Added Successfully');
    }

    public function viewClient(){

        $data=Client::all();
        return view('operation.operationcategory.viewclient',compact('data'));

    }

    public function deleteClient($id){
        $Request = Client::findOrfail($id);
        try {
            $Request->delete();
            return back()->with('success','Client Deleted Successfully ');
        } catch (\Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    public function editClient($id)
    {

//        return ($id);
        try {
            $data = Client::findOrfail($id);
            return view('operation.operationcategory.editclient', compact('data'));
        } catch (Exception $e) {

        }

    }

    public function updateClient($id, Request $request){

        $client = Client::findOrfail($id);
        $client->clientname = request('clientname');
        $client->contactperson = request('contactperson');
        $client->gst = request('gst');
        $client->emailid = request('emailid');
        $client->mobilenumber = request('mobilenumber');
        $client->address = request('address');
        $client->save();

        return back()->with('update','Client Updated Successfully ');

    }



    public function showHotel(request $request){
        return view('operation.operationcategory.addhotel');
    }

    public function addHotel(){
        Hotel::create([
            'hotelname' => request('hotelname'),
            'contactperson' => request('contactperson'),
            'address' => request('address'),
            'city' => request('city'),
            'district' => request('district'),
            'country' => request('country'),
            'gst'        => request('gst'),
            'emailid' => request('emailid'),
            'mobilenumber' => request('mobilenumber'),
            'vendor' =>request('vendor'),
            'hotel_data' => serialize (request('hotel_data'))
        ]);
        return back()->with('success','Hotel Added Successfully');
    }

    public function viewHotel(){
        $data=Hotel::all();
        return view('operation.operationcategory.viewhotel',compact('data'));

    }

    public function deleteHotel($id){
        try {
            $Request = Hotel::findOrfail($id);
            $Request->delete();
            return back()->with('success','Hotel Deleted Successfully ');
        } catch (\Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    public function editHotel($id)
    {

//        return ($id);
        try {
            $data = Hotel::findOrfail($id);
            return view('operation.operationcategory.edithotel', compact('data'));
        } catch (Exception $e) {

        }

    }



    public function updateHotel($id, Request $request){

        $hotel =Hotel::findOrfail($id);
        $hotel->hotelname = request('hotelname');
        $hotel->contactperson = request('contactperson');
        $hotel->address = request('address');
        $hotel->city = request('city');
        $hotel->district = request('district');
        $hotel->country = request('country');
        $hotel->gst = request('gst');
        $hotel->emailid = request('emailid');
        $hotel->mobilenumber = request('mobilenumber');
        $hotel->vendor = request('vendor');
        $hotel->hotel_data = serialize (request('hotel_data'));
        $hotel->save();

        return back()->with('update','Hotel Updated Successfully ');

    }




    public function showBooking()
    {
        $client_data = Client::all();
        $hotel_data= Hotel::all();

        return view('operation.operationcategory.addbooking',compact('client_data','hotel_data'));

    }

    public  function addBooking()
    {
//    dd(request()->all());
//    return "hi";


        Booking::create([
            'bookingdate' => request('bookingdate'),
            'clientname' => request('clientname'),
            'booking_given_by' => request('booking_given_by'),
            'hotelname' => request('hotelname'),
            'guestname' => request('guestname'),
            'occupancy' => request('occupancy'),
            'hotel_concern_person' => request('hotel_concern_person'),
            'checkin' => request('checkin'),
            'checkout' => request('checkout'),
            'no_of_roomnights' => request('no_of_roomnights'),
            'bookingstatus' => request('bookingstatus'),
            'confirmationnumber' => request('confirmationnumber'),
            'roomtype' => request('roomtype'),
            'tariff_perday' => request('tariff_perday'),
            'gst_method' => request('gst_method'),
            'taxpercentage' => request('taxpercentage'),
            'taxamount' => request('taxamount'),
            'total_with_tax' => request('total_with_tax'),
            'commissiontype' => request('commissiontype'),
            'commission_amount' => request('commission_amount'),
            'commission_percentage' => request('commission_percentage'),
            'commission_percentage_amount' => request('commission_percentage_amount'),
            'netamount' => request('netamount'),
            'kaia_commission' => request('kaia_commission'),
            'mop' => request('mop'),
        ]);
        return back()->with('success','Booking Added Successfully');

    }

    public function viewBooking(){

        $data= Booking::orderBy('created_at', 'desc')->paginate(20);
        return view('operation.operationcategory.viewbooking',compact('data'));

    }

    public function deleteBooking($id){
        try {
            $Request = Booking::findOrfail($id);
            $Request->delete();
            return back()->with('success','Client Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    public function editBooking($id)
    {
        $client_data = Client::all();
        $hotel_data= Hotel::all();

//        return ($id);
        try {
            $bookedData = Booking::findOrfail($id);
            return view('operation.operationcategory.editbooking', compact('bookedData','client_data','hotel_data'));
        } catch (Exception $e) {

        }

    }

    public function updateBooking($id, Request $request){

        $booking = Booking::findOrfail($id);
        $booking->bookingdate = request('bookingdate');
        $booking->clientname = request('clientname');
        $booking->booking_given_by = request('booking_given_by');
        $booking->hotelname = request('hotelname');
        $booking->guestname = request('guestname');
        $booking->occupancy = request('occupancy');
        $booking->hotel_concern_person = request('hotel_concern_person');
        $booking->checkin = request('checkin');
        $booking->checkout = request('checkout');
        $booking->no_of_roomnights = request('no_of_roomnights');
        $booking->bookingstatus = request('bookingstatus');
        $booking->confirmationnumber = request('confirmationnumber');
        $booking->roomtype = request('roomtype');
        $booking->tariff_perday = request('tariff_perday');
        $booking->gst_method = request('gst_method');
        $booking->taxpercentage = request('taxpercentage');
        $booking->taxamount = request('taxamount');
        $booking->total_with_tax = request('total_with_tax');
        $booking->commissiontype = request('commissiontype');
        $booking->commission_amount = request('commission_amount');
        $booking->commission_percentage = request('commission_percentage');
        $booking->commission_percentage_amount = request('commission_percentage_amount');
        $booking->netamount = request('netamount');
        $booking->kaia_commission = request('kaia_commission');
        $booking->mop = request('mop');
        $booking->save();

        return back()->with('update','Booking Updated Successfully ');

    }



    public function demo(){
        $hotel_id = request('id');
        $hotel_details = Hotel::where('id',$hotel_id)->get()->first();
        $hoteldata =unserialize($hotel_details->hotel_data);
        $final1='<option value="">Select Room Type</option>';
        foreach ($hoteldata as $data){
            $final1 = $final1.'<option value="'.$data['roomtype'].'">'.$data['roomtype'].'</option>';
        }
        return $finaldata='<select id="Roomtype" name="roomtype" class="form-control">'.$final1.'</select>';

    }

    public function getTariffValue(){
        $Roomtype = request('Roomtype');
        $hotel_id = request('hotel_id');
        $hotel_details = Hotel::where('id',$hotel_id)->get()->first();
        $hoteldata =unserialize($hotel_details->hotel_data);
        foreach ($hoteldata as $data){
            if ($data['roomtype']==$Roomtype){
                $tariff=$data['rate'];
            }
        }
        return $tariff;
    }

    public function generatePDF($id)

    {

        $bookings = Booking::findOrFail($id);
        $pdf= PDF::loadview('admin.booking.myPDF',compact('bookings'));
        return $pdf->stream('myPDF.pdf');

    }

}
