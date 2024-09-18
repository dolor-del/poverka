<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\MetersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\ItineraryController;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('login')->prefix('admin')->group(function () {
    Route::get('/', [ArchiveController::class, 'index'])->name('admin');

    Route::middleware('dispatcher')->group(function () {
        Route::resource('orders', OrdersController::class, ['except' => ['show']]);
    });

    Route::middleware('worker')->group(function () {
        Route::resource('itinerary', ItineraryController::class, ['except' => ['show', 'store', 'create']]);
        Route::resource('meters', MetersController::class, ['except' => ['show']]);
        Route::put('admin/itinerary/complete/{itinerary}', [ItineraryController::class, 'complete'])->name('itinerary.complete');
    });

    Route::middleware('admin')->group(function () {
        Route::resource('users', UsersController::class, ['except' => ['show']]);
    });

    Route::resource('archive', ArchiveController::class, ['only' => ['index', 'update', 'destroy']]);
    Route::resource('trash', TrashController::class, ['only' => ['index', 'update', 'destroy']]);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
