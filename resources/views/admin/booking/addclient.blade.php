
@extends('admin.layout.master')

@section('client')
    active
@endsection

@section('addclient')
    active
@endsection

@section('heading')
    Add Client

    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/booking/viewclient') }}" ><button type="button" class="btn btn-success">View Client</button></a>
        </div>
    </div>
@endsection

@section('content')
    <form id="regForm" action="{{route('admin.showClient')}}" method="POST" enctype="multipart/form-data" >
        {{csrf_field()}}
<div class="tab">
        <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Client Name</label>
                    <input  name="clientname"  type="text" placeholder="Client Name" onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Contact Person</label>
                    <input   name="contactperson"  type="text" placeholder="Contact person" onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">GST</label>
                    <input  type="text" placeholder="GST" name="gst"  class="form-control"  required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email"> Email Id</label>
                    <input id="txtEmail" name="emailid"  type="text" placeholder="Emailid"   pattern="[^ @]*@[^ @]*"  class="form-control" required>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Mobile Number</label>
                    <input id="email" type="text" placeholder="Mobile No" name="mobilenumber" onkeypress="return isNumberKey(event)" class="form-control"  maxlength="10" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Address</label>
                    <input  type="text" placeholder="Address" name="address"  class="form-control"   required>
                </div>
            </div>



            <div class="col-xl-12  text-center">
                <button type="submit" name="singlebutton"  onclick="Javascript:checkEmail()" class="btn btn-primary">Add Client</button>
            </div>
        </div>
</div>
    </form>

@endsection

