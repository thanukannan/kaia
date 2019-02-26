@extends('admin.layout.master')


@section('payment')
    active
@endsection

@section('viewpayment')
    active
@endsection

@section('heading')
    View Payment
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('/admin/booking/addpayment') }}" ><button type="button" class="btn btn-success">Add Payment </button></a>
        </div>
    </div>
@endsection

@section('content')

	 <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <tr>
                    <th>Booked Date</th>
                    <th>Client Name</th>
                    <th>Guest Name</th>
                    <th>Payment Date</th>
                    <th>Payment By</th>
                    <th>Amount</th>
                </tr>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->bookings->bookingdate}}</td>
                        <td>{{$payment->clients->clientname}}</td>
                        <td>{{$payment->bookings->guestname}}</td>
                        
                        <td>{{$payment->date}}</td>
                        <td>
                        	@if($payment->hotelId!='')
                        		{{$payment->hotels->hotelname}} - {{$payment->hotels->contactperson}}
                        	@else
                        		{{$payment->clients->clientname}}
                        	@endif

                        </td>
                        <td>{{$payment->amount}}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>

@endsection