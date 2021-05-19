@extends('layouts.auth-header')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="h1"><b>Masjid</b>Kita</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="text" maxlength="32" minlength="3" name="username"
                                   class="form-control @error('username') is-invalid @enderror"
                                   placeholder="{{ __('Username/E-mail Address') }}" value="{{ old('username') }}"
                                   autocomplete="username"
                                   required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        @error('username')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="{{ __('Password') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <hr class="mb-3"/>

                @if (Route::has('register'))
                    <p class="mb-1">
                        <a href="{{ route('register') }}" class="text-center">{{ __('Register') }}</a>
                    </p>
                @endif

                @if (Route::has('password.request'))
                    <p class="mb-0">
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </p>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

@endsection
