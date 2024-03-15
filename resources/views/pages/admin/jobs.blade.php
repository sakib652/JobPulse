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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Jobs</h2>
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
        <div class="col-md-8" style="margin-top:200px;">
            <div class="d-flex justify-content-between mb-3">
                <!-- Dropdown menu -->
                <div class="dropdown mb-3">
                    <button class="btn btn-info dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by Status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="sortDropdown">
                        <a class="dropdown-item" href="#" id="allFilter">All</a>
                        <a class="dropdown-item" href="#" id="activeFilter">Active Companies</a>
                        <a class="dropdown-item" href="#" id="pendingFilter">Pending Companies</a>
                    </div>
                </div>
                <!-- End of Dropdown menu -->

                <!-- Dropdown menu -->
                <div class="dropdown mb-3" style="margin-left: 800px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by title
                    </button>
                    <div class="dropdown-menu" aria-labelledby="sortDropdown">
                        <a class="dropdown-item" href="#" id="allFilter">All</a>
                        <a class="dropdown-item" href="#" id="software">Software Engineer</a>
                        <a class="dropdown-item" href="#" id="data">Data Analyst</a>
                        <a class="dropdown-item" href="#" id="graphics">Graphic Designer</a>
                        <a class="dropdown-item" href="#" id="marketing">Marketing Manager</a>
                        <a class="dropdown-item" href="#" id="hr">HR Admin</a>
                        <a class="dropdown-item" href="#" id="ui/ux">UI/UX Designer</a>
                        <a class="dropdown-item" href="#" id="front">Frontend Developer</a>
                    </div>
                </div>
                <!-- End of Dropdown menu -->
            </div>

            <div class="card" style="margin-right: -200px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Job List</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach ($jobPosts as $jobPost)
                                <tr>
                                    <td>{{ $jobPost->title }}</td>
                                    <td>{{ $jobPost->status }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="job{{ $jobPost->id }}" {{ $jobPost->status === 'Active' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="job{{ $jobPost->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('jobs.edit', $jobPost->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.jobs.delete', $jobPost->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-company">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

@include("components.admin.admin_left_nav")

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownToggleList = [].slice.call(document.querySelectorAll('[data-toggle="dropdown"]'));
        var dropdownList = dropdownToggleList.map(function(dropdownToggle) {
            return new bootstrap.Dropdown(dropdownToggle);
        });

        // Event listeners for dropdown items
        document.getElementById("allFilter").addEventListener("click", function(event) {
            event.stopPropagation(); 
            filterJobs("All");
        });

        document.getElementById("activeFilter").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Active");
        });

        document.getElementById("pendingFilter").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Pending");
        });

        // Event listener for sorting by title dropdown items
        document.getElementById("software").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Software Engineer");
        });

        document.getElementById("data").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Data Analyst");
        });

        document.getElementById("graphics").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Graphic Designer");
        });

        document.getElementById("marketing").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Marketing Manager");
        });

        document.getElementById("hr").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("HR Admin");
        });

        document.getElementById("ui/ux").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("UI/UX Designer");
        });

        document.getElementById("front").addEventListener("click", function(event) {
            event.stopPropagation();
            filterJobs("Frontend Developer");
        });

        // Event listener to close dropdown when clicking outside of it
        document.body.addEventListener("click", function(event) {
            var targetElement = event.target;
            if (!targetElement.closest('.dropdown')) {
                closeDropdowns();
            }
        });

        // Function to filter jobs based on status
        function filterJobs(status) {
            var tableRows = document.querySelectorAll("tbody tr");
            tableRows.forEach(function(row) {
                var rowStatus = row.querySelector("td:nth-child(2)").textContent.trim();
                var rowTitle = row.querySelector("td:first-child").textContent.trim();
                if (status === "All" || rowStatus === status || rowTitle === status) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        // Function to close all dropdowns
        function closeDropdowns() {
            dropdownList.forEach(function(dropdown) {
                dropdown.hide();
            });
        }
    });
</script>


@endsection


  