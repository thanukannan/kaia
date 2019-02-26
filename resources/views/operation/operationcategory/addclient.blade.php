
@extends('operation.layout.master')

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
            <a href="{{ url('operation/operationcategory/viewclient') }}" ><button type="button" class="btn btn-success">View Client</button></a>
        </div>
    </div>
@endsection

@section('content')

    <form id="regForm" action="{{route('operation.showClient')}}" method="POST" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="tab">
            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="name">Client Name</label>
                        <input id="name" name="clientname"  type="text" placeholder="Client Name" onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="name">Contact Person</label>
                        <input id="name" name="contactperson"  type="text" placeholder="Contact person" onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
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

@section('script')

    <script>

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

    </script>


    <script>

        function checkEmail() {

            var email = document.getElementById('txtEmail');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email.value)) {
                alert('Please provide a valid email address');
                email.focus;
                return false;
            }
        }

    </script>

@endsection

