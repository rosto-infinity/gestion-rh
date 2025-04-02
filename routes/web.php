<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admingsfzsttylmszrteg'])->group(function () {
 
    Route::get('admingsfzsttylmszrteg/dashboard', [HomeController::class, 'index']);
 
    Route::get('/admingsfzsttylmszrteg/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admingsfzsttylmszrteg/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admingsfzsttylmszrteg/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/admingsfzsttylmszrteg/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admingsfzsttylmszrteg/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::get('/admingsfzsttylmszrteg/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
});
 
require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);