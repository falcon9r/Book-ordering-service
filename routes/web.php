<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::middleware('auth')->group(function (){
    Route::view('/email/verify', 'auth.verify-email')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});