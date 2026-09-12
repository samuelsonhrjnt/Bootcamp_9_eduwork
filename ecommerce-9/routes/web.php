<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('cart', function () {
    echo 'Cart page';
});

Route::get('checkout', function () {
    echo 'Checkout page';
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});

//post
Route::post('/contact', function () {
    // Handle the form submission
    return redirect('/contact')->with('success', 'Thank you for contacting us!');
});

//put
Route::put('/contact', function () {
    // Handle the form submission
    return redirect('/contact')->with('success', 'Thank you for contacting us!');
});

//patch
Route::patch('/contact', function () {
    // Handle the form submission
    return redirect('/contact')->with('success', 'Thank you for contacting us!');
});

//delete
Route::delete('/contact', function () {
    // Handle the form submission
    return redirect('/contact')->with('success', 'Thank you for contacting us!');
});

Route::prefix('contact')->group(function () {
    Route::get('/', function () {
        return view('contact');
    });

    Route::post('/', function () {
        // Handle the form submission
        return redirect('/contact')->with('success', 'Thank you for contacting us!');
    });

    Route::put('/', function () {
        // Handle the form submission
        return redirect('/contact')->with('success', 'Thank you for contacting us!');
    });

    Route::patch('/', function () {
        // Handle the form submission
        return redirect('/contact')->with('success', 'Thank you for contacting us!');
    });

    Route::delete('/', function () {
        // Handle the form submission
        return redirect('/contact')->with('success', 'Thank you for contacting us!');
    });
});

Route::middleware('throttle:5,1')->group(function () {
    Route::get('/products', function () {
        echo 'Product page';
    });
});
