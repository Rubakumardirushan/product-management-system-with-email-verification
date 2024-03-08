<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;
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
    return view('auth.register');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/create', [ProductController::class, 'ProductUploadForm'])->name('products.create');
Route::post('/products', [ProductController::class, 'ProductUploader'])->name('products.store');
Route::get('/View', [ProductController::class, 'showproduct'])->name('products.show');
Route::get('/update/{product}', [ProductController::class, 'updateview'])->name('products.updateview');
Route::put('/update/{product}', [ProductController::class, 'updated'])->name('products.update');
Route::get('/delete', [ProductController::class, 'deleteview'])->name('products.delete');
Route::post('/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
