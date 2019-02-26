@extends('operation.layout.auth')

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
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/operation/login') }}">
                {{ csrf_field() }}
                    <hr>


                    <p>
                    <input id="email" type="email"  name="email" value="{{ old('email') }}"  placeholder="E-Mail" required autofocus>

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
                      <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                         <a class="btn btn-link" href="{{ url('/operation/password/reset') }}">
                            <br><br>
                            Forgot Your Password?
                        </a>
                      </div>
                      </div>

                </h3>




            </form>

@endsection
