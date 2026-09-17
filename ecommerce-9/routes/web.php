<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('contoh', [App\Http\Controllers\ContohController::class, 'index']);

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);

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
