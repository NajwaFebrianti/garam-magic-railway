<?php

use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Publik (Frontend Toko)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/tata-cara-mandi', [HomeController::class, 'education'])->name('education');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');

// Keranjang Belanja
Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/keranjang/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/keranjang/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/sukses', [CheckoutController::class, 'success'])->name('checkout.success');

/*
|--------------------------------------------------------------------------
| Autentikasi (disediakan oleh Laravel Breeze)
|--------------------------------------------------------------------------
| Setelah install Breeze (`composer require laravel/breeze && php artisan
| breeze:install blade`), route login/register otomatis tersedia di
| routes/auth.php yang di-include oleh Breeze pada routes/web.php bawaan.
| Pastikan baris berikut tetap ada (biasanya sudah otomatis):
| require __DIR__.'/auth.php';
*/

/*
|--------------------------------------------------------------------------
| Dashboard Admin (dilindungi middleware auth + admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/pesanan', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/pesanan/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/pesanan/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('/pelanggan', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/pelanggan/{customer}', [CustomerController::class, 'show'])->name('customers.show');

    Route::get('/produk', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/produk/tambah', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/produk', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/produk/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/produk/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/pesan-masuk', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::patch('/pesan-masuk/{contact}/baca', [AdminContactController::class, 'markRead'])->name('contacts.markRead');
    Route::delete('/pesan-masuk/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});

require __DIR__.'/auth.php';
