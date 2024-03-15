@extends('layouts.adminApp')

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
                        <h2 class="card-title text-center banner-title" style="margin-left: 200px; margin-top: -20px;">Blog Post Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:200px; margin-left: 200px;">
            <div class="card">
                <div class="card-body">
                    <h5 style="text-align: center;">Title: {{ $blogPost->title }}</h5>
                    <p>Content: {{ $blogPost->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include("components.admin.admin_left_nav")

@endsection
