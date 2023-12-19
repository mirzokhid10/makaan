<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// User frontend all route
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])
    ->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])
    ->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])
    ->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])
    ->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])
    ->name('user.password.update');

});

require __DIR__.'/auth.php';

// Admin group middleware start
Route::middleware('auth', 'role:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
    ->name('admin.dashboard');
    // admin logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
    ->name('admin.logout');
    // admin profile page
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])
    ->name('admin.profile');
    //admin profile edit store
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])
    ->name('admin.profile.store');

});  // End Admin group middleware finish

// Agent group middleware start
Route::middleware('auth', 'role:agent')->group(function () {

    // Agent dashboard
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
}); // End Agent group middleware finish

// Admin login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin registration
Route::get('/admin/registration', [AdminController::class, 'AdminRegistration'])->name('admin.registration');

