@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #e6e6ff;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4 text-primary">Welcome to <span style="font-family: 'Arial Black', sans-serif; font-size: 30px;">Job<span style="color: #ff9800;">Pulse</span></span></h2>
                    <p class="card-text mb-4 job-portal-text">
                        <span>Find your dream job or hire the best talent with</span><span style="font-family: 'Arial Black', sans-serif; font-size: 15px;">Job</span><span style="color: #ff9800; font-family: 'Arial Black', sans-serif; font-size: 15px;">Pulse</span><span>the ultimate job portal</span>.
                    </p>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('admin.login') }}" class="btn btn-outline-primary btn-lg btn-block">Login as Admin</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('candidate.login') }}" class="btn btn-outline-primary btn-lg btn-block">Login as Candidate</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('employer.login') }}" class="btn btn-outline-primary btn-lg btn-block">Login as Employer</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('candidate.register') }}" class="btn btn-outline-primary btn-lg btn-block">Register as Candidate</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('employer.register') }}" class="btn btn-outline-primary btn-lg btn-block">Register as Employer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer style="background-color: #e6e6ff; padding: 70px;">
    <div class="container text-center">
        <p>&copy; 2024 JobPulse. All rights reserved.</p>
    </div>
</footer>

@endsection