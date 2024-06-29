<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPendaftaranController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\FormbController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KolatController;
use App\Http\Controllers\MedaliController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserController;
use App\Models\Detailpendaftaran;
use App\Models\Dropdown;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('actionregister', [UserController::class, 'actionregister'])->name('actionregister');

Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::post('actionlogout', [AuthController::class, 'actionlogout'])->name('actionlogout');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::prefix('admin')->middleware('isAdmin')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboardA'])->name('a.dashboard');
    // ============================================ KOLAT =======================================================
    Route::get('/data-kolat', [UserController::class, 'kolat'])->name('a.kolat');
    Route::put('/update-kolat/{id_kolat}', [UserController::class, 'update'])->name('a.update-kolat');
    Route::delete('/delete-kolat/{id_kolat}', [UserController::class, 'delete'])->name('a.delete-kolat');
    Route::put('/reset-password/{id_kolat}', [UserController::class, 'resetpassword'])->name('a.reset-password');
    // ======================================== FORM B ==============================================================
    Route::get('/data-formB', [FormbController::class, 'index'])->name('a.data-formB');
    // ======================================== ATLET ===============================================================
    Route::get('/data-atlet', [PesertaController::class, 'table_atlet'])->name('a.data-atlet');
    Route::put('/verified-atlet{id}', [PesertaController::class, 'verified_atlet'])->name('a.verified-atlet');
    // ======================================== JADWAL =============================================================
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('a.jadwal');
    Route::post('/tambah-jadwal', [JadwalController::class, 'tambah_jadwal'])->name('a.tambah-jadwal');
    Route::put('/update-jadwal/{id}', [JadwalController::class, 'update_jadwal'])->name('a.update-jadwal');
    Route::delete('/delete-jadwal/{id}', [JadwalController::class, 'delete_jadwal'])->name('a.delete-jadwal');
    // ======================================== BAGAN ===================================================================
    Route::get('/olah-bagan', [BaganController::class, 'form_bagan'])->name('a.olah-bagan');
    Route::post('/tambah-bagan', [BaganController::class, 'tambah_bagan'])->name('a.tambah-bagan');
    Route::delete('/delete-bagan/{id}', [BaganController::class, 'delete_bagan'])->name('a.delete-bagan');
    Route::post('/get-atlet', [BaganController::class, 'getatlet'])->name('a.get-atlet');
    // ======================================== SERTIFIKAT ===============================================================
    Route::get('/olah-sertifikat', [SertifikatController::class, 'index'])->name('a.olah-sertifikat');
    Route::post('/generate-sertifikat', [SertifikatController::class, 'generate_sertifikat'])->name('a.generate-sertifikat');
    Route::get('/detail-sertifikat/{id_kolat}', [SertifikatController::class, 'detail'])->name('a.detail-sertifikat');
    Route::delete('/delete-sertifikat/{id}', [SertifikatController::class, 'delete_sertifikat'])->name('a.delete-sertifikat');

    // ======================================== AJAX SERITIFKAT ===================================================================
    Route::post('/atlet/sertif', [SertifikatController::class, 'getatlet'])->name('a.get-atlet-sertif');
    // ======================================== MEDALI ===============================================================
    Route::get('/olah-medali', [MedaliController::class, 'index'])->name('a.olah-medali');
    Route::post('/tambah-medali', [MedaliController::class, 'tambah_medali'])->name('a.tambah-medali');
    Route::put('/update-medali/{id}', [MedaliController::class, 'update_medali'])->name('a.update-medali');
    Route::delete('/delete-medali/{id}', [MedaliController::class, 'delete_medali'])->name('a.delete-medali');
});

Route::prefix('kolat')->middleware('isKolat')->group(function() {
    // ============================================== PROFILE ====================================================
    Route::get('/profile', [UserController::class, 'profile'])->name('k.profile');
    Route::post('/update-profile', [UserController::class, 'update_profile'])->name('k.update-profile');
    Route::post('/update-foto', [UserController::class, 'update_foto'])->name('k.update-foto');

    Route::get('/dashboard', [DashboardController::class, 'dashboardK'])->name('k.dashboard');
    // ============================================== PESERTA ====================================================
    Route::get('/table-peserta', [KolatController::class, 'table_peserta'])->name('k.table-peserta');
    Route::post('/get-kategori', [DropdownController::class, 'getusia'])->name('k.get-usia');
    Route::post('/get-kelamin', [DropdownController::class, 'getkelamin'])->name('k.get-kelamin');
    Route::post('/get-tanding', [DropdownController::class, 'gettanding'])->name('k.get-tanding');
    Route::get('/table-peserta', [KolatController::class, 'table_peserta'])->name('k.table-peserta');
    Route::post('/tambah-peserta', [KolatController::class, 'tambah_peserta'])->name('k.tambah-peserta');
    Route::put('/update-peserta/{id_peserta}', [KolatController::class, 'update_peserta'])->name('k.update-peserta');
    Route::delete('/delete-peserta/{id_peserta}', [KolatController::class, 'delete'])->name('k.delete-peserta');
    
    // ============================================== FORM B ====================================================
    Route::post('tambah-formB', [KolatController::class, 'tambah_formB'])->name('k.tambah-formB');
    Route::put('update-formB', [KolatController::class, 'update_formB'])->name('k.update-formB');
    Route::delete('delete-formB', [KolatController::class, 'delete_formB'])->name('k.delete-formB');
    // ============================================== BAGAN ================================================
    Route::get('/daftar-bagan', [BaganController::class, 'daftar_bagan'])->name('k.daftar-bagan');
    // ======================================== SERTIFIKAT ===============================================================
    Route::get('/daftar-sertifikat', [SertifikatController::class, 'index_kolat'])->name('k.daftar-sertifikat');
    Route::get('/donwload-all-sertifikat', [SertifikatController::class, 'donwloadAll'])->name('k.download-all');
});

// Route::prefix('kolat')->middleware('isKolat')->group(function() {
//     Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('k.dashboard');
// });