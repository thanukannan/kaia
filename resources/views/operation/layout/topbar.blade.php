@section('topbar')
    <div class="top">
        <div class="left">
            <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
            <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>

        </div>
        <div class="right">
            {{--<button class="btn btn-info hidden-xs-down"><i class="fa fa-bell"></i></button>--}}
            {{--<button class="btn btn-info hidden-xs-down"><i class="fa fa-envelope"></i></button>--}}
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle"id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}</button>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    {{--<a class="dropdown-item"  href="http://localhost:8000">User Settings</a>--}}
                    {{--<a class="dropdown-item" href="#">sitting</a>--}}
                    <a class="dropdown-item"  href="{{ url('/operation/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/operation/logout') }}" method="POST" >
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection