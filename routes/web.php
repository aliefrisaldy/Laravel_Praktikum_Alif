<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    
    Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
    Route::get('/majors/create', [MajorController::class, 'create'])->name('majors.create');
    Route::get('/majors/{id}', [MajorController::class, 'show'])->name('majors.show');
    Route::get('/majors/{id}/edit', [MajorController::class, 'edit'])->name('majors.edit');  
    Route::put('/majors/{id}', [MajorController::class, 'update'])->name('majors.update');       
    Route::delete('/majors/{id}', [MajorController::class, 'destroy'])->name('majors.destroy');
    Route::post('/majors', [MajorController::class, 'store'])->name('majors.store');
    });

// // Basic route
// Route::get('/students', function () {
//     return 'Students data...';
// });

// // Redirect route
// Route::redirect('/redirect', '/students');

// // Named route
// Route::get('/students/create', function () {
//     return 'Create student data';
// })->name('students.create');

// // Route with parameter
// Route::get('/students/{id}', function ($id) {
//     return 'Student ID: '.$id;
// });

// // connect to controller
// Route::get('/students', [StudentController::class, 'index']);
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::get('/students/{id}', [StudentController::class, 'show']);

// // neasted route
// Route::prefix('students')->group(function () {
//     Route::get('/', [StudentController::class, 'index']); // Menampilkan daftar siswa
//     Route::get('/create', [StudentController::class, 'create'])->name('students.create'); // Form tambah siswa
//     Route::get('/{id}', [StudentController::class, 'show']); // Menampilkan detail siswa
// });