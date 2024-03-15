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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Employees</h2>
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
                    Sort by Role
                </button>
                <div class="dropdown-menu" aria-labelledby="sortDropdown">
                    <a class="dropdown-item" href="#" id="allFilter">All</a>
                    <a class="dropdown-item" href="#" id="ceo">CEO</a>
                    <a class="dropdown-item" href="#" id="managing director">Managing Director</a>
                    <a class="dropdown-item" href="#" id="agm">AGM</a>
                    <a class="dropdown-item" href="#" id="dgm">DGM</a>
                    <a class="dropdown-item" href="#" id="gm">GM</a>
                    <a class="dropdown-item" href="#" id="admin">Admin</a>
                    <a class="dropdown-item" href="#" id="hr">HR</a>
                    <a class="dropdown-item" href="#" id="manager">Manager</a>
                </div>
            </div>
            <!-- End of Dropdown menu -->
            <div class="card" style="margin-right: -200px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Employee List</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach ($employers as $employer)
                                <tr>
                                    <td>{{ $employer->employer_name }}</td>
                                    <td>{{ $employer->role }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.employees.delete', $employer->id) }}" method="POST" class="d-inline">
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

        document.getElementById("ceo").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("CEO");
        });

        document.getElementById("managing director").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("Managing Director");
        });

        document.getElementById("agm").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("AGM");
        });

        document.getElementById("dgm").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("DGM");
        });

        document.getElementById("gm").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("GM");
        });

        document.getElementById("admin").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("Admin");
        });

        document.getElementById("hr").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("HR");
        });

        document.getElementById("manager").addEventListener("click", function(event) {
            event.stopPropagation();
            filterCompanies("Manager");
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