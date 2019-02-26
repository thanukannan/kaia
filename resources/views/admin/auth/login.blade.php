@extends('admin.layout.auth')

@section('content')
                <div class="login-page">
                <div class="form">
                <div class="login">
                 <div class="login-header">
                     <h1>
                        <i class="fa fa-lock" aria-hidden="true"></i>LOGIN
                     </h1>
                 </div>
                 </div>
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                {{ csrf_field() }}
                  <hr>


                  <p> <input id="email" type="email"  name="email" value="{{ old('email') }}"  placeholder="E-Mail" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </p>

                   <p>
                       <input id="password" type="password"  name="password"  placeholder="&#128274 Password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </p>
                    <button type="submit" class="button">
                        {{ __('Login') }}
                    </button>



                    <br><br>
                    Not Yet A Member?<a href="{{ url('/admin/register') }}">Sign Up</a>

                </div>
                </div>
        </form>

@endsection
