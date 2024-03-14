<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\RegisterationController;
use App\Http\Controllers\Account\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Visitor\VisitorController;
use App\Http\Controllers\Reception\ReceptionController;
use App\Http\Controllers\Account\LogoutController;
use App\Http\Controllers\Admin\ManageArtworksController;
use App\Http\Controllers\Admin\ManageVisitorsController;

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

Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/artworks/index', [ManageArtworksController::class, 'index'])->name('admin.artworks.index');
Route::get('/admin/artworks/new', [ManageArtworksController::class, 'create'])->name('admin.artworks.new');
Route::post('/admin/artworks/new', [ManageArtworksController::class, 'store']);

Route::get('/admin/visitors/index', [ManageVisitorsController::class, 'index'])->name('admin.visitors.index');
Route::put('/admin/visitors/{id}/edit', [ManageVisitorsController::class, 'update'])->name('admin.visitor.edit');
Route::delete('/admin/visitors/{id}', [ManageVisitorsController::class, 'destroy'])->name('admin.visitor.delete');

Route::get('/home', [VisitorController::class, 'index'])->name('visitor.home');

Route::get('/reception/home', [ReceptionController::class, 'index'])->name('reception.home');



Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'role:admin'], function () {
        // Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

    });
    Route::group(['middleware' => 'role:visitor'], function () {});
    Route::group(['middleware' => 'role:reception'], function () {});

});
