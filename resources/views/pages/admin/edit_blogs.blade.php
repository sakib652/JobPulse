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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Edit Blog Post</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Edit Section -->
<div class="container mt-4 mb-5" style="margin-left: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:180px;">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('blogs.update', $blogPost->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ $blogPost->title }}" required autofocus>
                        </div>

                        <!-- Content -->
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" class="form-control" name="content" rows="8" required>{{ $blogPost->content }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Blog Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Edit Section -->

@include("components.admin.admin_left_nav")

@endsection
