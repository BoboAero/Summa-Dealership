<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('repairs', RepairController::class);
    Route::resource('cars', CarController::class);
    Route::resource('parts', PartController::class);

    Route::get('/dashboard/users/', [UserController::class, 'index'])->name('users.index');
    Route::get("/dashboard/users/create", [UserController::class, 'create'])->name('users.create');
    Route::get("/dashboard/users/{user}/edit", [UserController::class, 'edit'])->name('users.edit');
    Route::post("/dashboard/users/store", [UserController::class, 'store'])->name('users.store');
    Route::delete("/dashboard/users/{user}/destroy", [UserController::class, 'destroy'])->name('users.destroy');
    Route::put("/dashboard/users/{user}/update", [UserController::class, 'update'])->name('users.update');
});

require __DIR__.'/auth.php';
