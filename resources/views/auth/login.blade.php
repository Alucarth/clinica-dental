@extends('layouts.public')

@section('content')
<div class="login-box">
    {{-- <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div> --}}
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Inice sesion para ingresar al sistema</p>
  
      <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="form-group has-feedback">
            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
          <!-- /.col -->
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
          </div>
          <!-- /.col -->
        </div>
        <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
        </div>
      </form>
  
      
      <!-- /.social-auth-links -->
  
      {{-- <a href="#">Olvide mi password</a><br>
      <a href="register.html" class="text-center">Registrar Nuevo Usuario</a> --}}
  
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

@endsection
