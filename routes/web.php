<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DiaryController::class, 'index']);

Route::get('/diaries/create', [DiaryController::class, 'create']);

Route::get('/diaries/{diary}', [DiaryController::class, 'show']);

Route::get('/diaries/{diary}/edit', [DiaryController::class, 'edit']);

Route::put('/diaries/{diary}', [DiaryController::class, 'update']);

Route::post('/diaries', [DiaryController::class, 'add']);

Route::delete('/diaries/{diary}', [DiaryController::class, 'delete']);


