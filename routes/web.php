<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationsController;

Route::get('/', function () {
    return view('home');
});
Route::get('/short', function () {
    return view('short');
});
Route::get('/color', function () {
    return view('color');
});
Route::get('/newDesign', function () {
    return view('newDesign');
});
Route::get('/reservation', function () {
    return view('reservation');
});

// 예약을 생성하기 위한 라우트
Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');
Route::get('/get-reserved-times', [ReservationsController::class, 'getReservedTimes']);



// 관리자 페이지에만 로그인 필요
Route::get('/admin', [ReservationsController::class, 'index'])->name('admin.index');
Route::post('/reservations/update/{no}', [ReservationsController::class, 'updateStatus'])->name('reservations.updateStatus');
Route::post('/admin/reservations', [ReservationsController::class, 'adminStore'])->name('reservations.adminStore');