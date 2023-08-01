<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CategoriesController; // Import the CategoriesController
use App\Http\Controllers\CartController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/api/cart-items', [CartController::class, 'getCartItems']);
Route::delete('api/clear-cart', [CartController::class, 'clearCart']);

Route::post('/api/create-cart', [CheckoutController::class, 'createCart'])->name('create.cart');
Route::post('/checkout/checkout', [CheckoutController::class, 'checkout'])->name('checkout.checkout');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route for the CategoriesController
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // New route for saving the selected table
    Route::post('/save-selected-table', [TableController::class, 'saveSelectedTable'])->name('save-selected-table');
});

require __DIR__.'/auth.php';
