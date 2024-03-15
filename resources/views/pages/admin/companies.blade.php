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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Companies</h2>
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
            <!-- Dropdown menu -->
            <div class="dropdown mb-3">
                <button class="btn btn-info dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort by Order
                </button>
                <div class="dropdown-menu" aria-labelledby="sortDropdown">
                    <a class="dropdown-item" href="#" id="allFilter">All</a>
                    <a class="dropdown-item" href="#" id="activeFilter">Active Companies</a>
                    <a class="dropdown-item" href="#" id="pendingFilter">Pending Companies</a>
                </div>
            </div>
            <!-- End of Dropdown menu -->
            <div class="card" style="margin-right: -200px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Company List</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr id="company-row-{{ $company->id }}">
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->status }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="company{{ $company->id }}" {{ $company->status === 'Active' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="company{{ $company->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('companies.delete', $company->id) }}" method="POST" class="d-inline">
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
            event.stopPropagation(); // Prevent click event from bubbling up to document
            filterCompanies("All");
        });

        document.getElementById("activeFilter").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("Active");
        });

        document.getElementById("pendingFilter").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("Pending");
        });

        // Event listener to close dropdown when clicking outside of it
        document.body.addEventListener("click", function(event) {
            var targetElement = event.target;
            if (!targetElement.closest('.dropdown')) {
                closeDropdowns();
            }
        });

        // Function to filter companies based on status
        function filterCompanies(status) {
            var tableRows = document.querySelectorAll("tbody tr");
            tableRows.forEach(function(row) {
                var rowStatus = row.querySelector("td:nth-child(2)").textContent.trim();
                if (status === "All" || rowStatus === status) {
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