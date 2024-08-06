<!-- Navbar Start -->
<div class="container-fluid sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <a href="{{ url('/') }}" class="navbar-brand">
                <h2 class="text-white">Hairnic</h2>
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ url('/product') }}" class="nav-item nav-link">Products</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Shop Now</a>
                        <div class="dropdown-menu bg-light mt-2">
                            @if(Auth::check())

                            <a href="{{ route('profile.edit') }}" class="dropdown-item">My Profile</a>
                            <!-- Show Logout button or User Profile link if authenticated -->
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                            @else
                            <!-- Show Login button if not authenticated -->
                            <a href="{{ url('/login') }}" class="dropdown-item">Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->