<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\PageController;
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



// Pages
Route::get('index', [PageController::class, 'index'])
->name('index');
Route::get('about', [PageController::class, 'about'])
->name('about');
Route::get('propertylist', [PageController::class, 'propertylist'])
->name('propertylist');
Route::get('contact', [PageController::class, 'contact'])
->name('contact');

// Admin login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
->name('admin.login');

// Admin registration
Route::get('/admin/registration', [AdminController::class, 'AdminRegistration'])
->name('admin.registration');

/// Admin Group Middleware
Route::middleware(['auth','role:admin'])->group(function(){

    // Property Type All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });

    // Add Properties By Admin All Routes
    Route::controller(PropertyController::class)->group(function(){
        Route::get('/all/property', 'AllProperty')->name('all.property');
        Route::get('/add/property', 'AddProperty')->name('add.property');
        Route::post('/store/property', 'StoreProperty')->name('store.property');
        // Route::get('/edit/property/{id}', 'EditProperty')->name('edit.property');
        // Route::post('/update/property', 'UpdateProperty')->name('update.property');
        // Route::get('/delete/property/{id}', 'DeleteProperty')->name('delete.property');
    });

}); // End Group Admin Middleware
