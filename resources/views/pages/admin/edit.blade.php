@extends("layouts.adminApp")

@section("content")
<!-- Header Section -->
@include("components.admin.header")
<!-- End of Header Section -->

<!-- Banner Section -->
<div class="banner-section">
    <div class="container-fluid mt-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card banner-card">
                    <div class="card-body">
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Edit Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Edit Section -->
<div class="container mt-4 mb-5" style="margin-left: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:180px;">
            <div class="card">
                
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf

                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>

                        <!-- Password (optional) -->
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>

                        <!-- Confirm Password (optional) -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Edit Section -->

@include("components.admin.admin_left_nav")

@endsection
