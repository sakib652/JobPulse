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
                        <h2 class="card-title text-center banner-title" style="margin-left: 150px; margin-top: -10px;">Plugins</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Banner Section -->

<!-- Main Content -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center" style="margin-top: 200px; margin-left: 150px;">
        <div class="col-md-8">
            <div class="card p-4" style="background-color: #f8f9fa; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">
                <h5 class="card-title text-center mb-4" style="font-family: 'Arial', sans-serif; color: #333;">Plugin Management</h5>
                <p class="card-text text-center mb-5" style="font-family: 'Arial', sans-serif; color: #666;">Welcome to the Plugin Management section! Here, you have control over the integration and customization of the job portal experience.</p>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3" style="font-family: 'Arial', sans-serif; color: #333;">Enabled Plugins</h6>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-family: 'Arial', sans-serif; color: #333;">
                                Resume Parser
                                <span class="badge badge-success badge-pill">Enabled</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-family: 'Arial', sans-serif; color: #333;">
                                Social Media Integration
                                <span class="badge badge-success badge-pill">Enabled</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3" style="font-family: 'Arial', sans-serif; color: #333;">Available Plugins</h6>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-family: 'Arial', sans-serif; color: #333;">
                                Job Alert System
                                <button class="btn btn-sm btn-primary">Enable</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-family: 'Arial', sans-serif; color: #333;">
                                Skill Assessment Tool
                                <button class="btn btn-sm btn-primary">Enable</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr>
                <h5 class="card-title mt-4" style="font-family: 'Arial', sans-serif; color: #333; text-align:center;">Plugin Settings</h5>
                <p class="card-text" style="font-family: 'Arial', sans-serif; color: #666; text-align:center;">Configure settings for enabled plugins here.</p>

                <!-- Example plugin settings form -->
                <form>
                    <div class="form-group">
                        <label for="emailNotifications">Email Notifications:</label>
                        <select class="form-control" id="emailNotifications">
                            <option value="enabled">Enabled</option>
                            <option value="disabled">Disabled</option>
                        </select>
                        <small class="form-text text-muted">Choose whether to receive email notifications for new job applications and updates.</small>
                    </div>
                    <div class="form-group">
                        <label for="themeColor">Theme Color:</label>
                        <input type="color" class="form-control" id="themeColor">
                        <small class="form-text text-muted">Select your preferred theme color for the job portal.</small>
                    </div>
                    <div class="form-group">
                        <label for="maxResultsPerPage">Max Results Per Page:</label>
                        <input type="number" class="form-control" id="maxResultsPerPage" min="5" max="50" step="5" value="10">
                        <small class="form-text text-muted">Specify the maximum number of search results to display per page.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>


            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


@include("components.admin.admin_left_nav")

@endsection