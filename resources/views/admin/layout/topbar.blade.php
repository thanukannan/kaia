@section('topbar')
    <div class="top">
        <div class="left">
            <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
            <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>

        </div>
        <div class="right">

            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle"id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}</button>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item"  href="{{ url('/admin/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" >
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection