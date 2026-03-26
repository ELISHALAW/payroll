<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\EmploymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// 如果你只想用注册功能，也可以拆开写
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('companies', CompanyController::class);

        Route::get('/home', function () {
            return view('admin.home');
        })->name('admin.home');
    });


    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('user.profile');
    Route::get('/employee/{id}', [ProfileController::class, 'showEmployee'])->name('user.employment');
    Route::get('/compensation/{id}', [ProfileController::class, 'showCompensation'])->name('user.compensation');
    Route::get('/organizationalEmployee/{id}', [ProfileController::class, 'showOrganizationalHistory'])->name('user.organizational');
    Route::get('/leave/{id}', [ProfileController::class, 'showLeave'])->name('user.leave');
    Route::get('/user/home', function () {
        return view('user.home');
    })->name('user.home');

    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('user.update');

    Route::post('/profile/update-email/{id}', [UserController::class, 'updateEmail'])->name('user.updateEmail');

    Route::post('/profile/update-address/{id}', [ProfileController::class, 'updateAddress'])->name('user.updateAddress');

    Route::post('/profile/update-correspondence-address/{id}', [ProfileController::class, 'updateCorrespondenceAddress'])->name('user.updateCorrespondenceAddress');

    Route::post('/profile/update-emergency-contact/{id}', [ProfileController::class, 'updateEmergencyContact'])->name('user.updateEmergencyContact');

    Route::post('/profile/updateEmployment/{id}', [ProfileController::class, 'updateEmploymentInfo'])->name('user.updateEmploymentInfo');

    Route::post('/profile/updateEmploymentHistory/{id}', [ProfileController::class, 'createOrganizationalDetails'])->name('user.createOrganizationalDetails');

    Route::post('/profile/update-career-progression/{id}', [ProfileController::class, 'createCareerProgression'])->name('user.createCareerProgression');

    Route::post('/profile/updateBankDetail/{id}', [ProfileController::class, 'updateBankDetail'])->name('user.updateBankDetail');

    Route::post('/profile/details/{id}', [ProfileController::class, 'updateCompensationDetails'])->name('user.details');

    Route::post('/statutory/{id}', [ProfileController::class, 'updateStatutory'])->name('user.updateStatutory');
});
