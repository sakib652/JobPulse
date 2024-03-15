@extends("layouts.employerApp")

@section("content")
<!-- Header Section -->
@include("components.employer.header")
<!-- End of Header Section -->

<!-- Banner Section -->
<div class="container-fluid mt-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card banner-card">
                <div class="card-body">
                    <h2 class="card-title text-center banner-title" style="margin-left: 100px; margin-top: 50px;">Jobs</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="card-body">
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <div class="form-group row">
            <label for="company_name" class="col-md-4 col-form-label text-md-right">Company Name</label>

            <div class="col-md-6">
                <input id="company_name" type="text" class="form-control" name="company_name" required autofocus>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Job Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Job Description</label>

            <div class="col-md-6">
                <textarea id="description" class="form-control" name="description" required></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="tags" class="col-md-4 col-form-label text-md-right">Tags</label>

            <div class="col-md-6">
                <input id="tags" type="text" class="form-control" name="tags" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Post Job
                </button>
            </div>
        </div>
    </form>
</div>
<!-- End of Main Content -->

@include("components.employer.employer_left_nav")

@endsection
