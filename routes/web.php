<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LaundryController;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

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
    return Redirect::to('/laundry');
});
Route::get('/laundry', [LaundryController::class, 'index']);

// HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// CustomerController
Route::get('/customer', [CustomerController::class, 'index'])->name('daftarCustomer');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('createCustomer');
Route::post('/customer/create', [CustomerController::class, 'store'])->name('storeCustomer');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('editCustomer');
Route::post('/customer/{id}/edit', [CustomerController::class, 'update'])->name('updateCustomer');
Route::get('/customer/{id}/delete', [CustomerController::class, 'destroy'])->name('deleteCustomer');

// PackageController

Route::get('/package', [PackageController::class, 'index'])->name('daftarPackage');
Route::get('/package/create', [PackageController::class, 'create'])->name('createPackage');
Route::post('/package/create', [PackageController::class, 'store'])->name('storePackage');
Route::get('/package/{id}/edit', [PackageController::class, 'edit'])->name('editPackage');
Route::put('/package/{id}', [PackageController::class, 'update'])->name('updatePackage');
Route::get('/package/{id}/delete', [PackageController::class, 'destroy'])->name('deletePackage');

// registerController
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// usercontroller
Route::get('/user', [UserController::class, 'index'])->name('daftarUser');
Route::get('/user/create', [UserController::class, 'create'])->name('createUser');
Route::post('/user/create', [UserController::class, 'store'])->name('storeUser');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('editUser');
Route::post('/user/{id}/edit', [UserController::class, 'update'])->name('updateUser');
Route::put('/users/{id}', [UserController::class, 'update'])->name('updateUser');
Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->name('deleteUser');    


// TransactionController
Route::get('/transaction', [TransactionController::class, 'index'])->name('daftarTransaction');
Route::get('/transaction/create', [TransactionController::class, 'create'])->name('createTransaction');
Route::post('/transaction/create', [TransactionController::class, 'store'])->name('storeTransaction');
Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit'])->name('editTransaction');
Route::post('/transaction/{id}/edit', [TransactionController::class, 'update'])->name('updateTransaction');
Route::get('/transaction/{id}/delete', [TransactionController::class, 'destroy'])->name('deleteTransaction');