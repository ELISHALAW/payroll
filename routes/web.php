<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// 如果你只想用注册功能，也可以拆开写
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/admin/home', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::get('/admin/user', function () {
        return view('admin.user');
    })->name('admin.user.index');

    Route::get('/user/home', function () {
        return view('user.home');
    })->name('user.home');
});
