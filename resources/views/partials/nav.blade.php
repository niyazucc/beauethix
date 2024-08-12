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
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('product') }}" class="nav-item nav-link {{ Request::is('product') ? 'active' : '' }}">Products</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if(Auth::check())
                                {{ Auth::user()->userid}} <!-- Display the user's ID if authenticated -->
                            @else
                                Shop Now <!-- Display "Shop Now" if not authenticated -->
                            @endif
                        </a>
                        <div class="dropdown-menu bg-light mt-2">
                            @if(Auth::check())
                                <a href="{{ route('cart.index') }}" class="dropdown-item">My Cart</a>
                                <a href="{{ route('customer.profile.edit') }}" class="dropdown-item">My Purchase</a>
                                <a href="{{ route('customer.profile.edit') }}" class="dropdown-item">My Profile</a>
                                <!-- Show Logout button if authenticated -->
                                <a href="{{ route('customer.logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none">
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