@extends('layouts.app')

@section('content')
<div class="container-fluid pt-3 pb-5" style="background-color: #e6e6ff;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card employer-login">
                <div class="card-header d-flex justify-content-center custom-card-header">{{ __('Login As an Employer') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employer.login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('password.request') }}" class="font-weight-bold">Forgot Your Password?</a>
                        </div>

                        <!-- "Login with Google" option -->
                        <div class="text-center">
                            <div class="form-group d-inline-block mr-2">
                                <a href="{{ route('google.login') }}" class="btn btn-secondary" style="width: 200px;">
                                    Login with Google
                                </a>
                            </div>

                            <div class="form-group d-inline-block">
                                <button type="submit" class="btn btn-primary" style="width: 200px;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer text-center">
                        <p>Don't have an account? <a href="{{ route('employer.register') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection