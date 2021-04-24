<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('root');

Route::middleware(['auth', 'verified', 'active'])->group(function () {

    Route::middleware(['is.authorized'])->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::middleware(['is.administrator'])->group(function () {

            Route::get('/provider', function () {
                return view('dashboard.providers');
            })->name('provider');

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
