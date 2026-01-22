<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/init-toko', function () {
    try {
        Artisan::call('migrate:fresh', ['--force' => true]);
        $migrateLog = Artisan::output();

        Artisan::call('db:seed', ['--force' => true]);
        $seedLog = Artisan::output();

        $count = Product::count();

        return "
            <div style='font-family: sans-serif; padding: 20px;'>
                <h3 style='color: green;'>Proses Selesai!/h3>
                <hr>
                <b>Status Migrasi:</b> <pre style='background: #eee; padding: 10px;'>$migrateLog</pre>
                <b>Status Seeder:</b> <pre style='background: #eee; padding: 10px;'>$seedLog</pre>
                <b>Jumlah Produk yang Berhasil Masuk:</b> <span style='font-size: 20px; color: blue;'>$count</span>
                <br><br>
                <a href='/'>Lihat Website</a>
            </div>
        ";
    } catch (\Exception $e) {
        return "Gagal Total: " . $e->getMessage();
    }
});

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
