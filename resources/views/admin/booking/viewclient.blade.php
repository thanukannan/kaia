@extends('admin.layout.master')

@section('client')
    active
@endsection

@section('viewclient')
    active
@endsection


@section('heading')
    view client
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/booking/addclient') }}" ><button type="button" class="btn btn-success">Add Client</button></a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <tr>
                    <th>Client Name</th>
                    <th>Contact Person</th>
                    <th>GST</th>
                    <th>Email Id</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $datas->clientname }}</td>
                        <td>{{ $datas->contactperson }}</td>
                        <td>{{ $datas->gst }}</td>
                        <td>{{ $datas->emailid }}</td>
                        <td>{{ $datas->mobilenumber }}</td>
                        <td>{{ $datas->address}}</td>

                        <td>
                            <form action="{{ route('admin.destroy_client', $datas->id) }}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="DELETE">

                                <a href="{{route('admin.edit_client',$datas->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

