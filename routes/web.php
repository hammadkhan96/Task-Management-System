<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
        Route::resource('task', App\Http\Controllers\TaskController::class);
        Route::get('/', [App\Http\Controllers\TaskController::class, 'index']);
});
