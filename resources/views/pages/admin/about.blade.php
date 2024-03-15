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
                        <h2 class="card-title text-center banner-title" style="margin-left: 200px; margin-top: -10px;">About</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="container-fluid mt-4 mb-5" style="margin-left: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:180px;">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0" style="margin-left: 350px;">About Page</h4>
                </div>
                <div class="card-body">
                    <!-- Form for About Page -->
                    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="page_title">Page Title</label>
                            <input type="text" class="form-control" id="page_title" name="page_title" value="{{ $aboutPage->page_title ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="company_history">Company History</label>
                            <textarea class="form-control" id="company_history" name="company_history" rows="4" required>{{ $aboutPage->company_history ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="company_vision">Company Vision</label>
                            <textarea class="form-control" id="company_vision" name="company_vision" rows="4" required>{{ $aboutPage->company_vision ?? '' }}</textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for="banner_image">Page Banner Image</label>
                            <input type="file" class="form-control-file" id="banner_image" name="banner_image">
                        </div> -->
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

@include("components.admin.admin_left_nav")

@endsection
