<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'checkUser'])->name('checkUser');


Route::get('/category/{id}', [DashboardController::class, 'byCategories'])->name('products.category');
Route::get('/search', [DashboardController::class, 'search'])->name('products.search');

Route::prefix('cart')->group(function () {
    Route::post('add', [CartController::class, 'add'])->name('product.add');
    Route::post('increase/{id}', [CartController::class, 'increase']);
    Route::post('decrease/{id}', [CartController::class, 'decrease']);
});

Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminDashboard', [AdminDashboardController::class, 'index'])
        ->name('adminDashboard');
    Route::post('/adminDashboard/addProduct', [AdminDashboardController::class, 'addProduct'])
        ->name('admin.addProduct');
});

