<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function(){

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('roles')->group(function () {
        Route::get('create', [RolesController::class, 'create'])->name('create-roles');
        Route::post('store', [RolesController::class, 'store'])->name('store-roles');
        Route::get('list', [RolesController::class, 'list'])->name('list-roles');
        Route::get('edit/{id}', [RolesController::class, 'edit'])->name('edit-roles');
        Route::post('update/{id}', [RolesController::class, 'update'])->name('update-roles');
        Route::get('delete/{id}', [RolesController::class, 'delete'])->name('delete-roles');
    });

    Route::prefix('users')->group(function () {
        Route::get('create', [UserController::class, 'create'])->name('create-user');
        Route::post('store', [UserController::class, 'store'])->name('store-user');
        Route::get('list', [UserController::class, 'list'])->name('list-user');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit-user');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update-user');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete-user');
    });
});

Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('post-login', [AuthController::class, 'Login'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registerView'])->name('register');
Route::post('post-registration', [AuthController::class, 'Registration'])->name('register.post'); 

