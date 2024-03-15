<header class="p-3 bg-dark text-white mb-4">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ url('posts') }}" class="nav-link px-2 text-white">Home</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @if (Auth::check())
                    <a href="{{ url('logout') }}" class="btn btn-danger me-2">Logout</a>
                @else
                    <a href="{{ url('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ url('register') }}" class="btn btn-success me-2">Register</a>
                @endif
            </div>
        </div>
    </div>
</header>
