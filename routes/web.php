<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\System\AuditController;
use App\Http\Controllers\System\Department\DepartmentController;
use App\Http\Controllers\System\Department\SubDepartmentController;
use App\Http\Controllers\System\FormulirController;
use App\Http\Controllers\System\JenisSyarat\JenisDpController;
use App\Http\Controllers\System\JenisSyarat\JenisRuanganController;
use App\Http\Controllers\System\JenisSyarat\SyaratController;
use App\Http\Controllers\System\JenisSyarat\SyaratJenisDpController;
use App\Http\Controllers\System\JenisSyarat\SyaratJenisRuanganController;
use App\Http\Controllers\System\Ruangan\RuanganController;
use App\Http\Controllers\System\User\UserOutstandingController;
use App\Http\Controllers\System\User\UserRevisiController;
use App\Http\Controllers\System\WaktuUkur\WaktuPengukuranController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'store'])->name('loginHris');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/audit-trail', [AuditController::class, 'index'])->middleware(['auth'])->name('audit');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::prefix('v1')->name('v1.')->middleware(['auth'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('formulir')->name('form.')->group(function () {
        Route::get('', [FormulirController::class, 'index'])->name('index');
        Route::post('', [FormulirController::class, 'verifikasi'])->name('verifikasi');
        Route::post('store', [FormulirController::class, 'store'])->name('store');
    });

    Route::prefix('monitoring')->name('monitoring.')->group(function () {
        Route::prefix('pengukuran')->name('pengukuran.')->group(function () {
            Route::get('', [FormulirController::class, 'index'])->name('index');
        });
    });
    
});

// Admin Zone
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    //department
    Route::prefix('department')->name('dept.')->group(function () {
        Route::get('', [DepartmentController::class, 'index'])->name('index');
        Route::get('dt_dept', [DepartmentController::class, 'dt_dept'])->name('dt_dept');
        Route::post('store', [DepartmentController::class, 'store'])->name('store');
        Route::post('edit', [DepartmentController::class, 'edit'])->name('edit');
        Route::post('update', [DepartmentController::class, 'update'])->name('update');
        Route::post('destroy', [DepartmentController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('subdepartment')->name('subdept.')->group(function () {
        Route::get('', [SubDepartmentController::class, 'index'])->name('index');
        Route::get('dt_subdept', [SubDepartmentController::class, 'dt_subdept'])->name('dt_subdept');
        Route::post('store', [SubDepartmentController::class, 'store'])->name('store');
        Route::post('edit', [SubDepartmentController::class, 'edit'])->name('edit');
        Route::post('update', [SubDepartmentController::class, 'update'])->name('update');
        Route::post('destroy', [SubDepartmentController::class, 'destroy'])->name('destroy');
    });

    //ruangan
    Route::prefix('ruangan')->name('ruang.')->group(function () {
        Route::get('', [RuanganController::class, 'index'])->name('index');
        Route::get('create', [RuanganController::class, 'create'])->name('create');
        Route::post('store', [RuanganController::class, 'store'])->name('store');
        Route::get('edit/{id}', [RuanganController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [RuanganController::class, 'update'])->name('update');
        Route::post('destroy', [RuanganController::class, 'destroy'])->name('destroy');
    });

    //jenis
    Route::prefix('jenis')->name('jenis.')->group(function () {
        Route::prefix('ruangan')->name('ruang.')->group(function () {
            Route::get('', [JenisRuanganController::class, 'index'])->name('index');
            Route::get('create', [JenisRuanganController::class, 'create'])->name('crate');
            Route::post('store', [JenisRuanganController::class, 'store'])->name('store');
            Route::get('edit/{id}', [JenisRuanganController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [JenisRuanganController::class, 'update'])->name('update');
            Route::post('destroy', [JenisRuanganController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('dp')->name('dp.')->group(function () {
            Route::get('', [JenisDpController::class, 'index'])->name('index');
            Route::get('create', [JenisDpController::class, 'create'])->name('crate');
            Route::post('store', [JenisDpController::class, 'store'])->name('store');
            Route::get('edit/{id}', [JenisDpController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [JenisDpController::class, 'update'])->name('update');
            Route::post('destroy', [JenisDpController::class, 'destroy'])->name('destroy');
        });
    });
    // syarat
    Route::prefix('syarat')->name('syarat.')->group(function () {
        Route::get('', [SyaratController::class, 'index'])->name('index');
        Route::prefix('ruangan')->name('ruang.')->group(function () {
            Route::get('', [SyaratJenisRuanganController::class, 'index'])->name('index');
            Route::get('create', [SyaratJenisRuanganController::class, 'create'])->name('crate');
            Route::post('store', [SyaratJenisRuanganController::class, 'store'])->name('store');
            Route::get('edit/{id}', [SyaratJenisRuanganController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [SyaratJenisRuanganController::class, 'update'])->name('update');
            Route::post('destroy', [SyaratJenisRuanganController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('dp')->name('dp.')->group(function () {
            Route::get('', [SyaratJenisDpController::class, 'index'])->name('index');
            Route::get('create', [SyaratJenisDpController::class, 'create'])->name('crate');
            Route::post('store', [SyaratJenisDpController::class, 'store'])->name('store');
            Route::get('edit/{id}', [SyaratJenisDpController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [SyaratJenisDpController::class, 'update'])->name('update');
            Route::post('destroy', [SyaratJenisDpController::class, 'destroy'])->name('destroy');
        });
    });

    //waktu
    Route::prefix('waktu')->name('waktu.')->group(function () {
        Route::get('', [WaktuPengukuranController::class, 'index'])->name('index');
    });

    //user
    Route::prefix('users')->name('user.')->group(function () {
        //Outstading User
        Route::prefix('outstanding')->name('outs.')->group(function () {
            Route::get('', [UserOutstandingController::class, 'index'])->name('index');
        });
        // Revisi user
        Route::prefix('revisi')->name('rev.')->group(function () {
            Route::get('', [UserRevisiController::class, 'index'])->name('index');
        });
    });
});