@extends("layouts.app")

@section("content")

<!-- Navigation Bar -->
@include("components.candidate.navigation")
<!-- End of Navigation Bar -->

<!-- Banner Section -->
<div class="container-fluid mt-8" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card banner-card">
                <div class="card-body">
                    <h2 class="card-title text-center banner-title">Jobs</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- All Published Jobs Section -->
<section class="bg-light py-5" style="margin-top: 75px;">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: Arial, sans-serif; color: #333; margin-top: -60px; font-size: 36px; font-weight: bold; text-transform: uppercase; border-bottom: 2px solid #990000; padding-bottom: 10px;">All Published Jobs</h2>
        <!-- Job Category Dropdown -->
        <div class="text-right mb-5">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="jobCategoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="jobCategoryDropdown">
                    <a class="dropdown-item" href="#">All</a>
                    <a class="dropdown-item" href="#">Software Enginner</a>
                    <a class="dropdown-item" href="#">Web Developer</a>
                    <a class="dropdown-item" href="#">Programmer</a>
                    <a class="dropdown-item" href="#">UI/UX</a>
                    <a class="dropdown-item" href="#">Designer</a>
                    <a class="dropdown-item" href="#">HR Admin</a>
                    <a class="dropdown-item" href="#">Data Analyst</a>
                    <a class="dropdown-item" href="#">Graphics Designer</a>
                    <a class="dropdown-item" href="#">Marketing Manager</a>
                    <a class="dropdown-item" href="#">Others</a>
                </div>
            </div>
        </div>
        <!-- End of Job Category Dropdown -->

        <!-- job section -->
        <div class="row">
            @foreach($jobs as $job)
            <div class="col-md-6 mb-4">
                <div class="card border-0 rounded shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #045F5F; font-size: 22px; font-weight: bold;">{{ $job->company_name }}</h5>
                        <h5 class="card-title" style="color: #806517; font-size: 18px; font-weight: bold;">{{ $job->title }}</h5>
                        <p class="card-text" style="color: #666; font-size: 16px;">{{ $job->description }}</p>
                        <p class="card-text">
                            @php
                            $tags = explode(",", $job->tags);
                            @endphp
                            @foreach ($tags as $tag)
                            <span class="badge badge-dark mr-1" style="color: #ffff;">{{ trim($tag) }}</span>
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-transparent text-right">
                        <a href="#" class="btn btn-success btn-sm">Apply Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End of job section -->

        <div class="text-center">
            <div class="form-group form-group d-inline-block mr-2">
                <a href="{{route('candidate.jobs')}}" class="btn {{$currentPage == 'jobs' ? 'btn-info' : 'btn-outline-info'}} btn-block" style="width: 50px;">
                    1
                </a>
            </div>

            <div class="form-group form-group d-inline-block">
                <a href="{{route('candidate.nextpage')}}" class="btn {{$currentPage == 'nextpage' ? 'btn-info' : 'btn-outline-info'}} btn-block" style="width: 50px;">
                    2
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End of All Published Jobs Section -->

<!-- Footer Section -->
@include("components.candidate.footer")
<!-- End of Footer Section -->

<script>
    function filterJobs(category) {
        // Get all job cards
        var jobCards = document.querySelectorAll('.job-card');

        // Show all job cards if 'All' category is selected
        if (category === 'all') {
            jobCards.forEach(function(card) {
                card.style.display = 'block';
            });
        } else {
            // Hide all job cards initially
            jobCards.forEach(function(card) {
                card.style.display = 'none';
            });

            // Show job cards with matching category
            var filteredJobs = document.querySelectorAll('.job-card[data-category="' + category + '"]');
            filteredJobs.forEach(function(job) {
                job.style.display = 'block';
            });
        }
    }
</script>

@endsection
