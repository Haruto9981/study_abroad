<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ExpressionController;
use App\Http\Controllers\DiaryLikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExpressionLikeController;
use App\Http\Controllers\FollowUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DiaryController::class)->middleware(['auth'])->group(function(){
    Route::get('/diaries/home_diary', 'home_diary')->name('home_diary');
    Route::get('/diaries/index', 'index')->name('index');
    Route::post('/diaries', 'add')->name('add');
    Route::get('/diaries/create', 'create')->name('create');
    Route::get('/diaries/index/{diary}', 'show')->name('show');
    Route::get('/diaries/home_diary/{diary}', 'homeShow')->name('homeShow');
    Route::put('/diaries/{diary}', 'update')->name('update');
    Route::delete('/diaries/{diary}', 'delete')->name('delete');
    Route::get('/diaries/{diary}/edit', 'edit')->name('edit');
});

Route::controller(ExpressionController::class)->middleware(['auth'])->group(function(){
    Route::get('/expressions/home_expression', 'home_expression')->name('home_expression');
    Route::get('/expressions/index', 'index')->name('index_2');
    Route::post('/expressions', 'add')->name('add');
    Route::get('/expressions/create', 'create')->name('create');
    Route::put('/expressions/{expression}', 'update')->name('update');
    Route::delete('/expressions/{expression}', 'delete')->name('delete');
    Route::get('/expressions/{expression}/edit', 'edit')->name('edit');
});

Route::controller(DiaryLikeController::class)->middleware(['auth'])->group(function(){
    Route::post('diaries/{diary}/likes', 'store')->name('diary_likes');
    Route::post('diaries/{diary}/unlikes', 'destroy')->name('diary_unlikes');
});

Route::controller(ExpressionLikeController::class)->middleware(['auth'])->group(function(){
    Route::post('expressions/{expression}/likes', 'store')->name('expression_likes');
    Route::post('expressions/{expression}/unlikes', 'destroy')->name('expression_unlikes');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/diaries/{diary}/comment', 'store')->name('store');
});


Route::controller(FollowUserController::class)->middleware(['auth'])->group(function(){
    Route::get('/follows/index_following', 'index_following')->name('index_following');
    Route::get('follows/index_follower', 'index_follower')->name('index_follower');
    Route::post('/follows/{user}/following', 'store')->name('following');
    Route::post('/follows/{user}/unfollowing', 'destroy')->name('unfollowing');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/calendar', [ScheduleController::class, 'show'])->name('calendar');
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
Route::delete('/schedule-delete/{id}', [ScheduleController::class, 'scheduleDelete'])->name('schedule-delete');


require __DIR__.'/auth.php';