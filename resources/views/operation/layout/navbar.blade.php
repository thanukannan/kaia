
@section('navbar')
    <div id="list">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="index.html" class="nav-link @yield('dashboard')" ><i class="fa fa-adjust"></i>Dashboard</a></li>
                <!-- end user interface submenu -->


            <!-- start Clients -->
            <li class="nav-item"><a href="#menu1" class="nav-link collapsed  @yield('client')" data-toggle="collapse"><i class="fa fa-building"></i>Clients<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu1">
                <a href="{{ url('/operation/operationcategory/addclient') }}" class="nav-link  @yield('addclient')" data-parent="#menu1">Add Clients</a>
                <a href="{{ url('/operation/operationcategory/viewclient') }}" class="nav-link  @yield('viewclient')" data-parent="#menu1">View Clients</a>
            </li>
            <!-- End clients -->

            <!-- start Hotel -->
            <li class="nav-item"><a href="#menu3" class="nav-link collapsed  @yield('hotel')" data-toggle="collapse"><i class="fa fa-bed"></i>Hotels<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu3">
                <a href="{{ url('/operation/operationcategory/addhotel') }}" class="nav-link  @yield('addhotel')" data-parent="#menu3">Add Hotels</a>
                <a href="{{ url('/operation/operationcategory/viewhotel') }}" class="nav-link  @yield('viewhotel')" data-parent="#menu3">View Hotels</a>
            </li>
            <!-- End Hotel -->


            <!-- start Sales-->
            <li class="nav-item"><a href="#menu0" class="nav-link collapsed  @yield('booking')" data-toggle="collapse"><i class="fa fa-fire"></i>Booking<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
            <li class="sub collapse" id="menu0">
                <a href="{{ url('/operation/operationcategory/addbooking') }}" class="nav-link  @yield('addbooking')" data-parent="#menu0">Add Booking</a>
                <a href="{{ url('/operation/operationcategory/viewbooking') }}" class="nav-link  @yield('viewbooking')" data-parent="#menu0">View Booking</a>
            </li>
            <!-- End Sales -->


</ul>
    </div>

@endsection