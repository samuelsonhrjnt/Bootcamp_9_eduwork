@extends('layouts.app')

@section('title', 'Your Cart - SHOP.CO')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
        <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Cart</li>
    </ol>
</nav>

<h2 class="fw-black text-uppercase mb-4" style="font-weight: 900;">YOUR CART</h2>

<div class="row g-4 mb-5">
    <!-- Item List (Kiri) -->
    <div class="col-lg-7">
        <div class="card border rounded-4 p-3 shadow-sm d-flex flex-column gap-3">
            
            <!-- Item 1 -->
            <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
                <img src="https://via.placeholder.com/100" class="rounded-3 bg-light" alt="Gradient Graphic T-shirt" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6 class="fw-bold mb-1">Gradient Graphic T-shirt</h6>
                        <button class="btn btn-link text-danger p-0 border-0">🗑️</button>
                    </div>
                    <p class="mb-0 text-muted small">Size: <span class="text-dark">Large</span></p>
                    <p class="mb-2 text-muted small">Color: <span class="text-dark">White</span></p>
                    <h5 class="fw-bold mb-0">${{ 145 }}</h5>
                </div>
                <div class="bg-light rounded-pill px-3 py-1 d-flex align-items-center gap-3">
                    <button class="btn btn-link text-dark p-0 text-decoration-none fw-bold">-</button>
                    <span class="fw-bold small">1</span>
                    <button class="btn btn-link text-dark p-0 text-decoration-none fw-bold">+</button>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
                <img src="https://via.placeholder.com/100" class="rounded-3 bg-light" alt="Checkered Shirt" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6 class="fw-bold mb-1">Checkered Shirt</h6>
                        <button class="btn btn-link text-danger p-0 border-0">🗑️</button>
                    </div>
                    <p class="mb-0 text-muted small">Size: <span class="text-dark">Medium</span></p>
                    <p class="mb-2 text-muted small">Color: <span class="text-dark">Red</span></p>
                    <h5 class="fw-bold mb-0">${{ 180 }}</h5>
                </div>
                <div class="bg-light rounded-pill px-3 py-1 d-flex align-items-center gap-3">
                    <button class="btn btn-link text-dark p-0 text-decoration-none fw-bold">-</button>
                    <span class="fw-bold small">1</span>
                    <button class="btn btn-link text-dark p-0 text-decoration-none fw-bold">+</button>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="d-flex align-items-center gap-3">
                <img src="https://via.placeholder.com/100" class="rounded-3 bg-light" alt="Skinny Fit Jeans" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6 class="fw-bold mb-1">Skinny Fit Jeans</h6>
                        <button class="btn btn-link text-danger p-0 border-0">🗑️</button>
                    </div>
                    <p class="mb-0 text-muted small">Size: <span class="text-dark">Large</span></p>
                    <p class="mb-2 text-muted small">Color: <span class="text-dark">Blue</span></p>
                    <h5 class="fw-bold mb-0">${{ 240 }}</h5>
                </div>
                <div class="bg-light rounded-pill px-3 py-1 d-flex align-items-center gap-3">
                    <button class="btn btn-link text-dark p-0 text-decoration-none fw-bold">-</button>
                    <span class="fw-bold small">1</span>
                    <button class="btn btn-link text-dark p-0 text-decoration-none fw-bold">+</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Order Summary (Kanan) -->
    <div class="col-lg-5">
        <div class="card border rounded-4 p-4 shadow-sm">
            <h5 class="fw-bold mb-4">Order Summary</h5>

            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Subtotal</span>
                <span class="fw-bold">$565</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Discount (-20%)</span>
                <span class="fw-bold text-danger">-$113</span>
            </div>
            <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                <span class="text-muted">Delivery Fee</span>
                <span class="fw-bold">$15</span>
            </div>
            <div class="d-flex justify-content-between mb-4 fs-5">
                <span>Total</span>
                <span class="fw-bold">$467</span>
            </div>

            <!-- Promo Code Form -->
            <div class="d-flex gap-2 mb-3">
                <div class="input-group bg-light rounded-pill px-3 py-1">
                    <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">🏷️</span>
                    <input type="text" class="form-control bg-transparent border-0 shadow-none p-0 small" placeholder="Add promo code">
                </div>
                <button class="btn btn-dark rounded-pill px-4">Apply</button>
            </div>

            <button class="btn btn-dark w-100 rounded-pill py-3 fw-bold">
                Go to Checkout →
            </button>
        </div>
    </div>
</div>
@endsection