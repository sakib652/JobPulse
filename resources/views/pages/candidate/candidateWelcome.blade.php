@extends('layouts.app')

@section('content')
<!-- Navigation Bar -->
@include("components.candidate.navigation")
<!-- End of Navigation Bar -->

<!-- Banner Section -->
<section class="banner text-center" style="background-color: #2b2b2b;">
    <div class="container">
        <img src="{{ asset('images/2.png') }}" alt="Banner Image" class="img-fluid">
    </div>
</section>
<!-- End of Banner Section -->

<!-- Job Stats Section -->
<section class="bg-light py-5">
    <div class="container" style="margin-top: -60px">
        <div class="row justify-content-center mb-4">
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: 4px solid #007bff;">
                    <div class="card-header bg-primary text-white">
                        Job Applied
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Jobs Applied</h5>
                        <p class="card-text">25</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: 4px solid #28a745;">
                    <div class="card-header bg-success text-white">
                        Job Saved
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Jobs Saved</h5>
                        <p class="card-text">15</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: 4px solid #6610f2;">
                <div class="card-header" style="background-color: #6610f2; color: white;">
                        New Opportunities
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Explore New Opportunities</h5>
                        <p class="card-text">20</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Job Stats Section -->


<!-- Features Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: Arial, sans-serif; color: #333; margin-top: -60px; font-size: 36px; font-weight: bold; text-transform: uppercase; border-bottom: 2px solid #990000; padding-bottom: 10px;">Top Companies</h2>
        <div id="company-slider" class="row justify-content-center">
            @php
            $companyNames = ['Infinity', 'Alexender', 'Avery Devis', 'Diamon Heart', 'Minimalist'];
            @endphp
            @foreach ($companyNames as $company)
            <div class="col-md-2 mb-4">
                <div class="company-card text-center p-3 shadow">
                    <img src="{{ asset('images/logos/logo'.($loop->index+1).'.png') }}" class="company-logo img-fluid" alt="Company Logo">
                    <div class="company-details mt-3">
                        <h5 class="company-name">{{ $company }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End of Features Section -->

<!-- Recently Published Jobs Section -->
<section class="bg-light py-5" style="margin-top: 20px;">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: Arial, sans-serif; color: #333; margin-top: -60px; font-size: 36px; font-weight: bold; text-transform: uppercase; border-bottom: 2px solid #990000; padding-bottom: 10px;">Recently Published Jobs</h2>
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

        <div class="row" style="margin-top: -50px;">
            <!-- Display at least five job posts -->
            @php
            $jobPosts = [
            [
            'company' => 'ABC Tech Solutions',
            'title' => 'Software Engineer',
            'description' => 'We are looking for a skilled software engineer to join our team and contribute to the development of our cutting-edge software solutions.'
            ],
            [
            'company' => 'XYZ Web Development',
            'title' => 'Web Developer',
            'description' => 'Join our dynamic web development team and work on exciting projects that push the boundaries of modern web technologies and attract new customers.'
            ],
            [
            'company' => 'Data Insights Inc.',
            'title' => 'Data Analyst',
            'description' => 'Seeking a talented data analyst to help extract valuable insights from our vast datasets and drive data-informed decisions.'
            ],
            [
            'company' => 'Creative Designs Co.',
            'title' => 'Graphic Designer',
            'description' => 'We are hiring a creative graphic designer to produce engaging visuals for our marketing campaigns and product interfaces.'
            ],
            [
            'company' => 'Marketing Pro',
            'title' => 'Marketing Manager',
            'description' => 'Join our marketing team and lead strategic campaigns to promote our brand and attract new customers.'
            ],
            [
            'company' => 'Ostad Solutions Co.',
            'title' => 'Frontend Developer',
            'description' => 'Join our frontend development team to build user-friendly interfaces and enhance user experiences.'
            ]
            ];
            @endphp

            @foreach ($jobPosts as $job)
            <div class="col-md-6 mb-4">
                <div class="card border-0 rounded shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #045F5F; font-size: 22px; font-weight: bold;">{{ $job['company'] }}</h5>
                        <h5 class="card-title" style="color: #806517; font-size: 18px; font-weight: bold;">{{ $job['title'] }}</h5>
                        <p class="card-text" style="color: #666; font-size: 16px;">{{ $job['description'] }}</p>
                        <!-- Tags and Salary Information -->
                        <div class="tags-and-salary">
                            <span class="badge badge-primary mr-1">Full-time</span>
                            @if ($job['title'] == 'Software Engineer')
                            <span class="badge badge-info mr-1">Programming</span>
                            <span class="badge badge-dark mr-1">Business Analyst</span>
                            <span class="badge badge-secondary">Salary: $80,000 - $100,000</span>
                            @elseif ($job['title'] == 'Web Developer')
                            <span class="badge badge-info mr-1">Web Development</span>
                            <span class="badge badge-dark mr-1">Full Stack</span>
                            <span class="badge badge-secondary">Salary: $70,000 - $90,000</span>
                            @elseif ($job['title'] == 'Data Analyst')
                            <span class="badge badge-info mr-1">Data Analysis</span>
                            <span class="badge badge-dark mr-1">IT/CSE</span>
                            <span class="badge badge-secondary">Salary: $60,000 - $80,000</span>
                            @elseif ($job['title'] == 'Graphic Designer')
                            <span class="badge badge-info mr-1">Graphic Design</span>
                            <span class="badge badge-dark mr-1">Adobe Photoshop</span>
                            <span class="badge badge-secondary">Salary: $50,000 - $70,000</span>
                            @elseif ($job['title'] == 'Marketing Manager')
                            <span class="badge badge-info mr-1">Marketing</span>
                            <span class="badge badge-dark mr-1">BBA/MBA</span>
                            <span class="badge badge-secondary">Salary: $90,000 - $110,000</span>
                            @elseif ($job['title'] == 'Frontend Developer')
                            <span class="badge badge-info mr-1">Frontend</span>
                            <span class="badge badge-dark mr-1">Web Development</span>
                            <span class="badge badge-secondary">Salary: $70,000 - $90,000</span>
                            @endif
                        </div>
                        <!-- End of Tags and Salary Information -->
                    </div>
                    <div class="card-footer border-0 bg-transparent text-right">
                        <a href="#" class="btn btn-success btn-sm">Apply Now</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="text-center">
            <a href="{{ route('candidate.jobs') }}" class="btn btn-primary" style="width: 150px; margin-top: 20px">View more</a>
        </div>
    </div>
</section>
<!-- End of Recently Published Jobs Section -->

<!-- Footer Section -->
@include("components.candidate.footer")
<!-- End of Footer Section -->

@endsection