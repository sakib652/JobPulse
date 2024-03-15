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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top:10px;">Blogs</h2>
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
        <h2 class="text-center mb-4" style="margin-left: 130px;">Explore Our Blog</h2>
        <div class="row" style="margin-left: 150px;">
            @foreach($blogPosts as $blogPost)
            <div class="col-md-4">
                <div class="card mb-4">
                    @php
                    $imagePath = 'images/';
                    switch($blogPost->title) {
                    case 'Career Growth':
                    $imagePath .= 'career.jpg';
                    break;
                    case 'Interview Tips':
                    $imagePath .= 'interview.png';
                    break;
                    case 'Networking':
                    $imagePath .= 'networking.png';
                    break;
                    default:
                    $imagePath .= 'default-image.jpg';
                    break;
                    }
                    @endphp
                    <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $blogPost->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blogPost->title }}</h5>
                        <div class="card-text blog-content text-justify" style="height: 100px; overflow: hidden;">
                            <p>{{ $blogPost->content }}</p>
                        </div>
                        <a href="#" class="btn btn-primary read-more">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End of Main Content -->

@include("components.employer.employer_left_nav")

@endsection

<!-- JavaScript for Read More Button -->
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var readMoreButtons = document.querySelectorAll('.read-more');
        readMoreButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var content = this.parentElement.querySelector('.blog-content');
                if (content.style.height === 'auto') {
                    content.style.height = '100px'; // Change this value to the initial height of the content
                    this.textContent = 'Read More'; // Change button text to "Read More"
                } else {
                    content.style.height = 'auto'; // Expand the content
                    this.textContent = 'Read Less'; // Change button text to "Read Less"
                }
            });
        });
    });
</script>
@endsection
