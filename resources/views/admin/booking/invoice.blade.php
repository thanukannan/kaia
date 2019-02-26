<!DOCTYPE html>
<html>
<head>
    <title>Kaia Tourism</title>
    <style>
        html{
            padding: 15px;
            font-size:115%;
            font-family: cursive;
            word-spacing:2px;
        }
        @media print {
            @page { margin: 0; }
            body { margin: 1.6cm; }
        }

        img{
            margin-left: 15%;
        }

        ::selection {
            color: white;
            background: #32CD32;
        }


        mark{
            background-color:green;
            color: white;

        }
        .address {
            background-color: #D0D3D4;
            padding: 10px;

        }


        #customers {
            font-family: garamond;
            border-collapse: collapse;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;

        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: lightgrey;

        }


    </style>
</head>
<body>
<img src="data:image/png;base64,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" >
<p align= "center"><b>
        Subject: Conformation against booking</b></p>
<p>Dear Sir/Madam,</p>
<blockquote>
    We are pleased to confirm your booking as per the details given below
</blockquote>


{{--{{$bookings}}--}}

<table id="customers">
    <tr>
        <th style="text-align: center">Hotel Name</th>
        <th style="text-align: center">{{$bookings->hotel->hotelname}}</th>
    </tr>
    <tr>
        <td>Booking status</td>
        <td>{{$bookings->netamount}}</td>
    </tr>
    <tr>
        <td>Confirmation Number</td>
        <td>{{$bookings->confirmationnumber}}</td>
    </tr>

    <tr>
        <td>Guest Name</td>
        <td>{{$bookings->guestname}}</td>
    </tr>
    <tr>
        <td>Check in Date</td>
        <td>{{$bookings->checkin}}</td>
    </tr>
    <tr>
        <td>Check Out Date</td>
        <td>{{$bookings->checkout}}</td>
    </tr>
    <tr>
        <td>Room Type</td>
        <td>{{$bookings->roomtype}}</td>
    </tr>
    <tr>
        <td>Occupancy</td>
        <td>{{$bookings->occupancy}}</td>
    </tr>

    <tr>
        <td>Rates</td>
        <td>{{$bookings->netamount}}</td>
    </tr>
    <tr>
        <td>Mode of Payment</td>
        <td>{{$bookings->mop}}</td>
    </tr>
</table>
<br>
<br>

<div class="address">
    <p><b><mark>{{ $bookings->hotel->hotelname }}</mark></b></p>
    <p>{{ $bookings->hotel->address }}</p>
    <p>Tel:+91 {{$bookings->hotel->mobilenumber}} </p>
    <p>Email: {{ $bookings->hotel->emailid}}</p>
    <br>
</div>
<div id="a" style="font-family:cursive">

    <p><b>Cancellation Policy:</b> We understand that your plan changes sometimes. At Kaia it is our endeavor to keep the cancellation policy as flexible as possible, however management of each hotel sets their own cancellation policy to protect their interest, therefore as a standard practice we would request you to make cancellations/amendments before 1200 noon , 48 hours prior check in time to avoid one night retention of your entire room charges and any no shows will be charged for one night or full amount for the entire duration of stay based on the hotel policy. Kaia has the right to charge the credit card given as guarantee or bill the same to the guest/client. Kaia will consider your acceptance on the above cancellation policy up on receipt of our confirmation voucher.<br><br>
    <p><mark style="font-family: garamond">"As per Govt. Tax policies GST would be applicable as per norms on rooms and Food and Beverage rates."</mark></p>


</body>
</html>