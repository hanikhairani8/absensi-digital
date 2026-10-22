<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QrCodeController; // 1. Import QrCodeController

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Kelas
    Route::resource('class-rooms', ClassRoomController::class);

    // CRUD Siswa
    Route::resource('students', StudentController::class);

    // Fitur Absensi
    Route::get('/attendance/scan', [AttendanceController::class, 'scan'])->name('attendance.scan');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

    // Fitur QR Code
    Route::get('/generate-qr', [QrCodeController::class, 'index'])->name('qrcode.index'); // 2. Tambah Route QR Code

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';