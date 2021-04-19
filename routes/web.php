<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('root');

Route::middleware(['is.administrator'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/provider', function () {
        return view('dashboard.provider');
    })->middleware(['auth'])->name('provider');
});

Route::middleware(['is.customer'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
});


require __DIR__ . '/auth.php';
