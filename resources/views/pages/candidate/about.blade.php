@extends('layouts.app')

@section("content")

<!-- Navigation Bar -->
@include("components.candidate.navigation")
<!-- End of Navigation Bar -->

<!-- Banner Section -->
<div class="container-fluid mt-8 bg-light">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card banner-card">
                <div class="card-body">
                    <h2 class="card-title text-center banner-title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4 text-primary">Company History</h2>
                        @if ($about)
                            <p class="text-muted section-divider">
                                {{ $about->company_history }}
                            </p>
                        @else
                            <p class="text-muted">Company history information not available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of About Section -->

<!-- Our Vision Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4 text-info">Our Vision</h2>
                        @if ($about)
                            <p class="text-muted section-divider">
                                {{ $about->company_vision }}
                            </p>
                        @else
                            <p class="text-muted">Company vision information not available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Our Vision Section -->

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 text-info">Companies Believe in Us</h2>
        <div id="company-slider" class="row justify-content-center">
            @php
            $companyNames = ['Infinity', 'Alexender', 'Avery Devis', 'Diamon Heart', 'Minimalist','Creative Design','Impact E-Sports','Pho3nix'];
            @endphp
            @foreach ($companyNames as $company)
            <div class="col-md-3 mb-4"> 
                <div class="company-card text-center p-3 border rounded shadow">
                    <img src="{{ asset('images/logos/logo'.($loop->index+1).'.png') }}" class="company-logo img-fluid" alt="Company Logo">
                    <div class="company-details mt-3">
                        <h5 class="company-name" style="font-size: 18px; font-weight: bold; color: #333;">{{ $company }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End of Features Section -->

<!-- Call-to-Action Section -->
<section class="py-5 bg-primary text-center text-white">
    <div class="container">
        <h2 class="mb-4">Have Queries?</h2>
        <p class="lead mb-4">Reach out to us to find more about JobPulse.</p>
        <a href="{{ route('contact') }}" class="btn btn-lg btn-light">Contact Us</a>
    </div>
</section>
<!-- End of Call-to-Action Section -->

<!-- Footer Section -->
@include("components.candidate.footer")
<!-- End of Footer Section -->

@endsection
