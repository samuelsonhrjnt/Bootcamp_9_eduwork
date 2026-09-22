<!-- Top Promo Banner -->
<div class="bg-dark text-white text-center py-2 px-3 small d-flex justify-content-center align-items-center position-relative">
    <span>Sign up and get 20% off to your first order. <a href="#" class="text-white fw-bold text-decoration-underline">Sign Up Now</a></span>
    <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3 d-none d-md-block" style="transform: scale(0.7);" aria-label="Close"></button>
</div>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 border-bottom sticky-top">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand fw-black text-uppercase fs-3 me-4" href="{{ route('home') }}" style="font-weight: 900; letter-spacing: -1px;">
            SHOP.CO
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarShop">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links & Search -->
        <div class="collapse navbar-collapse" id="navbarShop">
            <ul class="navbar-nav me-3 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-normal" href="#" role="button" data-bs-toggle="dropdown">
                        Shop
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm">
                        <li><a class="dropdown-menu-item dropdown-item" href="{{ route('products.index') }}">Men's Clothes</a></li>
                        <li><a class="dropdown-menu-item dropdown-item" href="{{ route('products.index') }}">Women's Clothes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-normal" href="#">On Sale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-normal" href="{{ route('products.index') }}">New Arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-normal" href="#">Brands</a>
                </li>
            </ul>

            <!-- Search Bar -->
            <form class="d-flex flex-grow-1 my-2 my-lg-0 me-lg-4" role="search">
                <div class="input-group bg-light rounded-pill px-3 py-1 w-100">
                    <span class="input-group-text bg-transparent border-0 text-muted pe-1">
                        🔍
                    </span>
                    <input class="form-control bg-transparent border-0 shadow-none ps-2" type="search" placeholder="Search for products..." aria-label="Search">
                </div>
            </form>

            <!-- User Action Icons -->
            <div class="d-flex align-items-center gap-3 mt-2 mt-lg-0">
                <a href="{{ route('cart.index') }}" class="text-dark text-decoration-none position-relative fs-5">
                    🛒
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                        2
                    </span>
                </a>
                <a href="#" class="text-dark text-decoration-none fs-5">
                    👤
                </a>
            </div>
        </div>
    </div>
</nav>