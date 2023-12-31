<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ExpressionController;
use App\Http\Controllers\DiaryLikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExpressionLikeController;
use App\Http\Controllers\FollowUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyRecordController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ChatController;
use App\Events\MessageAdded;
use Symfony\Component\EventDispatcher\Event;


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

Route::post('diaries/home_diary/{diary}/translation', [TranslationController::class, 'home_translation'])->name('home_translation');
Route::post('diaries/index/{diary}/translation', [TranslationController::class, 'index_translation'])->name('index_translation');

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

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
    Route::get('/profile/{user}', 'show')->name('profile.show');
    Route::get('/profile/{user}/map', 'map')->name('profile.map');
});

Route::controller(MyRecordController::class)->middleware('auth')->group(function() {
    Route::get('/record', 'show')->name('record');
});

Route::controller(ChatController::class)->middleware('auth')->group(function() {
    Route::get('/start-chat/{user}', 'startOrShowChat')->name('start.chat');
    Route::get('/chat/{conversation}', 'showChat')->name('chat.show');
    Route::post('/chat/{conversation}', 'sendMessage')->name('sendMessage');
});

require __DIR__.'/auth.php';