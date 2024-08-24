<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\MahasiswaOnly;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/register-{role}', [AuthController::class, 'register'])->name('register');
// Route::post('/register-mahasiswa', [AuthController::class, 'registerMahasiswa'])->name('register.mahasiswa');
Route::get('/page-register', [AuthController::class, 'pageRegister'])->name('page.register');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'updateProfile'])->name('profile.update');

Route::middleware([AdminOnly::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin.index');
    Route::get('/admin/detail-user/{id}', [AdminController::class, 'detailUserPage'])->name('admin.user.detail.page');
    Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUserPage'])->name('admin.user.edit.page');
    Route::put('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
    
    Route::get('/admin/pendaftar', [AdminController::class, 'adminPendaftar'])->name('admin.index.pendaftar');
});

Route::middleware([MahasiswaOnly::class])->group(function(){
    Route::get('/mahasiswa', [MahasiswaController::class, 'mahasiswaIndex'])->name('mahasiswa.index');
});
