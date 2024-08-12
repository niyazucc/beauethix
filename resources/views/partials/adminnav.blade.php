
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="/dashboard">Beauethix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->userid }} </h5><!-- Display the staff's name if logged in -->
                        </div>
                        <a class="dropdown-item" href=""><i class="fas fa-user mr-2"></i>Account</a>
                        <a href="{{ route('customer.logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/dashboard"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product')}}"><i class="fa fa-fw fa-book"></i>Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.orders')}}"><i class="fas fa-fw fa-list-alt"></i>Order</a>
                        </li>
                    </ul>
                </div>
        
        </nav>
    </div>
</div>