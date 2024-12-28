<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed top-0 w-100">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="/img/logo.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
            Anggrek Bandung
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto"> <!-- Center the nav items -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('main') ? 'active' : '' }}" href="{{ route('main') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}" href="{{ route('product') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('Contact') ? 'active' : '' }}" href="{{ route('Contact') }}">Kontak</a>
                </li>
            </ul>

            <!-- Shopping Cart and Login -->
            <div class="d-flex align-items-center">
                <a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping me-3"></i></a>

                @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST" class="my-0 mx-1">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                </form>
                @else
                    <a class="btn btn-sm btn-outline-dark" type="button"  href="{{ route('login') }}">Login</a>
                @endif
                
            </div>

        </div>
    </div>
</nav>
