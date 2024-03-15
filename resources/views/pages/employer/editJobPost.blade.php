@extends("layouts.employerApp")

@section("content")
<!-- Header Section -->
@include("components.employer.header")
<!-- End of Header Section -->

<!-- Edit Job Post Form -->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>Edit Job Post</h2>
                    <form method="POST" action="{{ route('job.update', $jobPost->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $jobPost->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $jobPost->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <textarea class="form-control" id="tags" name="tags">{{ $jobPost->tags }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Edit Job Post Form -->

@include("components.employer.employer_left_nav")

@endsection
