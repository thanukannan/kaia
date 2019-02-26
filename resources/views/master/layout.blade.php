@include('master.header')
<section id="admin">
    <div class="sidebar">
        <div class="head">
            <div class="logo">
                <img src="{{ url('images/logo.png') }}" alt="" style="">
            </div>
        </div>
       @yield('navbar')
    </div>

    <div class="content">
        <!-- start content head -->
        <div class="head">
            <!-- head top -->

            @yield('topbar')
            <!-- end head top -->
            <!-- start head bottom -->



            <div class="bottom">
                <div class="left">
                    <h1> @yield ('heading')</h1>
                </div>
            </div>


            <!-- end head bottom -->
        </div>


        <div class="content-wrapper">
            <div class="container-fluid">
                @include('master.error')
                @yield('content')

            </div>

@include('master.footer')