@extends('layouts.app')

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
                    <h2 class="card-title text-center banner-title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<div style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="row">
            <!-- Contact Panel Section -->
            <div class="col-md-8" style="margin-left: auto;">
                <div class="contact-panel py-5">
                    <div class="contact-info">
                        <h3 class="text-info">Contact Us</h3>
                        <p><strong>Email:</strong> info@example.com</p>
                        <p><strong>Phone:</strong> +1 123-456-7890</p>
                        <p><strong>Location:</strong> 123 Main Street, City, Country</p>
                        <div class="social-media">
                            <h3 class="text-info d-inline-block">Follow Us</h3>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Contact Panel Section -->

            <!-- Get in Section -->
            <div class="col-md-3 mb-4">
                <div class="contact-form">
                    <h3 class="text-center mb-4 text-info">Get in touch</h3>
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-center d-block">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-center d-block">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="text-center d-block">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="text-center d-block">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="query" class="text-center d-block">Query</label>
                            <textarea class="form-control" id="query" name="query" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                    </form>
                </div>
            </div>
            <!-- End of Get in Section -->
        </div>
    </div>
</div>

<!-- Features Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4 text-info">Companies Believe in Us</h2>
        <div id="company-slider" class="row justify-content-center">
            @php
            $companyNames = ['Infinity', 'Alexender', 'Avery Devis', 'Diamon Heart', 'Minimalist','Creative Design','Impact E-Sports','Pho3nix'];
            @endphp
            @foreach ($companyNames as $company)
            <div class="col-md-3 mb-4">
                <div class="company-card text-center p-3 border rounded">
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


<!-- Footer Section -->
@include("components.candidate.footer")
<!-- End of Footer Section -->

@endsection