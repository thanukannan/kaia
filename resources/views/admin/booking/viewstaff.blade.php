@extends('admin.layout.master')

@section('staff')
    active
@endsection

@section('viewstaff')
    active
@endsection

@section('heading')
    view staff
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/booking/addstaff') }}" ><button type="button" class="btn btn-success">Add Staffs</button></a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">

        <table class="table table-hover">
            <tr>
                <th>Staff Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Email id</th>
                <th>Mobile Number</th>
                <th>address</th>
                <th>Action</th>


            </tr>

            @foreach($data as $datas)




                        <tr>

                            <td>{{ $datas->name }}</td>
                            <td>{{ $datas->department }}</td>
                            <td>{{ $datas->position }}</td>
                            <td>{{ $datas->email }}</td>
                            <td>{{ $datas->mobilenumber }}</td>
                            <td>{{$datas->address}}</td>

                    <td>
                        <form action="{{ route('admin.destroy_staff', $datas->id) }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="DELETE">

                            <a href="{{route('admin.edit_staff',$datas->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                            <button class="btn btn-danger" ><i class="fa fa-trash"></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
@endsection
