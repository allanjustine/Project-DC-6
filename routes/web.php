<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SoldItemController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\SupplierController;
// use App\Models\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //admin permission route
    Route::middleware('can:manage-users')->group(function () {
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.admin');
        Route::get('/clients/create', [ClientController::class, 'create']);
        Route::get('/clients/view/{id}', [ClientController::class, 'view']);

        Route::get('/admin/users', [UserController::class, 'index'])->name('users.admin');
        Route::get('/admin/users/create', [UserController::class, 'create']);
        Route::post('/admin/users/create', [UserController::class, 'store']);

        Route::get('/cashiers', [UserController::class, 'cashier'])->name('cashiers');
        Route::get('/cashiers/create', [UserController::class, 'createCashier']);

        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/create', [ProductController::class, 'create']);

        Route::get('/sold-items', [SoldItemController::class, 'index'])->name('sold.items');

        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
    });

    //super visor permission route
    Route::middleware('can:manage-cashiers')->group(function () {
        Route::get('/cashiers', [UserController::class, 'cashier'])->name('cashiers');
        Route::get('/cashiers/create', [UserController::class, 'createCashier']);

        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/create', [ProductController::class, 'create']);

        Route::get('/sold-items', [SoldItemController::class, 'index'])->name('sold.items');

        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
    });

    //user permission route
    Route::middleware('can:manage-sales')->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/create', [ProductController::class, 'create']);

        Route::get('/sold-items', [SoldItemController::class, 'index'])->name('sold.items');

        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
    });
});

require __DIR__ . '/auth.php';
