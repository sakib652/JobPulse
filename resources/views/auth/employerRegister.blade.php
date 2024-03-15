@extends('layouts.app')

@section('content')
<div class="container-fluid pt-3 pb-5" style="background-color: #e6e6ff;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card employer-login">
                <div class="card-header d-flex justify-content-center custom-card-header">{{ __('Register As an Employer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employer.register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="first_name">{{ __('First Name') }}</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name') }}</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <p class="mb-0">Already have an account? <a href="{{ route('employer.login') }}">Login</a></p>
                        </div>
                        <div class="text-center">
                            <div class="form-group form-group d-inline-block mr-2">
                                <a href="{{ route('google.signup') }}" class="btn btn-secondary btn-block" style="width: 200px;">
                                    Signup with Google
                                </a>
                            </div>

                            <div class="form-group form-group d-inline-block">
                                <button type="submit" class="btn btn-primary btn-block" style="width: 200px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection