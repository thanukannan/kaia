@extends('operation.layout.master')

@section('hotel')
    active
@endsection

@section('viewhotel')
    active
@endsection

@section('heading')
    view hotel
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('operation/operationcategory/addhotel') }}" ><button type="button" class="btn btn-success">Add Hotels</button></a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">

        <table class="table table-hover">
            <tr>
                <th>Hotel Name</th>
                <th>Contact Person</th>
                <th>Address</th>
                <th>City</th>
                <th>District</th>
                <th>Country</th>
                <th>Room Type</th>
                <th>GST</th>
                <th>Email Id</th>
                <th>Mobile Number</th>
                <th>Vendor</th>
                <th>Action</th>


            </tr>
            @foreach($data as $datas)
                <?php
                $hotel_data = unserialize($datas->hotel_data);
                //                                print_r($hotel_data);
                $room_type = "";
                foreach ($hotel_data as $key=>$value){
                    if(is_array($value)){
                        $room_type .= $value['roomtype']."-".$value['rate'].", ";
                    }
                }
                ?>

                <tr>

                    <td>{{ $datas->hotelname }}</td>
                    <td>{{ $datas->contactperson }}</td>
                    <td>{{ $datas->address }}</td>
                    <td>{{ $datas->city }}</td>
                    <td>{{ $datas->district }}</td>
                    <td>{{ $datas->country }}</td>
                    <td>{{ rtrim($room_type,", ") }}</td>
                    <td>{{ $datas->gst }}</td>
                    <td>{{ $datas->emailid }}</td>
                    <td>{{ $datas->mobilenumber }}</td>
                    <td>{{ $datas->address }}</td>

                    <td>
                        <form action="{{ route('operation.destroy_hotel', $datas->id) }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="DELETE">

                            <a href="{{route('operation.edit_hotel',$datas->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                            <button class="btn btn-danger" ><i class="fa fa-trash"></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
@endsection