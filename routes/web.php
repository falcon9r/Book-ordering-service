<?php

use Illuminate\Http\Request;
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

Route::get('/' , [\App\Http\Controllers\Landing\HomeController::class , 'welcome'])->name('home');
Route::get('/home' , [\App\Http\Controllers\Landing\HomeController::class , 'welcome']);

Route::middleware('guest')->group(function (){
    Route::post('reset-password' , [\App\Http\Controllers\Auth\PasswordResetController::class , 'reset_password'])->name('password.update');
    Route::get('reset-password/{token}' , [\App\Http\Controllers\Auth\PasswordResetController::class , 'reset_password_view'])->name('password.reset');
    Route::view('forgot-password' , 'auth.forgot-password')->name('password.request');
    Route::post('forgot-password' , [\App\Http\Controllers\Auth\PasswordResetController::class , 'forgot_password'])->name('password.email');
});
Route::middleware('auth')->group(function (){
    Route::view('email/verify', 'auth.verify-email')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerificationController::class , 'verify'])->middleware('signed')->name('verification.verify');
    Route::get('/email/verification-notification', [\App\Http\Controllers\Auth\VerificationController::class, 'notification'])->middleware('throttle:6,1')->name('verification.send');
    Route::middleware('verified')->group(function (){
          Route::get('home' , function (){})->name('home');
          Route::get('profile' , [\App\Http\Controllers\ProfileController::class , 'profile'])->name('profile');
          Route::get('settings' , [\App\Http\Controllers\ProfileController::class , 'settings'])->name('settings');
          Route::put('settings' , [\App\Http\Controllers\ProfileController::class , 'update'])->name('settings.update');
          Route::post('settings-photo' , [\App\Http\Controllers\ProfileController::class , 'settings_photo'])->name("settings.photo");
          Route::resource('books' , \App\Http\Controllers\User\BookController::class , ['names' => 'user.books']);
          Route::patch('books/{book}/upload', [\App\Http\Controllers\User\BookController::class , 'upload'])->name('user.books.photo-upload');
          Route::get('/dashboard' , function(){})->name('dashboard');
          Route::prefix('common')->group(function (){
             Route::resource('authors' , \App\Http\Controllers\Common\AuthorsController::class , ['names' => 'common.authors']);
             Route::resource('categories' , \App\Http\Controllers\Common\CategoryController::class , ['names' => 'common.categories']);
          });
    });
});