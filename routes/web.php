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

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');



Route::get('/', function () {
    return view('welcome');
});
