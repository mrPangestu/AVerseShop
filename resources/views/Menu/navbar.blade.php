<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed top-0" style="width: 100%;">
    <div class="container" style="width: 40%;">
        <a class="navbar-brand" href="#">
            <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Anggrek Bandung
        </a>
    </div>
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
            <ul class="navbar-nav">
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
        </div>
    </div>
    <div class="container justify-content-evenly" style="max-width: 40%; width:20%;">
        <i class="fa-solid fa-cart-shopping"></i>
        <button class="btn btn-sm btn-outline-secondary" type="button">Login</button>
    </div>
</nav>
