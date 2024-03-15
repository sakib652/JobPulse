@extends("layouts.employerApp")

@section("content")
<!-- Header Section -->
@include("components.employer.header")
<!-- End of Header Section -->

<!-- Banner Section -->
<div class="banner-section">
    <div class="container-fluid mt-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card banner-card">
                    <div class="card-body">
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Accounts</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<div class="container mt-4" style="margin-left: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:180px;">
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
                        <a href="{{ route('employer.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->

@include("components.employer.employer_left_nav")

@endsection