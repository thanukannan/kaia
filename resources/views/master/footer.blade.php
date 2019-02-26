
<!-- start screpting -->
@yield('script')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{ url('js/tether.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/ap.js') }}"></script>
<script src="{{ url('js/validation.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
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

        var table =  $('#datatable').DataTable( {
            dom: 'lBfrtip',
            lengthMenu: [ [5,10, 20, 50, -1], [5,10, 20, 50, "All"] ],
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

<script>
    var $li = $('#list li').click(function() {
        $li.removeClass('selected');
        $(this).addClass('selected');
    });
</script>

</body>

</html>