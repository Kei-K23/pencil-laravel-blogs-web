<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// blogs routes
Route::group([], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs');
    Route::get('/create', [BlogController::class, 'create'])->name('blogs.create')->middleware(['auth', 'verified']);
    Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit')->middleware(['auth', 'verified']);
    Route::put('/{blog}update', [BlogController::class, 'update'])->name('blogs.update')->middleware(['auth', 'verified']);
    Route::delete('/{blog}/delete', [BlogController::class, 'destroy'])->name('blogs.destroy')->middleware(['auth', 'verified']);
    Route::post('/store', [BlogController::class, 'store'])->name('blogs.store')->middleware(['auth', 'verified']);
    Route::get('/{blog}', [BlogController::class, 'show'])->where('blog', '[0-9]+');
    Route::get('/{blog}/like', [BlogController::class, 'like'])->name('blogs.like')->middleware(['auth', 'verified']);
});

// command routes
Route::group([], function () {
    Route::post('/commands', [CommandController::class, 'store'])->name('commands.store')->middleware([
        'auth', 'verified'
    ]);
    Route::put('/commands/{command}', [CommandController::class, 'update'])->name('commands.update')->middleware([
        'auth', 'verified'
    ]);
    Route::delete('/commands/{command}', [CommandController::class, 'destroy'])->name('commands.destroy')->middleware([
        'auth', 'verified'
    ]);
});


// dashboard route for auth user
Route::get('/dashboard', [BlogController::class, 'showLoginUserBlogs'])->middleware(['auth', 'verified'])->name('dashboard');


Route::group([], function () {
    Route::get('/users/{user}',  [UserController::class, 'showGuestView']);
});


// profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
