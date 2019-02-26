@extends('admin.layout.master')

@section('hotel')
    active
@endsection

@section('heading')
    Edit Hotel
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/booking/viewhotel') }}" ><button type="button" class="btn btn-success">View Hotels</button></a>
        </div>
    </div>
@endsection

@section('content')


    <form id="regForm"  action="{{route('admin.update_hotel',$data->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="row">

            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Hotel Name:</label>
                    <input id="name" type="text" value="{{ $data->hotelname }}" placeholder="Hotel Name" name="hotelname"  onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Contact Person:</label>
                    <input id="name" type="text" value="{{ $data->contactperson }}" placeholder="Contact Person" name="contactperson"  onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Address:</label>
                    <input id="email" type="text" value="{{ $data->address}}" placeholder="Address" name="address" class="form-control" required>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">City:</label>
                    <input id="email" type="text" value="{{ $data->city }}" placeholder="City" name="city"   onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">District:</label>
                    <input id="email" type="text" value="{{ $data->district }}"placeholder="District" name="district"  onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Country:</label>
                    <input id="email" type="text" value="{{ $data->country}}" placeholder="Country" name="country"  onkeypress="return onlyAlphabets(event,this);" class="form-control" required>
                </div>
            </div>


            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <label class="control-label" for="email">Room Type and Rate:</label>
                <input type="button"class="form-control btn btn-square btn-info add_more_phone_number pull-right" value="Add Room type and Rate"  style="margin-left:-5%;">Add Room type and Rate </a>
                <div class="add_phone_number_div">


                    <?php
                           $hotel_data = unserialize($data->hotel_data);
                            $i=0;
                            foreach ($hotel_data as $key=>$value){
                      ?>
                    <div class="form-group">
                         <label class="control-label" for="email">Room Type</label>
                         <input type="text"  class="form-control" placeholder="Room Type"  onkeypress="return onlyAlphabets(event,this);" value="<?php echo $value['roomtype']?>" name="hotel_data[<?php echo $i?>][roomtype]" required >
                         <label class="control-label" for="email">Rate</label>
                         <input type="number"  class="form-control phone_no" placeholder="Rate" value="<?php echo $value['rate']?>" name="hotel_data[<?php echo $i?>][rate]" required >
                         <a class=" btn remove_field pull-right" style="margin-left:10px;"> <i class="fa fa-remove"></i> </a>
                    </div>
                        <?php $i++;  } ?>

                </div>

            </div>

            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label">GST</label>
                    <input  type="text" placeholder="GST" name="gst" value="{{ $data->gst }}" class="form-control"  required>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email"> Email Id:</label>
                    <input id="txtEmail" type="text" value="{{ $data->emailid}}" placeholder="email id" name="emailid" onblur="validateEmail(this);"   pattern="[^ @]*@[^ @]*"  class="form-control" required>
                </div>
            </div>
            <div class="col-xl-6  col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Mobile Number:</label>
                    <input id="email" type="text" value="{{ $data->mobilenumber}}" placeholder="Mobile No" name="mobilenumber" onkeypress="return isNumberKey(event)" class="form-control" maxlength="10" required>
                </div>
            </div>
            <div class="col-xl-12  col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Vendor:</label>
                    <input type="text" placeholder="Vendor"  value="{{ $data->vendor}}" name="vendor"  class="form-control">
                </div>
            </div>

            <div class="col-xl-12 text-center">
                <button type="submit" name="singlebutton"  onclick="Javascript:checkEmail()"  class="btn btn-primary ">Update Hotel</button>
            </div>
        </div>
    </form>

@endsection


@section('script')

    <script>

        var i=<?php echo $i ?>;
        $('.add_more_phone_number').click(function(){
            // e.preventDefault();
            $('.add_phone_number_div').append('<div class="form-group"><label class="control-label" for="email">Room Type</label> <input type="text"  class="form-control" placeholder="Room Type" name="hotel_data['+i+'][roomtype]" required> <label class="control-label" for="email">Rate</label> <input type="number"  class="form-control phone_no" placeholder="Rate" name="hotel_data['+i+'][rate]" required>  <a class=" btn remove_field pull-right" style="margin-left:10px;"> <i class="fa fa-remove"></i> </a> </div> ');
            i++;
        })
        $('.add_phone_number_div').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); $(this).parent('div').remove();
        })

    </script>



    @endsection


