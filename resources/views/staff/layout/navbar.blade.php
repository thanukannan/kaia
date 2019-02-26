
@section('navbar')
    <div id="list">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="" class="nav-link active" ><i class="fa fa-adjust"></i>Dashboard</a></li>
            <!-- end user interface submenu -->


            <!-- start Clients -->
            <li class="nav-item"><a href="#menu1" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-building"></i>Clients<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu1">
                <a href="{{ url('/admin/booking/addclient') }}" class="nav-link" data-parent="#menu1">Add Clients</a>
                <a href="{{ url('/admin/booking/viewclient') }}" class="nav-link" data-parent="#menu1">View Clients</a>
            </li>
            <!-- End clients -->

            <!-- start Hotel -->
            <li class="nav-item"><a href="#menu3" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-bed"></i>Hotels<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu3">
                <a href="{{ url('/admin/booking/addhotel') }}" class="nav-link" data-parent="#menu3">Add Hotels</a>
                <a href="{{ url('/admin/booking/viewhotel') }}" class="nav-link" data-parent="#menu3">View Hotels</a>
            </li>
            <!-- End Hotel -->


            <!-- start Sales-->
            <li class="nav-item"><a href="#menu0" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Booking<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu0">
                <a href="{{ url('/admin/booking/addbooking') }}" class="nav-link" data-parent="#menu0">Add Booking</a>
                <a href="{{ url('/admin/booking/viewbooking') }}" class="nav-link" data-parent="#menu0">View Booking</a>
            </li>
            <!-- End Sales -->




            <!-- start Staff -->
            <li class="nav-item"><a href="#menu2" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-user"></i>Staffs<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu2">
                <a href="{{ url('/admin/booking/addstaff') }}" class="nav-link" data-parent="#menu2">Add Staffs</a>
                <a href="{{ url('/admin/booking/viewstaff') }}" class="nav-link" data-parent="#menu2">View Staffs</a>
            </li>
            <!-- End staff -->


            <!-- start Payments -->
            <li class="nav-item"><a href="#menu5" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Payments<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu5">
                <a href="" class="nav-link" data-parent="#menu5">Add Payments</a>
                <a href="" class="nav-link" data-parent="#menu5">View Payments</a>
            </li>
            <!-- End payments -->
            <!-- end with charts -->

        </ul>
    </div>

@endsection