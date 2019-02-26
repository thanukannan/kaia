@extends('admin.layout.master')

@section('staff')
    active
@endsection

@section('addstaff')
    active
@endsection

@section('heading')
    Add Staff

    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/booking/viewstaff') }}" ><button type="button" class="btn btn-success">View Staff</button></a>
        </div>
    </div>
@endsection

@section('content')



    <form id="regForm"  action="{{ route('admin.showStaff') }}"   method="POST" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="row">

            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Staff Name</label>
                    <input id="name" type="text" placeholder="Staff Name" name="name" onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email"> Email id</label>
                    <input id="email" type="text" placeholder="Email Id" name="email"  pattern="[^ @]*@[^ @]*" onblur="validateEmail(this);"  class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email"> Password</label>
                    <input id="email" type="password" placeholder="Password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6  col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Department</label>
                    <input id="email" type="text" placeholder="Department" name="department" class="form-control" required>
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Position</label>
                    <input id="email" type="text" placeholder="Position" name="position" onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>


            <div class="col-xl-6     col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Mobile Number</label>
                    <input id="email" type="text" placeholder="Mobile Number" name="mobilenumber"  onkeypress="return isNumberKey(event)" class="form-control" required>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Address</label>
                    <input id="email" type="text" placeholder="Address" name="address" class="form-control" required>
                </div>
            </div>




            <div class="col-xl-12 text-center">
                <button type="submit" name="singlebutton" class="btn btn-primary "  onclick="Javascript:checkEmail()" >Add Staff</button>
            </div>
        </div>
    </form>

    @endsection

