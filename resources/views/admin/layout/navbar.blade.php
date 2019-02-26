
@section('navbar')
<div id="list">
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ url('/admin/home') }}" class="nav-link @yield('dashboard')" ><i class="fa fa-adjust"></i>Dashboard</a></li>
        <!-- end user interface submenu -->


        <!-- start Clients -->
        <li class="nav-item"><a href="#menu1" class="nav-link collapsed @yield('client')" data-toggle="collapse"><i class="fa fa-building"></i>Clients<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <li class="sub collapse" id="menu1">
            <a  href="{{ url('/admin/booking/addclient') }}" class="nav-link @yield('addclient')"  data-parent="#menu1">Add Clients</a>
            <a href="{{ url('/admin/booking/viewclient') }}" class="nav-link @yield('viewclient')" data-parent="#menu1">View Clients</a>
        </li>
        <!-- End clients -->

        <!-- start Hotel -->
        <li class="nav-item"><a href="#menu3" class="nav-link collapsed @yield('hotel')" data-toggle="collapse"><i class="fa fa-bed"></i>Hotels<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <li class="sub collapse" id="menu3">
            <a href="{{ url('/admin/booking/addhotel') }}" class="nav-link @yield('addhotel')" data-parent="#menu3">Add Hotels</a>
            <a href="{{ url('/admin/booking/viewhotel') }}" class="nav-link @yield('viewhotel')" data-parent="#menu3">View Hotels</a>
        </li>
        <!-- End Hotel -->


        <!-- start Sales-->
        <li class="nav-item"><a   href="#menu0" class="nav-link collapsed @yield('booking')" data-toggle="collapse"><i class="fa fa-fire"></i>Booking<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <li class="sub collapse" id="menu0">
            <a   href="{{ url('/admin/booking/addbooking') }}" class="nav-link  @yield('addbooking')" data-parent="#menu0">Add Booking</a>
            <a    href="{{ url('/admin/booking/viewbooking') }}" class="nav-link @yield('viewbooking')" data-parent="#menu0">View Booking</a>
        </li>
        <!-- End Sales -->




        <!-- start Staff -->
        <li class="nav-item"><a href="#menu2" class="nav-link collapsed @yield('staff')" data-toggle="collapse"><i class="fa fa-user"></i>Staffs<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <li class="sub collapse" id="menu2">
            <a href="{{ url('/admin/booking/addstaff') }}" class="nav-link @yield('addstaff')" data-parent="#menu2">Add Staffs</a>
            <a href="{{ url('/admin/booking/viewstaff') }}" class="nav-link @yield('viewstaff')" data-parent="#menu2">View Staffs</a>
        </li>
        <!-- End staff -->


        <!-- start Payments -->
        <li class="nav-item"><a href="#menu5" class="nav-link collapsed @yield('payment')" data-toggle="collapse"><i class="fa fa-fire"></i>Payments<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <li class="sub collapse" id="menu5">
            <a href="{{ url('/admin/booking/addpayment') }}" class="nav-link @yield('addPayment')" data-parent="#menu5">Add Payments</a>
            <a href="{{ url('/admin/payment/viewPayment') }}" class="nav-link @yield('viewpayment')" data-parent="#menu5">View Payments</a>

        </li>
        <!-- End payments -->


        <!--start reports -->
        <li class="nav-item"><a  href="{{ url('/admin/booking/report') }}"  class="nav-link"><i class="fa fa-fire"></i>Reports</a></li>





    </ul>
</div>

    @endsection