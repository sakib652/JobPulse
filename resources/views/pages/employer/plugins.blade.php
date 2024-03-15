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
                        <h2 class="card-title text-center banner-title" style="margin-left: 130px; margin-top:10px;">Plugins</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container" style="margin-top:180px;">
        <h2 class="text-center mb-4" style="margin-left: 110px;">Explore Plugins</h2>
        <div class="row" style="margin-left: 150px;">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Plugin Name 1</h5>
                        <p class="card-text">Description of Plugin 1</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Plugin Name 2</h5>
                        <p class="card-text">Description of Plugin 2</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Plugin Name 3</h5>
                        <p class="card-text">Description of Plugin 3</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Add more cards for additional plugins -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Plugin Name 4</h5>
                        <p class="card-text">Description of Plugin 4</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Plugin Name 5</h5>
                        <p class="card-text">Description of Plugin 5</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Plugin Name 6</h5>
                        <p class="card-text">Description of Plugin 6</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Main Content -->

@include("components.employer.employer_left_nav")

@endsection
