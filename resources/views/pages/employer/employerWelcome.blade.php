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
                        <h2 class="card-title text-center banner-title" style="margin-left: 280px; margin-top:20px;">Employer Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="content">
    <div class="container-fluid mt-4" style="margin-left: 450px;">
        <div class="row justify-content-center">
            <!-- Job Listings -->
            <div class="col-md-12">
                <div class="row">
                    @foreach($jobPosts as $jobPost)
                    <div class="col-md-8 mb-3">
                        <div class="card job-card">
                            <div class="card-body">
                                <h5 class="card-title job-title" style="text-align: center;">{{ $jobPost->title }}</h5>
                                <p class="card-text job-description">{{ $jobPost->description }}</p>
                                <p class="card-text job-tags">Tags: {{ $jobPost->tags }}</p> 
                                <a href="{{ route('job.edit', $jobPost->id) }}" class="btn btn-primary edit-btn">Edit</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


@include("components.employer.employer_left_nav")

@endsection