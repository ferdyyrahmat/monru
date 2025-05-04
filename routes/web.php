<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\System\AuditController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'store'])->name('loginHris');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/audit-trail', [AuditController::class, 'audit_trail_guest'])->middleware(['auth'])->name('audit');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::prefix('v1')->name('v1.')->middleware(['auth'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
});
// Route::prefix('v1')->name('v1.')->middleware(['auth', 'CheckJobLvlPermission'])->group(function () {
//     Route::get('', [DashboardController::class, 'index'])->name('dashboard');
// });




// Test Print by ESCPOS
// Route::get('/print', [DashboardController::class, 'print'])->name('print');
