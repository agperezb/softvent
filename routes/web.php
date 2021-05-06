<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('root');

Route::middleware(['auth', 'verified', 'active'])->group(function () {

    Route::middleware(['is.authorized'])->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //products
        Route::get('products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/{id}', [ProductController::class, 'edit']);
        Route::get('/products/status/{id}', [ProductController::class, 'status']);
        Route::get('/products/image/{id}', [ProductController::class, 'show_image']);
        Route::post('/products', [ProductController::class, 'store'])->name('products');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products_update');

        //providers
        Route::get('providers', [ProviderController::class, 'index'])->name('providers');
        Route::get('/providers/{id}', [ProviderController::class, 'edit']);
        Route::get('/providers/status/{id}', [ProviderController::class, 'status']);
        Route::post('/providers', [ProviderController::class, 'store'])->name('providers');
        Route::put('/providers/{id}', [ProviderController::class, 'update'])->name('providers_update');
        Route::delete('/providers/{id}', [ProviderController::class, 'destroy'])->name('providers_delete');


        Route::middleware(['is.administrator'])->group(function () {

            //commerces
            Route::get('commerces', [CommerceController::class, 'index'])->name('commerces');
            Route::get('/commerces/{id}', [CommerceController::class, 'edit']);
            Route::get('/commerces/status/{id}', [CommerceController::class, 'status']);
            Route::post('/commerces', [CommerceController::class, 'store'])->name('commerces');
            Route::put('/commerces/{id}', [CommerceController::class, 'update'])->name('commerces_update');

            // Categories
            Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
            Route::get('/categories/{id}', [CategoryController::class, 'edit']);
            Route::get('/categories/status/{id}', [CategoryController::class, 'status']);
            Route::get('/categories/image/{id}', [CategoryController::class, 'show_image']);
            Route::post('/categories', [CategoryController::class, 'store'])->name('categories');
            Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories_update');
            Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories_delete');

        });

        Route::middleware(['is.commerce-is.cashier'])->group(function () {

            Route::middleware(['is.commerce'])->group(function () {

            });

            Route::middleware(['is.cashier'])->group(function () {

            });
        });
    });
});

require __DIR__ . '/auth.php';
//route group auth, verified, active
    //is autorized ->commerce->admnistrator->cagero
        //pueden entrar al
        //dashboard
        //products
        //hacer preguntas


        //is administrator
            /*
             * crear categorias y verlas
             * crear comercios y verlos
             * configuraciones
             */
        //is commerce-is cagero
            /*
             * registrar clientes
             * registrar factura
             * registrar provedores
             */
            //is commerce
                /*
                 * Registrar cageros y gestionarlos
                 *
                 */

            //is cajero
                /*
                 * registar clientes
                 * registrar factura
                 * registrar provedores
                 */
