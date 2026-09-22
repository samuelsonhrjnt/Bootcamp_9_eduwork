<?php

use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Homepage / Landing Page SHOP.CO)
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Daftar Produk (New Arrivals / Catalog)
Route::get('/products', function () {
    $products = [
        ['name' => 'T-shirt with Tape Details', 'price' => 120, 'rating' => '4.5/5', 'category' => 'Casual'],
        ['name' => 'Skinny Fit Jeans', 'price' => 240, 'rating' => '3.5/5', 'category' => 'Casual'],
        ['name' => 'Checkered Shirt', 'price' => 180, 'rating' => '4.5/5', 'category' => 'Formal'],
        ['name' => 'Sleeve Striped T-shirt', 'price' => 130, 'rating' => '4.5/5', 'category' => 'Casual']
    ];
    return view('products', compact('products'));
})->name('products.index');

// 3. Halaman Keranjang Belanja
Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');
