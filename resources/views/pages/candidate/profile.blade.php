@extends('layouts.app')

@section("content")

<!-- Navigation Bar -->
@include("components.candidate.navigation")
<!-- End of Navigation Bar -->

<!-- Profile Section -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" class="form-control" value="{{ Auth::user()->first_name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="form-control" value="{{ Auth::user()->last_name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('candidate.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Profile Section -->

<!-- Footer Section -->
@include("components.candidate.footer")
<!-- End of Footer Section -->

@endsection
