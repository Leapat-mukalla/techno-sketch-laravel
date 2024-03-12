<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\RegisterationController;
use App\Http\Controllers\Account\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Visitor\VisitorController;
use App\Http\Controllers\Reception\ReceptionController;

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

Route::get('/register', [RegisterationController::class, 'index'])->name('register');
Route::post('/register', [RegisterationController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

Route::get('/home', [VisitorController::class, 'index'])->name('visitor.home');

Route::get('/reception/home', [ReceptionController::class, 'index'])->name('reception.home');



Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'role:admin'], function () {
        // Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

    });
    Route::group(['middleware' => 'role:visitor'], function () {});
    Route::group(['middleware' => 'role:reception'], function () {});

});
