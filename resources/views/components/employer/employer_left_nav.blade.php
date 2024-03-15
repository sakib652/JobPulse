<div class="page-container">
    <nav class="sidebar fixed-sidebar" style="background-color: #343a40 ; color: #ffffff; height:800px">
        <ul class="nav flex-column">
            <li class="nav-item" style="margin-top: 50px;">
                <a class="nav-link" href="{{route("employer.dashboard")}}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("jobs.post")}}">
                    <i class="fas fa-briefcase"></i> Jobs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("employer.blogs")}}">
                    <i class="fas fa-book"></i> Blogs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("plugins")}}">
                    <i class="fas fa-plug"></i> Plugins
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employer.accounts') }}">
                    <i class="fas fa-cog"></i> Accounts
                </a>
            </li>
            <li class="nav-item my-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
