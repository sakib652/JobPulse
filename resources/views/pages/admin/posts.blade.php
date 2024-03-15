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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Posts</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="container mt-5 mb-5" style="margin-left: 350px;">
    <div class="row">
        <div class="col-md-8" style="margin-top:200px; margin-left: 50px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title" style="margin-left: 250px;">All Blog Posts</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog Post</a>
                    </div>
                    @if (count($blogPosts) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogPosts as $blogPost)
                                        <tr>
                                            <td>{{ $blogPost->title }}</td>
                                            <td>
                                                <a href="{{ route('blogs.show', $blogPost->id) }}" class="btn btn-sm btn-primary">View</a>
                                                <a href="{{ route('blogs.edit', $blogPost->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                                <form action="{{ route('blogs.destroy', $blogPost->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No blog posts found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

@include("components.admin.admin_left_nav")

@endsection
