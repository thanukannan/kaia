@extends('admin.layout.master')

@section('staff')
    active
@endsection

@section('heading')
    Edit Staff
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-tb7  op: -28px;" >
            <a href="{{ url('admin/booking/viewstaff') }}" ><button type="button" class="btn btn-success">View Staff</button></a>
        </div>
    </div>

@endsection

@section('content')




    <form id="regForm"  action="{{route('admin.update_staff',$data->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}




        <div class="row">

            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Staff Name</label>
                    <input  type="text" placeholder="Staff Name" value="{{ $data->name }}" name="name"  onkeypress="return onlyAlphabets(event,this);" class="form-control inputTextBox" required>
                </div>
            </div>

            <div class="col-xl-6  col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Department</label>
                    <input  type="text" placeholder="Department"  value="{{ $data->department }}"  name="department" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Position</label>
                    <input id="email" type="text" placeholder="Position"  value="{{ $data->position }}" name="position" class="form-control" required>
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email"> Email id</label>
                    <input id="email" type="text" placeholder="Email Id"  value="{{ $data->email }}" name="email"  pattern="[^ @]*@[^ @]*" onblur="validateEmail(this);"  class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6     col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Mobile Number</label>
                    <input id="email" type="text" placeholder="Mobile Number" value="{{ $data->mobilenumber }}" name="mobilenumber"  onkeypress="return isNumberKey(event)" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Address</label>
                    <input id="email" type="text" placeholder="Address" value="{{ $data->address }}" name="address"  class="form-control" required>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email"> Password</label>
                    <input id="email" type="password" placeholder="Password"   value="{{ $data->password }}" name="password" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-12 text-center">
                <button type="submit" name="singlebutton" class="btn btn-primary ">update Staff</button>
            </div>
        </div>
    </form>

@endsection

