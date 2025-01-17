<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

// Customer Routes
Route::get('customers', [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('customers.index');
Route::get('customers/create', [CustomerController::class, 'create'])->middleware(['auth', 'verified'])->name('customers.create');
Route::post('customers/create', [CustomerController::class, 'store']);
Route::get('customers/{id}/show', [CustomerController::class, 'show'])->middleware(['auth', 'verified'])->name('customers.show');
Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->middleware(['auth', 'verified'])->name('customers.edit');
Route::put('customers/{id}/edit', [CustomerController::class, 'update'])->middleware(['auth', 'verified'])->name('customers.update');
Route::get('customers/{id}/delete', [CustomerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('customers.delete');

// Default routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';