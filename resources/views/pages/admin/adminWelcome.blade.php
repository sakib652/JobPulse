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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Admin Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="container-fluid mt-4 mb-5">
    <div class="row justify-content-center" style="margin-top:200px;">
        <div class="col-md-8" style="margin-left: 150px;">
            <!-- Chart Section -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Companies</h5>
                            <canvas id="activeCompaniesChart" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Companies</h5>
                            <canvas id="pendingCompaniesChart" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jobs Posted</h5>
                            <canvas id="jobsPostedChart" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Chart Section -->
        </div>
    </div>
</div>
<!-- End of Main Content -->

@include("components.admin.admin_left_nav")


<script>
        // Data for the charts (sample data)
        var activeCompaniesData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Active Companies',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40]
            }]
        };

        var pendingCompaniesData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Pending Companies',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [28, 48, 40, 19, 86, 27, 90]
            }]
        };

        var jobsPostedData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Jobs Posted',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: [35, 45, 20, 50, 60, 70, 80]
            }]
        };

        // Create and render the charts
        var activeCompaniesChart = new Chart(document.getElementById('activeCompaniesChart'), {
            type: 'bar',
            data: activeCompaniesData
        });

        var pendingCompaniesChart = new Chart(document.getElementById('pendingCompaniesChart'), {
            type: 'bar',
            data: pendingCompaniesData
        });

        var jobsPostedChart = new Chart(document.getElementById('jobsPostedChart'), {
            type: 'bar',
            data: jobsPostedData
        });
    </script>
@endsection