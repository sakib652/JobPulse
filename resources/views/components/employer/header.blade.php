<header class="header-section" style="background-color: #17a2b8; height: 70px">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a class="navbar-brand" style="margin-top: 5px;">
                    <span style="font-family: 'Arial Black', sans-serif; font-size: 30px; color: #ffffff; margin-left: 10px;">Job<span style="color: #ff9800;">Pulse</span></span>
                </a>
            </div>
            <div class="col-md-8 text-right">
                <!-- Move the admin name to the center -->
                @auth
                <li class="nav-item" style="margin-top: -15px;"> 
                    <a class="nav-link text-white" href="#"><i class="fas fa-user"></i> {{ Auth::user()->first_name }}</a>
                </li>
                @endauth
            </div>
            <div class="col-md-3">
                <!-- This column takes up the remaining space on the right -->
            </div>
        </div>
    </div>
</header>
