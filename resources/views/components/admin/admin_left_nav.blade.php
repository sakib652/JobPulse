<div class="page-container">
    <nav class="sidebar fixed-sidebar" style="background-color: #343a40; color: #ffffff; height:900px">
        <ul class="nav flex-column">
            <li class="nav-item" style="margin-top: 50px;">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('companies') }}">
                    <i class="fas fa-building"></i> Companies
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.jobs') }}">
                    <i class="fas fa-briefcase"></i> Jobs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.employees') }}">
                    <i class="fas fa-user"></i> Employees
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="position: relative;" id="blogsLink">
                    <i class="fas fa-blog"></i> Blogs
                    <i class="fas fa-chevron-right"></i>
                </a>
                <!-- Sublist for Blogs -->
                <ul class="nav flex-column pl-3" style="display: none;" id="blogsSublist">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.categories') }}">
                            <i class="fas fa-list"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}">
                            <i class="fas fa-newspaper"></i> Posts
                        </a>
                    </li>
                </ul>
                <!-- End of Sublist -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="position: relative;" id="pagesLink">
                    <i class="fas fa-book"></i> Pages
                    <i class="fas fa-chevron-right"></i>
                </a>
                <!-- Sublist for Pages -->
                <ul class="nav flex-column pl-3" style="display: none;" id="pagesSublist">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.about') }}">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.contact') }}">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
                <!-- End of Sublist -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.plugins') }}">
                    <i class="fas fa-plug"></i> Plugins
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.accounts') }}">
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

    <script>
        document.querySelector('#blogsLink').addEventListener('click', function() {
            var sublist = document.getElementById('blogsSublist');
            sublist.style.display = (sublist.style.display === 'none') ? 'block' : 'none';
        });

        document.querySelector('#pagesLink').addEventListener('click', function() {
            var sublist = document.getElementById('pagesSublist');
            sublist.style.display = (sublist.style.display === 'none') ? 'block' : 'none';
        });
    </script>
</div>