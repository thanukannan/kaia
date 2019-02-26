@extends('admin.layout.master')


@section('payment')
    active
@endsection

@section('addPayment')
    active
@endsection


@section('heading')
    Add Booking
    <div class="col-md-12 align-self-center">
        <div class="text-center pull-right" style="margin-top: -28px;" >
            <a href="{{ url('admin/payment/viewPayment') }}" ><button type="button" class="btn btn-success">View Payment </button></a>
        </div>
    </div>
@endsection

@section('content')


    <form action="{{route('admin.AddPaymentAdmin')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="name">Booking Date</label>

                            <div class="input-group">
                                <input id=""  type="text" class="form-control datepicker-11" name="bookingdate"  placeholder="mm/dd/yyyy" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div><!-- input-group -->
                        </div>
                    </div>


                {{--<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="control-label " for="select">Mode of Payment</label>--}}
                        {{--<div class="select">--}}
                            {{--<select id="mode_of_payment" name="mop" class="form-control" required>--}}
                                {{--<option value="">Select Income</option>--}}
                                {{--<option value="clientname">Client Name</option>--}}
                                {{--<option value="direct">Hotel</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label " for="select">Mode of Payment</label>
                            <div class="select">
                                <input type="radio" name="mop" class="mopChange" value="client" checked>Client<br>
                                <input type="radio" name="mop" class="mopChange" value="hotel">Hotel<br>
                            </div>
                        </div>
                    </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" id="clientDataDiv">
                    <div class="form-group">
                        <label class="control-label " for="select">Client</label>
                        <div class="select">
                            <select id="clientId" name="clientId" class="form-control mopChange" required>
                                <option value="">Selet Client</option>
                                    @foreach($client_data as $client)
                                        <option value="{{$client->id}}">{{$client->clientname}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>


            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" id="hotelDataDiv">
                <div class="form-group">
                    <label class="control-label " for="select">Hotel</label>
                    <div class="select">
                        <select id="hotelId" name="hotelId" class="form-control mopChange" required>
                            <option value="">Selet Hotel</option>
                            @foreach($hotel_data as $hotel)
                                <option value="{{$hotel->id}}">{{$hotel->hotelname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>





        {{--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="control-label required" for="select">Client Name</label>--}}
                    {{--<div class="select">--}}
                        {{--<select id="select" name="clientname" class="form-control" required>--}}
                            {{--<option value="">Select Client</option>--}}
                            {{--@foreach($client_data as $data)--}}
                                {{--<option value="{{ $data->id }}">{{ $data->clientname }} </option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}





            <div class="row">
                <div class="col-md-12">
                   <div id="tableui"></div>
                </div>
            </div>
            <button type="submit">Submit</button>
        </div>
        
    </form>


@endsection



@section('script')

<script>
    $(document).ready(function () {
        $("#clientId").prop("disabled", false);
        $("#hotelId").prop("disabled", true);
        $(".mopChange").change(function () {
            var mopChange = $('.mopChange:checked').val();
            if(mopChange=='hotel') {
                $("#clientId").prop("disabled", true);
                $("#hotelId").prop("disabled", false);
                $("#clientId option[value='']").attr('selected', 'selected');

            }else if(mopChange=='client') {
                $("#clientId").prop("disabled", false);
                $("#hotelId").prop("disabled", true);
                $("#hotelId option[value='']").attr('selected', 'selected');
            }
            // if(mopChange=='hotel'){
            //
            //     $('#hotelDataDiv').show();
            //     $('#clientDataDiv').hide();
            //     $("#clientId option:selected").val('');
            //
            // }else if(mopChange=='client'){
            //
            //     $('#hotelDataDiv').hide();
            //     $('#clientDataDiv').show();
            //     $("#hotelId option:selected").val('');
            //
            // }
        });


        $(".mopChange").change(function () {
            var mopChange = $('.mopChange:checked').val();
            var clientId = $("#clientId option:selected").val();
            var hotelId = $("#hotelId option:selected").val();
            $.ajax({
                type: "get",
                url: "/admin/booking/get_income_data",
                data: {clientId: clientId,hotelId:hotelId,mopChange:mopChange},
                success: function (data) {
                      $("#tableui").html(data);
                    // console.log(data);
                }
            });
        });
    });
</script>
@endsection







