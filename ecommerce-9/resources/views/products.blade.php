@extends('layouts.app')

@section('title', 'Casual - SHOP.CO')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
        <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Casual</li>
    </ol>
</nav>

<div class="row g-4">
    <!-- Sidebar Filter (Kiri) -->
    <div class="col-lg-3">
        <div class="card border rounded-4 p-3 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0">Filters</h5>
                <span class="text-muted">⚙️</span>
            </div>

            <!-- Category List -->
            <ul class="list-unstyled mb-3 pb-3 border-bottom small text-muted d-flex flex-column gap-2">
                <li class="d-flex justify-content-between align-items-center">T-shirts <span>›</span></li>
                <li class="d-flex justify-content-between align-items-center">Shorts <span>›</span></li>
                <li class="d-flex justify-content-between align-items-center">Shirts <span>›</span></li>
                <li class="d-flex justify-content-between align-items-center">Hoodie <span>›</span></li>
                <li class="d-flex justify-content-between align-items-center">Jeans <span>›</span></li>
            </ul>

            <!-- Price Range -->
            <div class="mb-3 pb-3 border-bottom">
                <h6 class="fw-bold mb-3">Price</h6>
                <input type="range" class="form-range" min="50" max="200" id="priceRange">
                <div class="d-flex justify-content-between small fw-bold">
                    <span>$50</span>
                    <span>$200</span>
                </div>
            </div>

            <!-- Colors -->
            <div class="mb-3 pb-3 border-bottom">
                <h6 class="fw-bold mb-3">Colors</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#00c853;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#ff1744;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#ffea00;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#ff9100;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#00e5ff;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#2979ff;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#651fff;"></span>
                    <span class="rounded-circle d-inline-block border" style="width:24px; height:24px; background-color:#f50057;"></span>
                    <span class="rounded-circle d-inline-block border bg-white"></span>
                    <span class="rounded-circle d-inline-block border bg-dark"></span>
                </div>
            </div>

            <!-- Size -->
            <div class="mb-3 pb-3 border-bottom">
                <h6 class="fw-bold mb-3">Size</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2">XX-Small</span>
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2">X-Small</span>
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2">Small</span>
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2">Medium</span>
                    <span class="badge bg-dark text-white rounded-pill px-3 py-2">Large</span>
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2">X-Large</span>
                </div>
            </div>

            <!-- Dress Style -->
            <div class="mb-4">
                <h6 class="fw-bold mb-3">Dress Style</h6>
                <ul class="list-unstyled small text-muted mb-0 d-flex flex-column gap-2">
                    <li class="d-flex justify-content-between align-items-center">Casual <span>›</span></li>
                    <li class="d-flex justify-content-between align-items-center">Formal <span>›</span></li>
                    <li class="d-flex justify-content-between align-items-center">Party <span>›</span></li>
                    <li class="d-flex justify-content-between align-items-center">Gym <span>›</span></li>
                </ul>
            </div>

            <button class="btn btn-dark w-100 rounded-pill py-2">Apply Filter</button>
        </div>
    </div>

    <!-- Product Grid (Kanan) -->
    <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-black text-uppercase mb-0" style="font-weight: 900;">Casual</h3>
            <div class="small text-muted">
                Showing 1-10 of 100 Products Sort by: <span class="fw-bold text-dark">Most Popular ▾</span>
            </div>
        </div>

        <div class="row g-4 mb-5">
            @php
                $items = [
                    ['name' => 'Gradient Graphic T-shirt', 'price' => 145, 'old_price' => null, 'discount' => null, 'rating' => '3.5/5'],
                    ['name' => 'Polo with Tipping Details', 'price' => 180, 'old_price' => null, 'discount' => null, 'rating' => '4.5/5'],
                    ['name' => 'Black Striped T-shirt', 'price' => 120, 'old_price' => 150, 'discount' => '-30%', 'rating' => '5.0/5'],
                    ['name' => 'Skinny Fit Jeans', 'price' => 240, 'old_price' => 260, 'discount' => '-20%', 'rating' => '3.5/5'],
                    ['name' => 'Checkered Shirt', 'price' => 180, 'old_price' => null, 'discount' => null, 'rating' => '4.5/5'],
                    ['name' => 'Sleeve Striped T-shirt', 'price' => 130, 'old_price' => 160, 'discount' => '-30%', 'rating' => '4.5/5'],
                    ['name' => 'Vertical Striped Shirt', 'price' => 212, 'old_price' => 232, 'discount' => '-20%', 'rating' => '5.0/5'],
                    ['name' => 'Courage Graphic T-shirt', 'price' => 145, 'old_price' => null, 'discount' => null, 'rating' => '4.0/5'],
                    ['name' => 'Loose Fit Bermuda Shorts', 'price' => 80, 'old_price' => null, 'discount' => null, 'rating' => '3.0/5'],
                ];
            @endphp

            @foreach ($items as $item)
                <div class="col-6 col-md-4">
                    <div class="card h-100 border-0">
                        <img src="https://via.placeholder.com/300x300?text=Product" class="card-img-top bg-light rounded-4 mb-2" alt="{{ $item['name'] }}">
                        <div class="card-body p-0">
                            <h6 class="fw-bold text-truncate mb-1">{{ $item['name'] }}</h6>
                            <div class="text-warning small mb-1">★★★★☆ <span class="text-muted ms-1">({{ $item['rating'] }})</span></div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="fw-bold mb-0">${{ $item['price'] }}</h5>
                                @if($item['old_price'])
                                    <span class="text-muted text-decoration-line-through small">${{ $item['old_price'] }}</span>
                                    <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1 small">{{ $item['discount'] }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
            <button class="btn btn-outline-secondary btn-sm rounded-3 px-3">← Previous</button>
            <div class="d-flex gap-1 small">
                <span class="btn btn-sm btn-light active rounded-3 px-3">1</span>
                <span class="btn btn-sm text-muted px-3">2</span>
                <span class="btn btn-sm text-muted px-3">3</span>
                <span class="btn btn-sm text-muted">...</span>
                <span class="btn btn-sm text-muted px-3">8</span>
                <span class="btn btn-sm text-muted px-3">9</span>
                <span class="btn btn-sm text-muted px-3">10</span>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-3 px-3">Next →</button>
        </div>
    </div>
</div>
@endsection