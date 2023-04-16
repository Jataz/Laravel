@extends('layouts.app')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <h3>LOGIN</h3>
  </div>
  <!-- /.login-logo -->
  <div class="card">
  <div class="card-body login-card-body">
        <p class="login-box-msg"></p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row" style="margin-left: 10px;">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
  
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">login</button>
                </div>

            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection
