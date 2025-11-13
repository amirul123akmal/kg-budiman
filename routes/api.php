<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AJKController as ajk;
use App\Http\Controllers\api\FasilityController as fasility;
use App\Http\Controllers\api\AktivitiController as activity;
use App\Http\Controllers\api\BizhubController as bizhub;

Route::prefix('api')->group(function () {

    Route::controller(ajk::class)->group(function () {
        Route::get('/jawatan_kuasa', 'get_jawatan_kuasa');
        Route::post('/jawatan_kuasa', 'add_jawatan_kuasa');
    });

    Route::controller(fasility::class)->group(function () {
        Route::get('/fasiliti', 'get_fasiliti');
        Route::post('/fasiliti', 'add_fasiliti');
        Route::delete('/fasiliti/{id}', 'delete_fasiliti');
    });

    Route::controller(activity::class)->group(function () {
        Route::get('/aktiviti', 'get_aktiviti');
        Route::post('/aktiviti', 'add_aktiviti');
    });

    Route::controller(bizhub::class)->group(function () {
        Route::get('/bizhub', 'get_bizhub');
        Route::post('/bizhub', 'add_bizhub');
        Route::patch('/bizhub/{id}', 'update_bizhub');
        Route::delete('/bizhub/{id}', 'delete_bizhub');
    });
});