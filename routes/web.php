<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/init-toko', function () {
    try {
        Artisan::call('migrate:fresh');
        $migrateLog = Artisan::output();

        Artisan::call('db:seed');
        $seedLog = Artisan::output();

        $count = Product::count();

        return "
            <h3>Status Migrasi:</h3> <pre>$migrateLog</pre>
            <h3>Status Seeder:</h3> <pre>$seedLog</pre>
            <h3>Jumlah Produk di DB:</h3> <b>$count</b> <br><br>
            <a href='/'>Kembali ke Beranda</a>
        ";
    } catch (\Exception $e) {
        return "Terjadi Error: " . $e->getMessage();
    }
});
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
