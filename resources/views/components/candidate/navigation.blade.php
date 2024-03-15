<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand">
            <span style="font-family: 'Arial Black', sans-serif; font-size: 30px; margin-left: -95px;">Job<span style="color: #ff9800;">Pulse</span></span>
        </a>
        <div class="navbar-collapse justify-content-center" style="margin-right: -700px;">
            <form class="form-inline my-2 my-lg-0 position-relative" action="#" method="GET">
                <div class="input-group">
                    <input class="form-control pl-5" type="search" name="query" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light my-2 my-sm-0 position-absolute" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-right: -50px;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('candidate.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('candidate.jobs') }}">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('candidate.blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
                </li>
                <!-- Notification Icon -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>
                <!-- End of Notification Icon -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->first_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 150px;">
                        <a class="dropdown-item text-dark" href="{{ route('candidate.profile') }}"><i class="fas fa-user-circle mr-2 text-secondary"></i> Profile</a>
                        <a class="dropdown-item text-dark" href="#"><i class="fas fa-cog mr-2 text-secondary"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt mr-2"></i> Logout</button>
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>