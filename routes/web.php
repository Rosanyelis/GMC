<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MembershipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /** ROUTE USERS */
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{id}/edit-user', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}/update-user', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{id}/delete-user', [UserController::class, 'destroy'])->name('user.destroy');

    /** ROUTE CATEGORIES */
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/store-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit-category', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/{id}/update-category', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}/delete-category', [CategoryController::class, 'destroy'])->name('category.destroy');

    /** ROUTE MEMBERSHIPS */
    Route::get('/memberships', [MembershipController::class, 'index'])->name('membership.index');
    Route::get('/memberships/create', [MembershipController::class, 'create'])->name('membership.create');
    Route::post('/memberships/store-membership', [MembershipController::class, 'store'])->name('membership.store');
    Route::get('/memberships/{id}/edit-membership', [MembershipController::class, 'edit'])->name('membership.edit');
    Route::post('/memberships/{id}/update-membership', [MembershipController::class, 'update'])->name('membership.update');
    Route::delete('/memberships/{id}/delete-membership', [MembershipController::class, 'destroy'])->name('membership.destroy');

    /** ROUTE PRODUCTS */
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products/store-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit-product', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/{id}/update-product', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}/delete-product', [ProductController::class, 'destroy'])->name('product.destroy');

    /** ROUTE ORDERS */
    // Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    // Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
    // Route::post('/orders/store-order', [OrderController::class, 'store'])->name('order.store');
    // Route::get('/orders/{id}/edit-order', [OrderController::class, 'edit'])->name('order.edit');
    // Route::post('/orders/{id}/update-order', [OrderController::class, 'update'])->name('order.update');
    // Route::delete('/orders/{id}/delete-order', [OrderController::class, 'destroy'])->name('order.destroy');

    /** ROUTE CLIENTS */
    Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/clients/store-client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/clients/{id}/edit-client', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/clients/{id}/update-client', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/clients/{id}/delete-client', [ClientController::class, 'destroy'])->name('client.destroy');


});

require __DIR__.'/auth.php';



