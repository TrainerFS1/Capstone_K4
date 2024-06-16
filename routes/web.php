<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\ReportController;

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

//Laundry
Route::get('/', function () {
    return Redirect::to('/laundry');
});
Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry');

//Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Customer Report
Route::get('/report/create', [ReportController::class, 'create'])->name('createReport');
Route::post('/report/create', [ReportController::class, 'store'])->name('storeReport');

//Customer Transaction
Route::get('/transaction/{id}/show', [TransactionController::class, 'show'])->name('showTransaction');

//Admin
Route::group(['middleware' => ['auth', 'Admin']], function () {

    // HomeController
    Route::get('/home', function () {
        return Redirect::to('/Admin');
    });
    Route::get('/Admin', [HomeController::class, 'index'])->name('home');

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

    // Usercontroller
    Route::get('/users', [UserController::class, 'index'])->name('indexUser');
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
    Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('updateTransaction');
    Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('/transaction/{id}/print-receipt', [TransactionController::class, 'printReceipt'])->name('printReceipt');




    // ReportController
    Route::get('/report', [ReportController::class, 'index'])->name('daftarReport');
    Route::get('/report/{id}/show', [ReportController::class, 'show'])->name('showReport');
    Route::get('/report/{id}/delete', [ReportController::class, 'destroy'])->name('deleteReport');
    
    Route::get('/search-transaction', [TransactionController::class, 'search'])->name('searchTransaction');



});

//Staff
Route::group(['middleware' => ['auth']], function () {

    Route::get('/Staff', [HomeController::class, 'indexstaff'])->name('homestaff');

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

    // TransactionController
    Route::get('/transaction', [TransactionController::class, 'index'])->name('daftarTransaction');
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('createTransaction');
    Route::post('/transaction/create', [TransactionController::class, 'store'])->name('storeTransaction');
    Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit'])->name('editTransaction');
    Route::post('/transaction/{id}/edit', [TransactionController::class, 'update'])->name('updateTransaction');
    Route::get('/transaction/{id}/delete', [TransactionController::class, 'destroy'])->name('deleteTransaction');
    Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('updateTransaction');
    Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('/transaction/{id}/print-receipt', [TransactionController::class, 'printReceipt'])->name('printReceipt');

});