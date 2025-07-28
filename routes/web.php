<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashBoardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard/post',[DashBoardController::class, 'blogGenerator'])->middleware(['auth', 'verified'])->name('blog.generator');
Route::post('/dashboard/image',[DashBoardController::class, 'imageGenerator'])->middleware(['auth', 'verified'])->name('image.generator');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
