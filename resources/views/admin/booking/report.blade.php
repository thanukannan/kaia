<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
          rel = "stylesheet">
</head>
<style>
    body{
        padding: 20px;
    }
</style>
<body>

<div class="page-header" style="text-align: center;font-size:30px;">BOOKING REPORT</div>
<hr>
<div class="row">
    <div class="col-md-2">
        <input type="text" id="min" placeholder="From" class="form-control" style="width:242px">
    </div>
    <div class="col-md-2">
        <input type="text"  id="max" placeholder="To" class="form-control" style="width:242px">
    </div>
    <div class="col-sm-3">
        <input type="button" value="search" id="test" class="btn btn-primary">
    </div> </div>
<br>
<table id="example" class="table table-bordered table-hover view_data_table_search" style="width:100%">
<div class="container">
    <thead style="font-family: cursive;color:black">
    <tr>
        <th>booking date</th>
        <th>client name</th>
        <th>booking_given_by</th>
        <th>hotel name </th>
        <th>Guest Name</th>
        <th>occupancy</th>
        <th>hotel_concern_person</th>
        <th>check in</th>
        <th>checkout</th>
        <th>no_of_roomnights</th>
        <th>Booking status</th>
        <th>Confirmation number</th>
        <th>Room type</th>
        <th>tariff_per_day</th>
        <th>gst_method</th>
        <th>tax percentage</th>
        <th>tax amount</th>
        <th>total_with_tax</th>
        <th>commission type</th>
        <th>commission_amount</th>
        <th>commission_percentage</th>
        <th>commission_percentage_amount</th>
        <th>Net amount</th>
        <th>kaia_commission	</th>
        <th>mop</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $datas)
        <tr>
            <td>{{$datas->bookingdate }}</td>
            <td>{{$datas->client->clientname }}</td>
            <td>{{$datas->booking_given_by	    }}</td>
            <td>{{ $datas->hotel->hotelname }}</td>
            <td>{{ $datas->guestname }}</td>
            <td>{{ $datas->occupancy }}</td>
            <td>{{$datas->hotel_concern_person}}</td>
            <td>{{ $datas->checkin }}</td>
            <td>{{ $datas->checkout }}</td>
            <td>{{$datas->no_of_roomnights}}</td>
            <td>{{$datas->bookingstatus	}}</td>
            <td>{{ $datas->confirmationnumber }}</td>
            <td>{{ $datas->roomtype }}</td>
            <td>{{$datas->tariff_perday}}</td>
            <td>{{$datas->gst_method}}</td>
            <td>{{$datas->taxpercentage}}</td>
            <td>{{$datas->taxamount	}}</td>
            <td>{{$datas->total_with_tax}}</td>
            <td>{{$datas->commissiontype}}</td>
            <td>{{$datas->commission_amount	}}</td>
            <td>{{$datas->commission_percentage}}</td>
            <td>{{$datas->commission_percentage_amount	}}</td>
            <td>{{ $datas->netamount }}</td>
            <td>{{$datas->kaia_commission	}}</td>
            <td>{{ $datas->mop }}</td>
        </tr>
    @endforeach
    </tbody>
</div>
</table>

</body>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready( function () {
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();
                var date = data[0]; // use data for the age column
                var data_table_date = date.split("/");
                var table_date = data_table_date[0];
                var table_month = data_table_date[1];
                var table_year = data_table_date[2];
                var table_date_final = table_year + '/' + table_month + '/' + table_date;

                var minimum = min.split("/");
                var min_date = minimum[0];
                var min_month = minimum[1];
                var min_year = minimum[2];
                var minimum_date = min_year + '/' + min_month + '/' + min_date;

                var maximum = max.split("/");
                var max_date = maximum[0];
                var max_month = maximum[1];
                var max_year = maximum[2];
                var maximum_date = max_year + '/' + max_month + '/' + max_date;
                console.log(table_date_final);


                // if ( ( min == '' && max == '' ) ||
                // ( min == '' && date <= max ) ||
                // ( min <= date && '' == max ) ||
                // ( min <= date && date <= max ) )
                if ((min == '' && max == '') ||
                    (min == '' && table_date_final <= maximum_date) ||
                    (minimum_date <= table_date_final && '' == max) ||
                    (minimum_date <= table_date_final && table_date_final <= maximum_date)) {
                    return true;
                }
                return false;
            }
        );

        var table =  $('#example').DataTable( {
            dom: 'lBfrtip',
            lengthMenu: [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            pageLength: 10,
            responsive: false,
            columnDefs: [{ type: 'date-mmm-dd-yyyy', targets: 0 }],
            buttons: [
                {
                    extend: 'excelHtml5',
                    filename: 'Booking Report',
                    title:'Booking Report',
                    footer: true
                },

            ]
        });

        $('.dt-buttons a').addClass('btn btn-info btn-sm');
        $('#test').click(function () {
            table.draw();
        });

        //Date Picker
        $("#min").datepicker({
            onSelect: function (currDate) {
                $("#status").html("Selected date: " + currDate);
            },
            dateFormat: 'mm/dd/yy'
        });
        $("#max").datepicker({
            onSelect: function (currDate) {
                $("#status").html("Selected date: " + currDate);
            },
            dateFormat: 'mm/dd/yy'
        });

        $('#sales_export').on('click', function () {
            $('<table>').append(table.$('tr').clone()).table2excel({
                exclude: ".excludeThisClass",
                name: "Sales Details",
                filename: "Sales Details" //do not include extension
            });
        });
    });
</script>
</html>