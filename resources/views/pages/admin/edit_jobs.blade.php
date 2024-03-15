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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Edit Jobs</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="container-fluid mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top:200px; margin-left: 150px;">
                <div class="card">
                    <div class="card-body">
                        <!-- Job Edit Form -->
                        <form action="{{ route('jobs.update', $jobPost->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Company Name -->
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $jobPost->company_name }}" required>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $jobPost->title }}" required>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $jobPost->description }}</textarea>
                            </div>

                            <!-- Tags -->
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="{{ $jobPost->tags }}">
                                <small id="tagsHelp" class="form-text text-muted">Enter comma-separated tags (optional).</small>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="pending" {{ $jobPost->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="active" {{ $jobPost->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $jobPost->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                        <!-- End of Job Edit Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End of Main Content -->


@include("components.admin.admin_left_nav")

@endsection