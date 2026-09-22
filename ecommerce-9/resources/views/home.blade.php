@extends('layouts.app')

@section('title', 'SHOP.CO - Find Clothes That Matches Your Style')

@section('content')
<!-- Hero Section -->
<div class="row align-items-center my-4 py-5 px-4 bg-light rounded-4">
    <div class="col-md-6">
        <h1 class="display-4 fw-black text-uppercase mb-3" style="font-weight: 900; letter-spacing: -1px;">
            Find Clothes That Matches Your Style
        </h1>
        <p class="text-muted mb-4">
            Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
        </p>
        <a href="{{ route('products.index') }}" class="btn btn-dark rounded-pill px-5 py-3 fw-medium mb-4">
            Shop Now
        </a>
        <div class="d-flex gap-4 mt-2">
            <div>
                <h3 class="fw-bold mb-0">200+</h3>
                <small class="text-muted">International Brands</small>
            </div>
            <div class="border-start ps-4">
                <h3 class="fw-bold mb-0">2,000+</h3>
                <small class="text-muted">High-Quality Products</small>
            </div>
            <div class="border-start ps-4">
                <h3 class="fw-bold mb-0">30,000+</h3>
                <small class="text-muted">Happy Customers</small>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-center mt-4 mt-md-0">
        <img src="https://via.placeholder.com/500x500?text=Hero+Image" class="img-fluid rounded-4" alt="Hero Banner">
    </div>
</div>

<!-- Brand Banner -->
<div class="bg-dark text-white py-4 px-3 rounded-4 mb-5 d-flex justify-content-around align-items-center flex-wrap gap-3">
    <span class="fs-4 fw-bold text-uppercase">VERSACE</span>
    <span class="fs-4 fw-bold text-uppercase">ZARA</span>
    <span class="fs-4 fw-bold text-uppercase">GUCCI</span>
    <span class="fs-4 fw-bold text-uppercase">PRADA</span>
    <span class="fs-4 fw-bold text-uppercase">Calvin Klein</span>
</div>

<!-- New Arrivals Section -->
<section class="mb-5">
    <h2 class="text-center fw-black text-uppercase mb-4" style="font-weight: 900;">NEW ARRIVALS</h2>
    <div class="row g-4">
        @foreach ([
            ['name' => 'T-shirt with Tape Details', 'price' => 120, 'rating' => '4.5/5'],
            ['name' => 'Skinny Fit Jeans', 'price' => 240, 'rating' => '3.5/5'],
            ['name' => 'Checkered Shirt', 'price' => 180, 'rating' => '4.5/5'],
            ['name' => 'Sleeve Striped T-shirt', 'price' => 130, 'rating' => '4.5/5']
        ] as $item)
            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <img src="https://via.placeholder.com/300x300?text=Product" class="card-img-top bg-light rounded-top-4" alt="{{ $item['name'] }}">
                    <div class="card-body">
                        <h6 class="fw-bold text-truncate mb-1">{{ $item['name'] }}</h6>
                        <div class="text-warning small mb-1">★★★★☆ <span class="text-muted ms-1">({{ $item['rating'] }})</span></div>
                        <h5 class="fw-bold mb-0">${{ $item['price'] }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-outline-dark rounded-pill px-5">View All</a>
    </div>
</section>

<hr class="my-5">

<!-- Top Selling Section -->
<section class="mb-5">
    <h2 class="text-center fw-black text-uppercase mb-4" style="font-weight: 900;">TOP SELLING</h2>
    <div class="row g-4">
        @foreach ([
            ['name' => 'Vertical Striped Shirt', 'price' => 212, 'rating' => '5.0/5'],
            ['name' => 'Courage Graphic T-shirt', 'price' => 145, 'rating' => '4.0/5'],
            ['name' => 'Loose Fit Bermuda Shorts', 'price' => 80, 'rating' => '3.0/5'],
            ['name' => 'Faded Skinny Jeans', 'price' => 210, 'rating' => '4.5/5']
        ] as $item)
            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <img src="https://via.placeholder.com/300x300?text=Product" class="card-img-top bg-light rounded-top-4" alt="{{ $item['name'] }}">
                    <div class="card-body">
                        <h6 class="fw-bold text-truncate mb-1">{{ $item['name'] }}</h6>
                        <div class="text-warning small mb-1">★★★★★ <span class="text-muted ms-1">({{ $item['rating'] }})</span></div>
                        <h5 class="fw-bold mb-0">${{ $item['price'] }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-outline-dark rounded-pill px-5">View All</a>
    </div>
</section>

<!-- Browse by Dress Style -->
<section class="bg-light p-4 p-md-5 rounded-5 mb-5">
    <h2 class="text-center fw-black text-uppercase mb-4" style="font-weight: 900;">BROWSE BY DRESS STYLE</h2>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card bg-white border-0 rounded-4 overflow-hidden shadow-sm">
                <div class="card-body p-4 position-relative" style="min-height: 180px;">
                    <h4 class="fw-bold">Casual</h4>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card bg-white border-0 rounded-4 overflow-hidden shadow-sm">
                <div class="card-body p-4 position-relative" style="min-height: 180px;">
                    <h4 class="fw-bold">Formal</h4>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card bg-white border-0 rounded-4 overflow-hidden shadow-sm">
                <div class="card-body p-4 position-relative" style="min-height: 180px;">
                    <h4 class="fw-bold">Party</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 rounded-4 overflow-hidden shadow-sm">
                <div class="card-body p-4 position-relative" style="min-height: 180px;">
                    <h4 class="fw-bold">Gym</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter / Stay Updated -->
<div class="bg-dark text-white p-4 p-md-5 rounded-4 mb-5">
    <div class="row align-items-center g-3">
        <!-- Judul Kiri -->
        <div class="col-md-6 col-lg-7">
            <h2 class="fw-black text-uppercase mb-0" style="font-weight: 900; letter-spacing: -0.5px;">
                STAY UP TO DATE ABOUT OUR LATEST OFFERS
            </h2>
        </div>
        
        <!-- Form Kanan (Dibatasi dengan w-100 agar tidak keluar baris) -->
        <div class="col-md-6 col-lg-5">
            <form class="d-flex flex-column gap-2 w-100">
                <input type="email" class="form-control rounded-pill py-2 px-4 border-0 w-100" placeholder="Enter your email address">
                <button class="btn btn-light rounded-pill py-2 fw-medium text-dark w-100" type="button">Subscribe to Newsletter</button>
            </form>
        </div>
    </div>
</div>
@endsection