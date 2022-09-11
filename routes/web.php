<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CostomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrecriptionController;
use App\Http\Controllers\PreparedQuotationController;
use App\Http\Controllers\QuaotationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadedPrescriptionsController;
use App\Http\Controllers\UserDashboardController;

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

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('authenticate', [LoginController::class, 'store']);

Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('store', [RegisterController::class, 'store']);

Route::get('logout', [LoginController::class, 'logout']);

//admin
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('admin-dashboard', [AdminDashboardController::class, 'index']);
    Route::get('medicine-list', [MedicineController::class, 'index']);
    Route::view('sales', 'Admin.sales');
    Route::view('admin-profile', 'Admin.user-profile');
    Route::view('add-medicine', 'Admin.add-medicine');
    Route::post('store-medicine', [MedicineController::class, 'store']);
    Route::get('customers', [CostomerController::class, 'index']);
    Route::get('medicine-delete/{id}', [MedicineController::class, 'destroy']);
    Route::get('uploaded-prescriptions/{id}', [UploadedPrescriptionsController::class, 'index']);
    Route::put('admin-profile-update/{id}', [RegisterController::class, 'update']);
    Route::get('findPrice', [MedicineController::class, 'findPrice']);
    Route::get('precribtion-list', [PrecriptionController::class, 'show']);
    Route::post('quation-add', [QuaotationController::class, 'store']);
    Route::get('accept', [AdminDashboardController::class, 'accept']);
    Route::get('reject', [AdminDashboardController::class, 'reject']);
    Route::get('pending', [AdminDashboardController::class, 'pending']);
});

Route::middleware('auth')->group(function() {
    Route::get('user-dashboard', [UserDashboardController::class, 'index']);
    Route::view('upload-precribtion', 'user.upload-precribtion');
    Route::view('user-profile', 'user.user-profile');
    Route::put('user-profile-update/{id}', [RegisterController::class, 'update']);
    Route::post('precription-store', [PrecriptionController::class, 'store']);
    Route::get('precribtion-history', [PrecriptionController::class, 'index']);
    Route::get('prepared-quotation', [PreparedQuotationController::class, 'index']);
    Route::get('quoation-details/{id}', [UploadedPrescriptionsController::class, 'Details']);
    Route::post('status-update', [PreparedQuotationController::class, 'store']);
});




