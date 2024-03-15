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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
    <div class="container py-5" style="margin-right: -150px; margin-top:180px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="contact-info">
                    <h3 class="text-info mb-4">Contact Information</h3>
                    <p><strong>Email:</strong> info@example.com</p>
                    <p><strong>Phone:</strong> +1 123-456-7890</p>
                    <p><strong>Location:</strong> 123 Main Street, City, Country</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social-media">
                    <h3 class="text-info mb-4">Follow Us</h3>
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
<!-- End of Main Content -->

@include("components.admin.admin_left_nav")

@endsection