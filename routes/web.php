<?php

use App\Http\Controllers\AJKController;
use App\Http\Controllers\AksesAdminController;
use App\Http\Controllers\AktivitiController;
use App\Http\Controllers\BizhubController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitiController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InfoKampungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengungumanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WaktuBerurusanController;
use Illuminate\Support\Facades\Route;

// Guest Routes
Route::get('/', [GuestController::class, 'utama'])->name('utama');
Route::get('/ahli-jawatankuasa', [GuestController::class, 'ahliJawatankuasa'])->name('ahli-jawatankuasa');
Route::get('/fasiliti', [GuestController::class, 'fasiliti'])->name('fasiliti');
Route::get('/aktiviti', [GuestController::class, 'aktiviti'])->name('aktiviti');
Route::get('/budiman-biz-hub', [GuestController::class, 'budimanBizHub'])->name('budiman-biz-hub');
Route::get('/hubungi-kami', [GuestController::class, 'hubungiKami'])->name('hubungi-kami');

// Auth Routes
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Admin Routes

// Middleware and admin routes would go here

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// AJK Management
Route::get('/admin/ahli-jawatankuasa', [AJKController::class, 'index'])->name('admin.ajk.index');
Route::get('/admin/ahli-jawatankuasa/create', [AJKController::class, 'create'])->name('admin.ajk.create');
Route::post('/admin/ahli-jawatankuasa/store', [AJKController::class, 'store'])->name('admin.ajk.store');
Route::get('/admin/ahli-jawatankuasa/edit/{id}', [AJKController::class, 'edit'])->name('admin.ajk.edit');
Route::post('/admin/ahli-jawatankuasa/update/{id}', [AJKController::class, 'update'])->name('admin.ajk.update');
Route::post('/admin/ahli-jawatankuasa/delete/{id}', [AJKController::class, 'delete'])->name('admin.ajk.delete');
// Fasiliti Management
Route::get('/admin/fasiliti', [FasilitiController::class, 'index'])->name('admin.fasiliti.index');
Route::get('/admin/fasiliti/create', [FasilitiController::class, 'create'])->name('admin.fasiliti.create');
Route::post('/admin/fasiliti/store', [FasilitiController::class, 'store'])->name('admin.fasiliti.store');
Route::get('/admin/fasiliti/edit/{id}', [FasilitiController::class, 'edit'])->name('admin.fasiliti.edit');
Route::post('/admin/fasiliti/update/{id}', [FasilitiController::class, 'update'])->name('admin.fasiliti.update');
Route::post('/admin/fasiliti/delete/{id}', [FasilitiController::class, 'delete'])->name('admin.fasiliti.delete');
// Aktiviti Management
Route::get('/admin/aktiviti', [AktivitiController::class, 'index'])->name('admin.aktiviti.index');
Route::get('/admin/aktiviti/create', [AktivitiController::class, 'create'])->name('admin.aktiviti.create');
Route::post('/admin/aktiviti/store', [AktivitiController::class, 'store'])->name('admin.aktiviti.store');
Route::get('/admin/aktiviti/edit/{id}', [AktivitiController::class, 'edit'])->name('admin.aktiviti.edit');
Route::post('/admin/aktiviti/update/{id}', [AktivitiController::class, 'update'])->name('admin.aktiviti.update');
Route::post('/admin/aktiviti/delete/{id}', [AktivitiController::class, 'delete'])->name('admin.aktiviti.delete');
// Pengumuman Management
Route::get('/admin/pengunguman', [PengungumanController::class, 'index'])->name('admin.pengunguman.index');
Route::get('/admin/pengunguman/create', [PengungumanController::class, 'create'])->name('admin.pengunguman.create');
Route::post('/admin/pengunguman/store', [PengungumanController::class, 'store'])->name('admin.pengunguman.store');
Route::get('/admin/pengunguman/edit/{id}', [PengungumanController::class, 'edit'])->name('admin.pengunguman.edit');
Route::post('/admin/pengunguman/update/{id}', [PengungumanController::class, 'update'])->name('admin.pengunguman.update');
Route::post('/admin/pengunguman/delete/{id}', [PengungumanController::class, 'delete'])->name('admin.pengunguman.delete');
// Budiman Biz Hub Management
Route::get('/admin/budiman-biz-hub', [BizhubController::class, 'index'])->name('admin.bizhub.index');
Route::get('/admin/budiman-biz-hub/create', [BizhubController::class, 'create'])->name('admin.bizhub.create');
Route::post('/admin/budiman-biz-hub/store', [BizhubController::class, 'store'])->name('admin.bizhub.store');
Route::get('/admin/budiman-biz-hub/edit/{id}', [BizhubController::class, 'edit'])->name('admin.bizhub.edit');
Route::post('/admin/budiman-biz-hub/update/{id}', [BizhubController::class, 'update'])->name('admin.bizhub.update');
Route::post('/admin/budiman-biz-hub/delete/{id}', [BizhubController::class, 'delete'])->name('admin.bizhub.delete');
// Waktu Beroperasi Management
Route::get('/admin/waktu-berurusan', [WaktuBerurusanController::class, 'index'])->name('admin.waktu-berurusan.index');
Route::get('/admin/waktu-berurusan/create', [WaktuBerurusanController::class, 'create'])->name('admin.waktu-berurusan.create');
Route::post('/admin/waktu-berurusan/store', [WaktuBerurusanController::class, 'store'])->name('admin.waktu-berurusan.store');
Route::get('/admin/waktu-berurusan/edit/{id}', [WaktuBerurusanController::class, 'edit'])->name('admin.waktu-berurusan.edit');
Route::post('/admin/waktu-berurusan/update/{id}', [WaktuBerurusanController::class, 'update'])->name('admin.waktu-berurusan.update');
Route::post('/admin/waktu-berurusan/delete/{id}', [WaktuBerurusanController::class, 'delete'])->name('admin.waktu-berurusan.delete');
// Hubungi Kami Management
Route::get('/admin/info-kampung', [InfoKampungController::class, 'index'])->name('admin.info-kampung.index');
Route::post('/admin/info-kampung/update/{id}', [InfoKampungController::class, 'update'])->name('admin.info-kampung.update');
Route::get('/admin/info-kampung/edit/{id}', [InfoKampungController::class, 'edit'])->name('admin.info-kampung.edit');
// Profil Management
Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil.index');
Route::post('/admin/profil/update/{id}', [ProfilController::class, 'update'])->name('admin.profil.update');
Route::get('/admin/profil/edit/{id}', [ProfilController::class, 'edit'])->name('admin.profil.edit');
// Admin Management
Route::get('/admin/akses-admin', [AksesAdminController::class, 'index'])->name('admin.akses-admin.index');
Route::get('/admin/akses-admin/create', [AksesAdminController::class, 'create'])->name('admin.akses-admin.create');
Route::post('/admin/akses-admin/store', [AksesAdminController::class, 'store'])->name('admin.akses-admin.store');
Route::get('/admin/akses-admin/edit/{id}', [AksesAdminController::class, 'edit'])->name('admin.akses-admin.edit');
Route::post('/admin/akses-admin/update/{id}', [AksesAdminController::class, 'update'])->name('admin.akses-admin.update');
Route::post('/admin/akses-admin/delete/{id}', [AksesAdminController::class, 'delete'])->name('admin.akses-admin.delete');
