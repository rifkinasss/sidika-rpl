<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Pegawai\PerjalananDinas;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RedirectToLogin;
use App\Models\Pegawai\PelaporanPerjadin;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Pegawai\DashboardController;
use App\Http\Controllers\Pegawai\BelanjaModalController;
use App\Http\Controllers\Pegawai\PerjalananDinasController;
use App\Http\Controllers\Pegawai\BelanjaBarangJasaController;
use App\Http\Controllers\Pegawai\PelaporanPerjadinController;
use App\Http\Controllers\Pegawai\ProfileController;
use App\Http\Controllers\Admin\VerifikasiBelanjaModalController;
use App\Http\Controllers\Admin\VerifikasiPerjalananDinasController;
use App\Http\Controllers\Admin\VerifikasiBelanjaBarangJasaController;
use App\Http\Controllers\Admin\VerifikasiPelaporanPerjalananDinasController;
use App\Http\Controllers\PDFController;

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

Route::middleware([RedirectToLogin::class])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('superadmin')->group(function () {
    Route::get('/dashboard-superadmin', function () {
        return view('superadmin.dashboard');
    })->name('superadmin');
    Route::resource('dashboard-superadmin/user', UserController::class);
    Route::post('dashboard-superadmin/user/import', [UserController::class, 'import'])->name('user.import');
    Route::get('/dashboard-superadmin/user/download', [UserController::class, 'download'])->name('download');
    Route::get('/dashboard-superadmin/bantuan', function () {
        return view('superadmin.bantuan');
    })->name('dashboard-superadmin-bantuan');
    Route::get('/dashboard-superadmin/profile-superadmin', function () {
        return view('superadmin.profile.profile');
    })->name('dashboard-superadmin-profile');
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard-admin', function () {
        return view('admin.dashboard');
    })->name('admin');
    Route::resource('dashboard-admin/verifikasi-perjalanan-dinas', VerifikasiPerjalananDinasController::class);
    Route::resource('dashboard-admin/verifikasi-pelaporan-perjadin', VerifikasiPelaporanPerjalananDinasController::class);
    Route::resource('dashboard-admin/verifikasi-belanja-modal', VerifikasiBelanjaModalController::class);
    Route::get('dashboard-admin/verifikasi-belanja-modal/{id}/laporan', [VerifikasiBelanjaModalController::class, 'laporan'])->name('verifikasi-belanja-modal.laporan');
    Route::post('dashboard-admin/verifikasi-belanja-modal/{id}/verif', [VerifikasiBelanjaModalController::class, 'verif'])->name('verifikasi-belanja-modal.verif');
    Route::resource('dashboard-admin/verifikasi-belanja-barang-jasa', VerifikasiBelanjaBarangJasaController::class);
    Route::get('dashboard-admin/verifikasi-belanja-barang-jasa/{id}/laporan', [VerifikasiBelanjaBarangJasaController::class, 'laporan'])->name('verifikasi-belanja-barang-jasa.laporan');
    Route::post('dashboard-admin/verifikasi-belanja-barang-jasa/{id}/verif', [VerifikasiBelanjaBarangJasaController::class, 'verif'])->name('verifikasi-belanja-barang-jasa.verif');
    Route::get('/dashboard-admin/bantuan', function () {
        return view('admin.bantuan');
    })->name('dashboard-admin-bantuan');
    Route::get('/dashboard-admin/profile-admin', function () {
        return view('admin.profile');
    })->name('dashboard-admin-profile');
});

Route::middleware('pegawai')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('pegawai');
    Route::resource('perjalanan-dinas', PerjalananDinasController::class);
    Route::resource('pelaporan-perjadin', PelaporanPerjadinController::class);
    Route::post('/pelaporan-perjadin/{id}', [PelaporanPerjadinController::class, 'store'])->name('pelaporan-perjadin.store');
    Route::resource('belanja-modal', BelanjaModalController::class);
    Route::get('belanja-modal/detail/{id}', [BelanjaModalController::class, 'detail'])->name('belanja-modal.detail');
    Route::resource('belanja-barang-jasa', BelanjaBarangJasaController::class);
    Route::get('belanja-barang-jasa/detail/{id}', [BelanjaBarangJasaController::class, 'detail'])->name('belanja-barang-jasa.detail');
    Route::get('/bantuan', function () {
        return view('pegawai.bantuan');
    })->name('bantuan');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/SPPD/{id}', [PDFController::class, 'generatePDF'])->name('SPPD');
});
