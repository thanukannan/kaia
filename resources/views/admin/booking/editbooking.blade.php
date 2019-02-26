@extends('admin.layout.master')

@section('booking')
    active
@endsection

@section('heading')

    Edit Booking


    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/booking/viewbooking') }}" ><button type="button" class="btn btn-success">View Booking</button></a>
        </div>
    </div>
@endsection

@section('content')


    <form id="regForm" action="{{route('admin.update_booking',$bookedData->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="item">
        <div class="container">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30 text-center">
                <h2>Edit Reservation Booking Form</h2>
                <hr>
                <br>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Booking Date</label>
                    <div class="input-group">
                        <input id=""  type="text" class="form-control datepicker-11" value="{{ $bookedData->bookingdate }}" name="bookingdate"  placeholder="mm/dd/yyyy" required>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div><!-- input-group -->
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label required" for="select">Client Name</label>
                    <div class="select">
                        <select id="select" name="clientname" class="form-control" required>
                            <option value="">Select Client</option>
                            @foreach($client_data as $data)
                                <option value="{{ $data->id }}" <?php if($data->id==$bookedData->clientname){ echo "selected";} ?> >{{ $data->clientname }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Booking Given by</label>
                    <input id="" name="booking_given_by"  value="{{ $bookedData->booking_given_by }}" type="text" placeholder="Booking GivenBy" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="select">Hotel name</label>
                    <div class="select">
                        <select id="selecthotel" name="hotelname" class="form-control" required>
                            <option value="">Select Hotel</option>
                            @foreach($hotel_data as $data)
                                <option value="{{ $data->id }}" <?php if($data->id==$bookedData->hotelname){ echo "selected";} ?> >{{ $data->hotelname }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Guest Name</label>
                    <input id="name" name="guestname" value="{{ $bookedData->guestname }}" type="text" placeholder="Guest Name" class="form-control" required >
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="select">Occupancy</label>
                    <div class="select">
                        <select id="select" name="occupancy" class="form-control" required>
                            <option value="single" <?php if('single'==$bookedData->occupancy){ echo "selected";} ?> >Single </option>
                            <option value="double" <?php if('double'==$bookedData->occupancy){ echo "selected";} ?> >Double</option>
                            <option value="triple" <?php if('triple'==$bookedData->occupancy){ echo "selected";} ?> >Triple</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Hotel Concern Person</label>
                    <input id="name" name="hotel_concern_person" value="{{ $bookedData->hotel_concern_person }}" type="text" placeholder="Concern Person" class="form-control" required>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Check In</label>
                    <div class="input-group">
                        <input id="pick_date"  type="text" class="form-control datepicker-11" name="checkin" value="{{ $bookedData->checkin }}" onchange="cal()" placeholder="mm/dd/yyyy" required>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div><!-- input-group -->
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Check Out</label>
                    <div class="input-group">
                        <input   id="drop_date"  type="text" class="form-control datepicker-11"  name="checkout" value="{{ $bookedData->checkout }}" onchange="cal()" placeholder="mm/dd/yyyy" required >
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div><!-- input-group -->
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group item">
                    <label class="control-label" for="name">No of RoomNights</label>
                    <input id="noofroomnights" name="no_of_roomnights" value="{{ $bookedData->no_of_roomnights }}" type="text" placeholder="No Of RoomNights" class="form-control calculate_value" onchange="cal()" required >

                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="select">Booking Status</label>
                    <div class="select">
                        <select id="select" name="bookingstatus" class="form-control" required >
                            <option value="confirmed" <?php if('confirmed'==$bookedData->bookingstatus){ echo "selected";} ?> >Confirmed</option>
                            <option value="tentitive" <?php if('tentitive'==$bookedData->bookingstatus){ echo "selected";} ?> >Tentitive</option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="email">Confirmation Number</label>
                    <input id="email" name="confirmationnumber" value="{{ $bookedData->confirmationnumber }}"  type="text" placeholder="Confirmation number" class="form-control" required>
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="select">Room Type</label>
                    <div class="select" id="hotel_data">

                    </div>
                </div>
            </div>



            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="name">Tariff Per Day</label>
                    <input type="text" name="tariff_perday" value="{{ $bookedData->tariff_perday }}"  placeholder="Tariff Per Day" id="tariffValue" class="form-control calculate_value" required  >
                </div>
            </div>



            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="select">GST Type</label>
                    <div class="select">
                        <select id="gstType" name="gst_method" class="form-control calculate_value" required>
                            <option value="">select</option>
                            <option value="gst_inclusion"  <?php if('gst_inclusion'==$bookedData->gst_method){ echo "selected";} ?> >GST Inclusion</option>
                            <option value="gst_exclusion" <?php if('gst_exclusion'==$bookedData->gst_method){ echo "selected";} ?> > GST Exclusion</option>
                            <option value="miscellaneous" <?php if('miscellaneous'==$bookedData->gst_method){ echo "selected";} ?> >Miscellaneous</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="form-group">
                    <label class="control-label" for="name">Tax Percentage</label>
                    <input  type="text" placeholder="Tax Percentage" name="taxpercentage" value="{{ $bookedData->taxpercentage }}"   id="taxPercentege" class="form-control calculate_value" >
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="name">Tax Amount</label>
                    <input type="text" name="taxamount" value="{{ $bookedData->taxamount }}" placeholder="Tax Amount" id="taxamount"  class="form-control calculate_value" >
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group ">
                    <label class="control-label " for="name"> Tariff with Tax:</label>
                    <input type="text" name="total_with_tax" value="{{ $bookedData->total_with_tax }}" placeholder="Tariff with Tax" id="taxtariff"  class="form-control calculate_value" required>
                </div>
            </div>



            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label "  for="select">Commission Type</label>
                    <div class="select">
                        <select id="commissionType" name="commissiontype" class="form-control calculate_value" required>
                            <option value="">select</option>
                            <option value="amount" <?php if('amount'==$bookedData->commissiontype){ echo "selected";} ?> >Amount</option>
                            <option value="percentage" <?php if('percentage'==$bookedData->commissiontype){ echo "selected";} ?>  >Percentage</option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" id="commission_amount_div"  >
                <div class="row" id="row_dim">
                    <label class="control-label" for="name">Commission Amount</label>
                    <input type="number" id="commission_amount" name="commission_amount" value="{{ $bookedData->commission_amount }}" min="0" placeholder="Commission Amount"  class="form-control calculate_value" >
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" id="commission_percentage_div" >
                <div class="row" id="percentage">
                    <label class="control-label" for="name">Commission Percentage</label>
                    <input type="number" id="commission_percentage" name="commission_percentage"  value="{{ $bookedData->commission_percentage }}" min="0" placeholder="Amount"  class="form-control calculate_value"  >
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12"  id="commission_percentage_amount_div">
                <div class="row" id="percentage">
                    <label class="control-label" for="name">Commission Percentage Amount</label>
                    <input type="number" id="commission_percentage_amount" name="commission_percentage_amount" value="{{ $bookedData->commission_percentage_amount }}" min="0" step="0.01" placeholder="Amount"  class="form-control calculate_value" >
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="name">Net Amount</label>
                    <input  id="netAmount"  name="netamount" value="{{ $bookedData->netamount }}" type="text" placeholder="Total Amount"  class="form-control" required >
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                <div class="form-group">
                    <label class="control-label" for="name">Net Commission</label>
                    <input  id="netcommission" name="kaia_commission" value="{{ $bookedData->kaia_commission }}" type="text" placeholder="Total Amount"  class="form-control calculate_value" required >
                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label " for="select">Mode of Payment</label>
                    <div class="select">
                        <select id="select" name="mop" class="form-control" required>
                            <option value="btk" <?php if('btk'==$bookedData->mop){ echo "selected";} ?> >BTK</option>
                            <option value="direct"  <?php if('direct'==$bookedData->mop){ echo "selected";} ?> >Direct</option>
                        </select>

                    </div>
                </div>
            </div>

            <div class="col-xl-12  text-center">
                <button type="submit" name="singlebutton" class="btn btn-primary ">submit</button>
            </div>
        </div>
    </div>

    </form>

    @endsection


@section('script')

    <script>
        $(function() {
            $( ".datepicker-11" ).datepicker({
                showWeek:true,

                showAnim: "slide"
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#selecthotel").change(function () {

                var hotel_id = $("#selecthotel").val();

                $.ajax({
                    type: "get",
                    url: "/admin/booking/get_hotel_data",
                    data: {id: hotel_id},
                    success: function (data) {
                        $("#hotel_data").html(data);
                    }
                });

            })

            $('body').on('change', '#Roomtype', function () {
                console.log("data");
                var Roomtype = $("#Roomtype").val();
                var hotel_id = $("#selecthotel").val();
                $.ajax({
                    type: "get",
                    url: "/admin/booking/getTariffValue",
                    data: {Roomtype: Roomtype, hotel_id: hotel_id},
                    success: function (data) {
                        var data1 = $("#tariffValue").val(data);
                    }
                });

            })


            $(window).on("load", function () {
                $("#selecthotel").trigger("change");
                $(".calculate_value").trigger("change");
                $('#commission_amount_div').hide();
                $('#commission_percentage_div').hide();
                $('#commission_percentage_amount_div').hide();
                setTimeout(function() {
                    $("#Roomtype option[value='<?php echo $bookedData->roomtype ?>']").attr("selected","selected") ;
                }, 1000);
            });


            $('.calculate_value').on('keyup change', function () {
                var tariffValue = $('#tariffValue').val();
                var taxPercentege = $('#taxPercentege').val();
                var gstType = $('#gstType').val();
                var tariffValue = $('#tariffValue').val();

                var taxamount = (parseInt(tariffValue) / 100) * parseFloat(taxPercentege);

                $('#taxamount').val(taxamount);

                if (gstType == "gst_inclusion") {
                    var taxTraffi = $('#taxtariff').val(tariffValue);
                } else if (gstType == "gst_exclusion") {
                    var taxTraffi = $('#taxtariff').val(parseInt(tariffValue) + parseInt(taxamount));
                }
                else if (gstType == "miscellaneous") {

                    var taxTraffi = $('#taxtariff').val(parseInt(tariffValue) + parseInt(taxamount));
                }

                else {
                }

                var netA = $('#netAmount').val(parseInt($("#noofroomnights").val()) * parseInt($('#taxtariff').val()));


                //calculating commission value

                var commissionType = $("#commissionType option:selected").val();

                if (commissionType == 'amount') {
                    $('#commission_amount_div').show();
                    $('#commission_percentage_div').hide();
                    $('#commission_percentage_amount_div').hide();
                    var commission_amount = $("#commission_amount").val();
                    $('#netcommission').val(parseInt($("#commission_amount").val()) * parseInt($("#noofroomnights").val()))

                } else {
                    $('#commission_amount_div').hide();
                    $('#commission_percentage_div').show();
                    $('#commission_percentage_amount_div').show();
                    var commission_percentage = $('#commission_percentage').val();
                    var commission_percentage_amount = (tariffValue / 100) * commission_percentage;
                    $('#commission_percentage_amount').val(commission_percentage_amount);
                    $('#netcommission').val(parseInt($("#commission_percentage_amount").val()) * parseInt($("#noofroomnights").val()));
                }


            });

        });
    </script>



    <script>
        function GetDays(){
            var dropdt = new Date(document.getElementById("drop_date").value);
            var pickdt = new Date(document.getElementById("pick_date").value);
            return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
            if(document.getElementById("drop_date")){
                document.getElementById("noofroomnights").value=GetDays();
            }
        }

    </script>


    <script>
        var inr, usd ;
        function init()
        {
            inr = document.getElementById("INR");
            usd = document.getElementById("USD");

        }

        function inrfunc()
        {
            usd.value = parseFloat(inr.value) * 0.015;

        }


        function usdfunc()
        {
            inr.value = parseFloat(usd.value) * 68.84;

        }

        init();
    </script>



@endsection

