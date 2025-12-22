<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TestimonialController;

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

// Route untuk home
Route::get('/', function () {
    return view('client.index');
});

// Route untuk register, login,dan logout
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'registerProcess']);
Route::get('logout', [AuthController::class, 'logout']);

// Route untuk client
Route::middleware(['auth', 'only_client'])->group(function () {
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/upload', [PembayaranController::class, 'uploadBukti'])->name('pembayaran.upload');
    Route::post('/pengembalian/upload', [PembayaranController::class, 'uploadBuktiPengembalian'])->name('pengembalian.upload');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('barang', [UserController::class, 'barang']);
    Route::post('addtocart', [UserController::class, 'addToCart']);
    Route::get('sewa', [UserController::class, 'sewa'])->name('sewa');
    Route::post('pembayaran', [UserController::class, 'store'])->name('pembayaran.store');
    Route::post('/submit-actual-return-date', [PembayaranController::class, 'submitTanggalPengembalian'])->name('submit.actual_return_date');
    Route::get('/detailBarang/{id}', [UserController::class, 'showDetailBarang'])->name('barang.show');
});

// Route untuk menampilkan Detail penyewaan
Route::get('/sewa/{id}', [UserController::class, 'show'])->name('sewa.show');

// Route untuk admin
Route::middleware(['auth', 'only_admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.rent_logs');
    Route::post('admin/rent_logs/approve/{id}', [AdminController::class, 'approve'])->name('admin.rent_logs.approve');
    Route::post('admin/rent_logs/approve_return/{id}', [AdminController::class, 'approveReturn'])->name('admin.rent_logs.approve_return');
    Route::get('admin/laporanKeuangan', [AdminController::class, 'laporanKeuangan'])->name('financial.report');
    Route::get('admin/top_transactions', [AdminController::class, 'topTransactions'])->name('financial.top_transactions');

    //CRUD barang
    Route::get('/admin/barang/index', [AdminController::class, 'indexBarang'])->name('admin.barang.index');
    Route::get('/admin/barang/create', [AdminController::class, 'createOrEditBarang'])->name('admin.barang.create');
    Route::post('/admin/barang/store', [AdminController::class, 'storeBarang'])->name('admin.barang.store');
    Route::get('/admin/barang/{id}/edit', [AdminController::class, 'createOrEditBarang'])->name('admin.barang.edit');
    Route::put('/admin/barang/{id}/update', [AdminController::class, 'updateBarang'])->name('admin.barang.update');
    Route::delete('/admin/barang/{id}/delete', [AdminController::class, 'deleteBarang'])->name('admin.barang.destroy');
});

// Route untuk testimonial
Route::post('/submit-testimonial', [TestimonialController::class, 'submitTestimonial'])->name('submitTestimonial');
Route::get('/', [TestimonialController::class, 'index'])->name('home');



