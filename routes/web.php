<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(DiaryController::class)->middleware(['auth'])->group(function(){
    Route::get('/diaries/home', 'home')->name('home');
    Route::get('/diaries/index', 'index')->name('index');
    Route::post('/diaries', 'add')->name('add');
    Route::get('/diaries/create', 'create')->name('create');
    Route::get('/diaries/{diary}', 'show')->name('show');
    Route::put('/diaries/{diary}', 'update')->name('update');
    Route::delete('/diaries/{diary}', 'delete')->name('delete');
    Route::get('/diaries/{diary}/edit', 'edit')->name('edit');
});

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';