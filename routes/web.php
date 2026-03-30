<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    // Admin Group
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('companies', CompanyController::class);
        Route::get('/home', fn() => view('admin.home'))->name('home');
    });

    // User Profile / Payroll Views
    Route::get('/user/home', fn() => view('user.home'))->name('user.home');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('user.profile');
    Route::get('/employee/{id}', [ProfileController::class, 'showEmployee'])->name('user.employment');
    Route::get('/compensation/{id}', [ProfileController::class, 'showCompensation'])->name('user.compensation');
    Route::get('/organizationalEmployee/{id}', [ProfileController::class, 'showOrganizationalHistory'])->name('user.organizational');
    Route::get('/leave/{id}', [ProfileController::class, 'showLeave'])->name('user.leave');
    Route::get('/family/{id}', [ProfileController::class, 'showFamily'])->name('user.family');
    // Profile & Statutory Updates
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

    // LHDN / Statutory Updates
    Route::post('/statutory/{id}', [ProfileController::class, 'updateStatutory'])->name('user.updateStatutory');
    Route::post('/incomeTax/{id}', [ProfileController::class, 'updateIncomeTax'])->name('user.updateIncomeTax');

    // The fixed Leave route
    Route::post('/updateLeave/{id}', [ProfileController::class, 'updateDaysTaken'])->name('user.updateDaysTaken');
    Route::post('/updateHospitalizationDays/{id}', [ProfileController::class, 'updateHospitalizationDays'])->name('user.updateHospitalizationDays');
    Route::post('/updateSickDays/{id}', [ProfileController::class, 'updateSickDays'])->name('user.updateSickDays');
    Route::post('/updateEmergencyLeave/{id}', [ProfileController::class, 'updateFamilyDetails'])->name('user.updateFamilyDetails');
    Route::post('/updateNextOfKin/{id}', [ProfileController::class, 'updateNextOfKin'])->name('user.updateNextOfKin');
});
