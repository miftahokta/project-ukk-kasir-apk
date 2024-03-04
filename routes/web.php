<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UsersAdminController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\MemberAdminController;
use App\Http\Controllers\MemberPetugasController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\PenjualanAdminController;
use App\Http\Controllers\DetailPenjualanAdminController;
use App\Http\Controllers\DetailPenjualanPetugasController;
use App\Http\Controllers\PenjualanPetugasController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\ProdukPetugasController;

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

// Route::get('admin', function () {
//     return view('admin.index');
// });

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');


// Logout
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Dashboard Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboardadmin')->middleware('access:Admin');

    // Penjualan
    Route::resource('penjualan', PenjualanAdminController::class)->middleware('access:Admin');
    // Hapus penjualan
    Route::get('penjualan/hapus/{id}', [PenjualanAdminController::class, 'destroy'])->name('hapuspenjualanadmin')->middleware('access:Admin');
    // Print penjualan
    Route::get('penjualan/print', [PenjualanAdminController::class, 'show'])->name('printpenjualanadmin')->middleware('access:Admin');

    // Detail Penjualan
    Route::post('penjualan/detail/tambah', [DetailPenjualanAdminController::class, 'store'])->name('detailpenjualanadmin')->middleware('access:Admin');

    // Update Penjualan
    Route::post('penjualan/update', [DetailPenjualanAdminController::class, 'update'])->name('updatepenjualanadmin');
    // Update member
    Route::post('penjualan/member', [DetailPenjualanAdminController::class, 'create'])->name('memberpenjualanadmin');    

    // Produk
    Route::get('produk', [ProdukAdminController::class, 'index'])->name('produkadmin')->middleware('access:Admin');
    // Print produk
    Route::get('produk/print', [ProdukAdminController::class, 'show'])->name('printprodukanadmin')->middleware('access:Admin');
    // Tambah Produk
    Route::get('produk/tambah', [ProdukAdminController::class, 'create'])->name('tambahprodukadmin')->middleware('access:Admin');
    Route::post('produk/tambah/action', [ProdukAdminController::class, 'store'])->name('actionprodukadmin')->middleware('access:Admin');
    // Edit Produk
    Route::get('produk/edit/{id}', [ProdukAdminController::class, 'edit'])->name('editprodukadmin')->middleware('access:Admin');
    Route::post('produk/edit/{id}', [ProdukAdminController::class, 'update'])->name('updateprodukadmin')->middleware('access:Admin');
    // Hapus Produk
    Route::get('produk/hapus/{id}', [ProdukAdminController::class, 'destroy'])->name('hapusprodukadmin')->middleware('access:Admin');
    
    // Register
    Route::get('register', [UserAdminController::class, 'create'])->name('register')->middleware('access:Admin');;
    Route::post('actionregister', [UserAdminController::class, 'store'])->name('actionregister');
 
    // User
    Route::get('user', [UsersAdminController::class, 'index'])->name('user')->middleware('access:Admin');;
    // Hapus User
    Route::get('users/hapus/{id}', [UsersAdminController::class, 'destroy'])->name('hapususersadmin')->middleware('access:Admin');

    // Profile
    Route::get('profile', [ProfileAdminController::class, 'index'])->name('profile')->middleware('access:Admin');;

    // Member
    Route::get('member', [MemberAdminController::class, 'index'])->name('memberadmin')->middleware('access:Admin');;
    // Print member
    Route::get('member/print', [MemberAdminController::class, 'show'])->name('printmemberadmin')->middleware('access:Admin');
    // Tambah Member
    Route::get('member/tambah', [MemberAdminController::class, 'create'])->name('tambahmemberadmin')->middleware('access:Admin');
    Route::post('member/tambah/action', [MemberAdminController::class, 'store'])->name('actionmemberadmin')->middleware('access:Admin');
    // Edit member
    Route::get('member/edit/{id}', [MemberAdminController::class, 'edit'])->name('editmemberadmin')->middleware('access:Admin');
    Route::post('member/edit/{id}', [MemberAdminController::class, 'update'])->name('updatememberadmin')->middleware('access:Admin');

    // Hapus Member
    Route::get('member/hapus/{id}', [MemberAdminController::class, 'destroy'])->name('hapusmemberadmin')->middleware('access:Admin');    
});

// Dashboard Petugas
Route::prefix('petugas')->middleware('auth')->group(function () {
        Route::get('dashboard', [DashboardPetugasController::class, 'index'])->name('dashboardpetugas')->middleware('access:Petugas');
        // Penjualan
        Route::resource('penjualan', PenjualanPetugasController::class)->middleware('access:Petugas');
        // Hapus penjualan
        Route::get('penjualan/hapus/{id}', [PenjualanPetugasController::class, 'destroy'])->name('hapuspenjualanpetugas')->middleware('access:Petugas');

        // Detail Penjualan
        Route::post('penjualan/detail/tambah', [DetailPenjualanPetugasController::class, 'store'])->name('detailpenjualanpetugas')->middleware('access:Petugas');   

        // Hapus Detail Penjualan
        Route::get('penjualan/detail/hapus', [DetailPenjualanPetugasController::class, 'destroy'])->name('hapusdetailpenjualanpetugas');

        // Update Penjualan
        Route::post('penjualan/update', [DetailPenjualanPetugasController::class, 'update'])->name('updatepenjualanpetugas');
        // Update member
        Route::post('penjualan/member', [DetailPenjualanPetugasController::class, 'create'])->name('memberpenjualanpetugas');

        
        // Produk
        Route::get('produk', [ProdukPetugasController::class, 'index'])->name('produkpetugas')->middleware('access:Petugas');
        // Tambah Produk
        Route::get('produk/tambah', [ProdukPetugasController::class, 'create'])->name('tambahprodukpetugas')->middleware('access:Petugas');
        Route::post('produk/tambah/action', [ProdukPetugasController::class, 'store'])->name('actionprodukpetugas')->middleware('access:Petugas');
        // Edit Produk
        Route::get('produk/edit/{id}', [ProdukPetugasController::class, 'edit'])->name('editprodukpetugas')->middleware('access:Petugas');
        Route::post('produk/edit/{id}', [ProdukPetugasController::class, 'update'])->name('updateprodukpetugas')->middleware('access:Petugas');
        // Hapus Produk
        Route::get('produk/hapus/{id}', [ProdukPetugasController::class, 'destroy'])->name('hapusprodukpetugas')->middleware('access:Petugas');

        // Member
        Route::get('member', [MemberPetugasController::class, 'index'])->name('memberpetugas')->middleware('access:Petugas');;
        // Tambah Member
        Route::get('member/tambah', [MemberPetugasController::class, 'create'])->name('tambahmemberpetugas')->middleware('access:Petugas');
        // Edit member
        Route::get('member/edit/{id}', [MemberPetugasController::class, 'edit'])->name('editmemberpetugas')->middleware('access:Petugas');
        Route::post('member/edit/{id}', [MemberPetugasController::class, 'update'])->name('updatememberpetugas')->middleware('access:Petugas');

        Route::post('member/tambah/action', [MemberPetugasController::class, 'store'])->name('actionmemberpetugas')->middleware('access:Petugas');
        // Hapus Member
        Route::get('member/hapus/{id}', [MemberPetugasController::class, 'destroy'])->name('hapusmemberpetugas')->middleware('access:Petugas');    

});