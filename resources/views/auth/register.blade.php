@extends('adminlte.layouts.auth')

@section('content')
<body class="hold-transition register-page" style="background-color: #1e2c4c;">
    <div class="register-box" style="width: 900px;">
        <div class="card" style="border-radius: 10px; overflow: hidden;">
            <div class="row no-gutters">
                <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: #c3c3c4;">
                    <div class="text-center">
                        <img src="{{ asset('images/logo-v3fix.png') }}" alt="Logo" class="img-fluid" style="max-height: 200px;">
                    </div>
                </div>
                <div class="col-md-6" style="background-color: #fff; padding: 20px;">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Register a new membership</p>

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('userFullName') is-invalid @enderror" name="userFullName" placeholder="Full name" value="{{ old('userFullName') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('userFullName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control @error('userEmail') is-invalid @enderror" name="userEmail" placeholder="Email" value="{{ old('userEmail') }}">
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
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #ffcc33; border-color: #ffcc33;">{{ __('Register') }}</button>
                                </div>
                            </div>
                        </form>
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.register-box -->
@endsection

<style>
    .register-page {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .register-box {
        width: 900px; /* Adjusted width */
    }

    .register-logo a {
        color: #ffcc33;
        font-weight: bold;
    }

    .register-card-body {
        padding: 2rem;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .input-group .form-control {
        height: calc(2.25rem + 2px);
        font-size: 1rem;
    }
</style>
