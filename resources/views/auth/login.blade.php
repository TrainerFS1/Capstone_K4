@extends('adminlte.layouts.auth')

@section('content')
<body class="hold-transition login-page" style="background-color:#1e2c4c;">
    <div class="login-box" style="width: 700px;">
        <div class="card" style="border-radius: 10px; overflow: hidden;">
            <div class="row no-gutters">
                <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: #c3c3c4;">
                    <div class="text-center">
                        <img src="{{ asset('images/logo-v3fix.png') }}" alt="Logo" class="img-fluid" style="max-height: 200px;">
                    </div>
                </div>
                <div class="col-md-6" style="background-color: #fff;">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Sign in to start your session</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" class="form-control @error('userEmail') is-invalid @enderror" name="userEmail" value="{{ old('userEmail') }}" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('userEmail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
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
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #ffcc33; border-color: #ffcc33;">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </form>

                        <div class="social-auth-links text-center mb-3">
                            @if (Route::has('password.request'))
                                <p class="mb-1">
                                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </p>
                            @endif
                            @if (Route::has('register'))
                                <p class="mb-0">
                                    <a href="{{ route('register') }}" class="text-center">{{ __('Register') }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
