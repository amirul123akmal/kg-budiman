<?php

use Illuminate\Support\Facades\Route;

// Guest Routes
Route::get('/', function () {
    return view('guest.utama');
})->name('utama');
Route::get('/ahli-jawatankuasa', function () {
    return view('guest.ajk');
})->name('ahli-jawatankuasa');
Route::get('/fasiliti', function () {
    return view('guest.fasiliti');
})->name('fasiliti');
Route::get('/aktiviti', function () {
    return view('guest.aktiviti');
})->name('aktiviti');
Route::get('/budiman-biz-hub', function () {
    return view('guest.bizhub');
})->name('budiman-biz-hub');
Route::get('/hubungi-kami', function () {
    return view('guest.hubungi-kami');
})->name('hubungi-kami');

// Auth Routes

// Admin Routes