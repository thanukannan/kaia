@extends('operation.layout.master')

@section('booking')
    active
@endsection

@section('viewbooking')
    active
@endsection

@section('heading')

    View Booking

    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('operation/operationcategory/addbooking') }}" ><button type="button" class="btn btn-success">Add Booking</button></a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">

            <table class="table table-hover">
                <tr>
                    <th>Booking Date</th>
                    <th>Hotel name</th>
                    <th>Booking Status</th>
                    <th>Confirmation Number</th>
                    <th>Guest Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Room Type</th>
                    <th>Occupancy</th>
                    <th>Net Amount</th>
                    <th>Mode of Payment</th>
                    <th>Action</th>

                </tr>
                @foreach($data as $datas)

                    <tr>
                        <td>{{ $datas->bookingdate }}</td>
                        <td>{{ $datas->hotelname }}</td>
                        <td>{{ $datas->bookingstatus }}</td>
                        <td>{{ $datas->confirmationnumber }}</td>
                        <td>{{ $datas->guestname }}</td>
                        <td>{{ $datas->checkin }}</td>
                        <td>{{ $datas->checkout }}</td>
                        <td>{{ $datas->roomtype }}</td>
                        <td>{{ $datas->occupancy }}</td>
                        <td>{{ $datas->netamount }}</td>
                        <td>{{ $datas->mop }}</td>

                        <td>

                            <form action="{{ route('operation.destroy_booking', $datas->id) }}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('operation.edit_booking',$datas->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger" ><i class="fa fa-trash"></i> </button>
                                <a href="{{route('operation.pdf_booking', $datas->id)}}" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></a>
                            </form>
                        </td>
                    </tr>


                @endforeach
            </table>
            {{ $data->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
@endsection