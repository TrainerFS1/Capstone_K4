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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
// Route::middleware(['auth'])->group(function () {

Route::group(['middleware' => ['auth', 'admin']], function () {
    
    //home
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');

    //User
    Route::get('/User', [App\Http\Controllers\UserController::class, 'index'])->name('User');
    Route::get('/User/create', [App\Http\Controllers\UserController::class, 'create'])->name('User-create');
    Route::post('/User/store', [App\Http\Controllers\UserController::class, 'store'])->name('User-store');
    Route::get('/User/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('User-edit');
    Route::post('/User/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('User-update');
    Route::get('/User/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('User-delete');
    // Route::get('/User/restore/{id}', [App\Http\Controllers\UserController::class, 'restore'])->name('User-restore');
    // Route::get('/User/forceDelete/{id}', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('User-forceDelete');


    //Customer
    Route::get('/Customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('Customer');
    Route::get('/Customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('Customer-create');
    Route::post('/Customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('Customer-store');
    Route::get('/Customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('Customer-edit');
    Route::post('/Customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('Customer-update');
    Route::get('/Customer/delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('Customer-delete');
    // Route::get('/Customer/restore/{id}', [App\Http\Controllers\CustomerController::class, 'restore'])->name('Customer-restore');
    // Route::get('/Customer/forceDelete/{id}', [App\Http\Controllers\CustomerController::class, 'forceDelete'])->name('Customer-forceDelete');

    //Package
    Route::get('/Package', [App\Http\Controllers\PackageController::class, 'index'])->name('Package');
    Route::get('/Package/create', [App\Http\Controllers\PackageController::class, 'create'])->name('Package-create');
    Route::post('/Package/store', [App\Http\Controllers\PackageController::class, 'store'])->name('Package-store');
    Route::get('/Package/edit/{id}', [App\Http\Controllers\PackageController::class, 'edit'])->name('Package-edit');
    Route::post('/Package/update/{id}', [App\Http\Controllers\PackageController::class, 'update'])->name('Package-update');
    Route::get('/Package/delete/{id}', [App\Http\Controllers\PackageController::class, 'destroy'])->name('Package-delete');
    // Route::get('/Package/restore/{id}', [App\Http\Controllers\PackageController::class, 'restore'])->name('Package-restore');
    // Route::get('/Package/forceDelete/{id}', [App\Http\Controllers\PackageController::class, 'forceDelete'])->name('Package-forceDelete');

    //Report
    Route::get('/Report', [App\Http\Controllers\ReportController::class, 'index'])->name('Report');
    Route::get('/Report/create', [App\Http\Controllers\ReportController::class, 'create'])->name('Report-create');
    Route::post('/Report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('Report-store');
    Route::get('/Report/edit/{id}', [App\Http\Controllers\ReportController::class, 'edit'])->name('Report-edit');
    Route::post('/Report/update/{id}', [App\Http\Controllers\ReportController::class, 'update'])->name('Report-update');
    Route::get('/Report/delete/{id}', [App\Http\Controllers\ReportController::class, 'destroy'])->name('Report-delete');
    // Route::get('/Report/restore/{id}', [App\Http\Controllers\ReportController::class, 'restore'])->name('Report-restore');
    // Route::get('/Report/forceDelete/{id}', [App\Http\Controllers\ReportController::class, 'forceDelete'])->name('Report-forceDelete');


});

Route::group(['middleware' => ['auth', 'staff']], function () {
    Route::get('/staff', [App\Http\Controllers\HomeController::class, 'index'])->name('homestaff');

        //Customer
        Route::get('/Customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('Customer');
        Route::get('/Customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('Customer-create');
        Route::post('/Customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('Customer-store');
        Route::get('/Customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('Customer-edit');
        Route::post('/Customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('Customer-update');
        Route::get('/Customer/delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('Customer-delete');
        // Route::get('/Customer/restore/{id}', [App\Http\Controllers\CustomerController::class, 'restore'])->name('Customer-restore');
        // Route::get('/Customer/forceDelete/{id}', [App\Http\Controllers\CustomerController::class, 'forceDelete'])->name('Customer-forceDelete');

});