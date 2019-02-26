@extends('admin.layout.auth')

@section('content')
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h1>
                        <i
                                class="fa fa-lock"
                                aria-hidden="true"></i>REGISTER
                    </h1>

                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
                {{ csrf_field() }}

                <hr>



                <p> <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="User Name"required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif</p>

                <p>  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"placeholder="E-Mail   " required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </p>

                <p> <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password"required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </p>

                <p> <input id="password-confirm" type="password" class="form-control" name="password_confirmation"placeholder="Re-EnterPassword" required>
                </p>

                <button type="submit" class="button">
                    {{ __('Register') }}
                </button>

                <br><br>
                Already You Are Member?<a href="{{ url('/admin/login') }}"> Sign In</a>
                </h3>
        </div>
        </form>

@endsection
