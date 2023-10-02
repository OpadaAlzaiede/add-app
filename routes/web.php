<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\AddController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\Admin\AdminAddController;
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

Route::get('/', function () {return view('welcome');})->name('/');

Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {

    Route::middleware('IsActiveAccount')->group(function() {
        Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('adds', [AddController::class, 'index'])->name('adds');
        Route::get('adds/create', [AddController::class, 'create'])->name('adds.create');
        Route::post('adds', [AddController::class, 'store'])->name('adds.store');
        Route::get('adds/{id}', [AddController::class, 'show'])->name('adds.view');
        Route::put('adds/update', [AddController::class, 'update'])->name('adds.update');
        Route::post('adds/publish', [AddController::class, 'publish'])->name('adds.publish');
        Route::post('adds/unpublish', [AddController::class, 'unpublish'])->name('adds.unpublish');

        Route::post('comments', CommentController::class);
    });


    Route::prefix('admin')->middleware('isAdmin')->group(function() {
        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        Route::post('/users/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::post('/users/deactivate', [UserController::class, 'deActivate'])->name('users.deactivate');

        Route::get('adds', [AdminAddController::class, 'index'])->name('admin.adds');
        Route::get('adds/{id}', [AdminAddController::class, 'show'])->name('admin.adds.view');
        Route::delete('/adds/delete', [AdminAddController::class, 'destroy'])->name('adds.delete');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});
