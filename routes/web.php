<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepamentController;
use App\Http\Controllers\Admin\listUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin',  [AdminController::class, 'adminPage'])->name('admin.home');

    // Department module..
    Route::get('/make-department',  [AdminController::class, 'makeDepartment'])->name('admin.makeDepartment');
    Route::post('/make-department',  [DepamentController::class, 'createDepartment'])->name('admin.createDepartment');
    Route::get('/edit-department/{id}',  [AdminController::class, 'editDepartment'])->name('admin.editDepartment');
    Route::post('/edit-department',  [DepamentController::class, 'updateDepartment'])->name('admin.updateDepartment');
    Route::get('/list-departments',  [DepamentController::class, 'listDepartments'])->name('admin.listDepartments');
    Route::get('/delete-department/{id}',  [DepamentController::class, 'deleteDepartment'])->name('admin.deleteDepartment');

    //User module..
    Route::get('/list-Admins', [listUserController::class, 'listAdmin'])->name('admin.listAdmins');
    Route::get('/list-users', [listUserController::class, 'listUser'])->name('admin.listUsers');
    Route::get('/edit-user/{id}', [listUserController::class, 'editUser'])->name('admin.editUser');
    Route::post('/update-user', [listUserController::class, 'updateUser'])->name('admin.updateUser');
    Route::get('/delete-user/{id}', [listUserController::class, 'deleteUser'])->name('admin.deleteUser');

    //Complaints module..
    Route::get('/complaints', [ComplaintController::class, 'Complaints'])->name('admin.Complaints');
    Route::get('/solved-complaints', [ComplaintController::class, 'SolvedComplaints'])->name('admin.SolvedComplaints');

    // User routes
});


Route::middleware(['auth.user'])->group(function () {
    Route::get('/', [UserController::class , 'index'])->name('user.home');
    Route::get('/make-complaint', [ComplaintController::class , 'makeComplaint'])->name('user.makeComplaint');
    Route::post('/make-complaint', [ComplaintController::class , 'addComplaint'])->name('user.addComplaint');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth.not'])->group(function () {
    // Get Routes
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    // Post Routes
    Route::post('/register', [AuthController::class, 'create'])->name('register.post');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/verify-otp/{u_id}', [AuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::post('/verify-otp/{u_id}', [AuthController::class, 'verifyOtpPost'])->name('verify.otp.post');

});
