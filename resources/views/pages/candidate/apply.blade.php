@extends("layouts.app")

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
                    <h2 class="card-title text-center banner-title">Apply</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Display Success/Error Messages -->
<div class="container mt-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- End of Display Success/Error Messages -->

<!-- All Published Jobs Section -->
<div style="background-color: #f8f9fa;">
    <div class="container mt-8">
        <div class="row justify-content-center">
            <div class="col-md-4" style="margin-bottom: 200px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Upload Resume</h5>
                        <form action="{{ route('candidate.submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="resume" class="font-weight-bold">Choose a resume file (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control-file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit Resume</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of All Published Jobs Section -->

<!-- Footer Section -->
@include("components.candidate.footer")
<!-- End of Footer Section -->

@endsection