<?php

namespace App\Http\Controllers;
use App\adminstaff;
use App\Operation;
use App\Role;
use App\Booking;
use App\Client;
use App\Hotel;
use App\Staff;
use \App\Helpers\Helper;
use Illuminate\Http\Request;
use Excel;
use App\Exports\UsersExport;
use PDF;
use DB;
//use Excel;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{

    public function showClient(Request $request){

        return view('admin.booking.addclient');
    }

    public function addClient(Request $request){

        $this->validate($request, [
            'clientname' => 'required|max:255',
            'contactperson' => 'required',
            'gst' => 'required',
            'emailid' => 'required|email|max:255|unique:clients',
            'mobilenumber' => 'required|max:10|min:10',
            'address' => 'required',
        ]);
        Client::create([
            'clientname' => request('clientname'),
            'contactperson' => request('contactperson'),
            'gst' => request('gst'),
            'emailid' => request('emailid'),
            'mobilenumber' => request('mobilenumber'),
            'address' => request('address')
        ]);
        return back()->with('success', 'Client Created Successfully');
    }


    public function viewClient(){
        $data=Client::all();
        return view('admin.booking.viewclient',compact('data'));
    }



    public function editClient($id){
        try {
            $data = Client::findOrfail($id);
            return view('admin.booking.editclient', compact('data'));
        } catch (Exception $e) {

        }
    }


    public function updateClient($id, Request $request){
        $this->validate($request, [
            'clientname' => 'required|max:255',
            'contactperson' => 'required',
            'gst' => 'required',
            'emailid' => 'required|email|max:255',
            'mobilenumber' => 'required|max:10|min:10',
            'address' => 'required',
        ]);
        $client = Client::findOrfail($id);
        $client->clientname = request('clientname');
        $client->contactperson = request('contactperson');
        $client->gst = request('gst');
        $client->emailid = request('emailid');
        $client->mobilenumber = request('mobilenumber');
        $client->address = request('address');
        $client->save();
        return back()->with('success','Client Updated Successfully ');
    }

    public function deleteClient($id){
        try {
            $Request = Client::findOrfail($id);
            $Request->delete();
            return back()->with('success','Client Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }





//    HOTEL



    public function showHotel(request $request){
        return view('admin.booking.addhotel');
    }

    public function addHotel(Request $request){

        $this->validate($request, [

            'hotelname' => 'required|max:255',
            'contactperson' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'country' => 'required',
            'gst' => 'required',
            'emailid' => 'required|email|max:255|unique:hotels',
            'mobilenumber' => 'required|max:10|min:10',
            'hotel_data' => 'required',
        ]);
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
        return back()->with('success', 'Hotel Created Successfully');
    }

    public function viewHotel(){
        $data=Hotel::all();
        return view('admin.booking.viewhotel',compact('data'));
    }


    public function editHotel($id)
    {
        try {
            $data = Hotel::findOrfail($id);
            return view('admin.booking.edithotel', compact('data'));
        } catch (Exception $e) {

        }

    }

    public function updateHotel($id, Request $request){

        $this->validate($request, [

            'hotelname' => 'required|max:255',
            'contactperson' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'country' => 'required',
            'gst' => 'required',
            'emailid' => 'required|email|max:255',
            'mobilenumber' => 'required|max:10|min:10',
            'hotel_data' => 'required',
        ]);

        $hotel =Hotel::findOrfail($id);
        $hotel->hotelname = request('hotelname');
        $hotel->contactperson = request('contactperson');
        $hotel->address = request('address');
        $hotel->city = request('city');
        $hotel->emailid = request('district');
        $hotel->mobilenumber = request('country');
        $hotel->gst = request('gst');
        $hotel->emailid = request('emailid');
        $hotel->mobilenumber = request('mobilenumber');
        $hotel->vendor = request('vendor');
        $hotel->hotel_data = serialize (request('hotel_data'));
        $hotel->save();

        return back()->with('success','Hotel Updated Successfully ');

    }

    public function deleteHotel($id){
        try {
            $Request = Hotel::findOrfail($id);
            $Request->delete();
            return back()->with('success','Hotel Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }



    public function showBooking(){
        $client_data = Client::all();
        $hotel_data= Hotel::all();
        return view('admin.booking.addbooking',compact('client_data','hotel_data'));
    }

    public  function addBooking()
    {
        $booking = new Booking;

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
        // $mail = new MailController;
        // $mail->email($booking->id);
        return back();
    }


    public function viewBooking(){
        $data= Booking::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.booking.viewbooking',compact('data'));
    }

    public function deleteBooking($id){
        try {
            $Request = Booking::findOrfail($id);
            $Request->delete();
            return back()->with('success','Booking Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    public function editBooking($id){
        $client_data = Client::all();
        $hotel_data= Hotel::all();
        try {
            $bookedData = Booking::findOrfail($id);
            return view('admin.booking.editbooking', compact('bookedData','client_data','hotel_data'));
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
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
        // $mail = new MailController;
        // $mail->email($id);
        return back()->with('success','Booking Updated Successfully ');
    }



    public function showStaff(){

        $datas = role::all();
        return view ('admin.booking.addstaff',compact('datas'));
    }

    public function addStaff(){

        Operation::create([
            'name' => request('name'),
            'email' => request('email'),
            'password'=>bcrypt(request('password')),
            'department' => request('department'),
            'position' => request('position'),
            'mobilenumber' => request('mobilenumber'),
            'role'=>serialize(request('role')),
            'address' => request('address'),

        ]);
        return back();
    }

    public function viewStaff(){

        $data= Operation::all();
        return view('admin.booking.viewstaff',compact('data'));

    }

    public function deleteStaff($id){
        try {
            $Request = Operation::findOrfail($id);
            $Request->delete();
            return back()->with('success','Staff Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function editStaff($id)
    {
//            dd(request()->all());
        $role_type = role::all();


//        return ($id);
        try {
            $data = Staff::findOrfail($id);
            return view('admin.booking.editstaff', compact('data','role_type'));
        } catch (Exception $e) {

        }

    }

    public function updateStaff($id, Request $request){

        $staff =Operation::findOrfail($id);
        $staff->name = request('name');
        $staff->email = request('email');
        $staff->password = bcrypt(request('password'));
        $staff->department = request('department');
        $staff->position = request('position');
        $staff->mobilenumber = request('mobilenumber');
        $staff->role = serialize(request('role'));
        $staff->address = request('address');
        $staff->save();

        return back()->with('success','Staff Updated Successfully ');

    }



    public function showPayment(){
        $client_data = Client::all();
        $hotel_data= Hotel::all();
        return view('admin.booking.addpayment',compact('client_data','hotel_data'));
    }



    public function get_hotel_data(){
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


    public function get_income_data(){
        if (request()->mopChange=='client'){
            $Booking_details= Booking::where([['clientname',request('clientId')],['paymentstatus',0],['mop','btk']])->get();
        }else{
            $Booking_details= Booking::where([['hotelname',request('hotelId')],['paymentstatus',0],['mop','direct']])->get();
        }
        // FOR CLIENT PAYMENT
        if (request()->mopChange=='client'){
            $tableui='<table class="table table-hover"><tr><th>Booking Date </th><th>Client Name</th> <th>Hotel Name</th> <th>Guest Name</th><th>Number of Room Nights</th> <th>Net Amount</th> <th>Payment Amount</th> </tr><tbody>';

            foreach ($Booking_details as $data){
                $tableui=$tableui.'<tr><td>'.$data->bookingdate.'</td> <td>'.$data->clientname.'</td> <td>'.$data->hotelname.'</td> <td>'.$data->guestname.'</td> <td>'.$data->no_of_roomnights.'</td> <td>'.$data->netamount.'</td><td><input type="number" min="'.$data->netamount.'" max="'.$data->netamount.'" class="form-control" name="bill['.$data->id.']"></td></tr>';
            }

        }else{ //FOR HOTEL PAYMENT

            $tableui='<table class="table table-hover"><tr><th>Booking Date </th><th>Client Name</th> <th>Hotel Name</th> <th>Guest Name</th><th>Number of Room Nights</th> <th>Kaia Commision</th> <th>Payment Amount</th> </tr><tbody>';

            foreach ($Booking_details as $data){
                $tableui=$tableui.'<tr><td>'.$data->bookingdate.'</td> <td>'.$data->clientname.'</td> <td>'.$data->hotelname.'</td> <td>'.$data->guestname.'</td> <td>'.$data->no_of_roomnights.'</td> <td>'.$data->kaia_commission.'</td><td><input type="number" min="'.$data->kaia_commission.'" max="'.$data->kaia_commission.'" class="form-control" name="bill['.$data->id.']"></td></tr>';
            }
        }

        return $tableui;
    }


    public function generate_invoice($id){
        $bookings = Booking::findOrFail($id);
        $pdf= PDF::loadview('admin.booking.invoice',compact('bookings'));
        return $pdf->stream('myPDF.pdf');
    }

    public function export(Request $request){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function viewReport(){
        $data=Booking::all();
        return view('admin.booking.report',compact('data'));

    }

}
