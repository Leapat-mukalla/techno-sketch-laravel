<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\RegisterationController;
use App\Http\Controllers\Account\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Visitor\VisitorController;
use App\Http\Controllers\Account\LogoutController;
use App\Http\Controllers\Admin\ManageArtworksController;
use App\Http\Controllers\Admin\ManageVisitorsController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'index'])->name('landing.page');
Route::get('/status', [HomeController::class, 'status'])->name('status.page');

Route::get('/register', [RegisterationController::class, 'index'])->name('register');
Route::post('/register', [RegisterationController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/admin/artworks/index', [ManageArtworksController::class, 'index'])->name('admin.artworks.index');
        Route::get('/admin/artworks/new', [ManageArtworksController::class, 'create'])->name('admin.artworks.new');
        Route::post('/admin/artworks/new', [ManageArtworksController::class, 'store']);
        Route::delete('admin/artworks/{id}', [ManageArtworksController::class, 'destroy'])->name('admin.artworks.delete');
        Route::put('/admin/artworks/{id}/edit', [ManageArtworksController::class, 'update'])->name('admin.artwork.edit');

        Route::get('/admin/visitors/index', [ManageVisitorsController::class, 'index'])->name('admin.visitors.index');
        Route::put('/admin/visitors/{id}/edit', [ManageVisitorsController::class, 'update'])->name('admin.visitor.edit');
        Route::delete('/admin/visitors/{id}', [ManageVisitorsController::class, 'destroy'])->name('admin.visitor.delete');
        Route::post('/admin/events/new',[AdminController::class, 'store'])->name('admin.events.new');
        Route::put('/admin/events/edit/{id}', [AdminController::class, 'update'])->name('admin.events.edit');
        Route::delete('/admin/events/delete/{id}', [AdminController::class, 'destroy'])->name('admin.events.delete');


    });
    Route::group(['middleware' => 'role:visitor'], function () {
        Route::get('/home', [VisitorController::class, 'index'])->name('visitor.home');
        Route::get('/getArtworkDetails', [VisitorController::class, 'getArtworkDetails'])->name('getArtworkDetails');
        Route::get('/artworks/{id}', [VisitorController::class, 'show'])->name('artworks.show');
        Route::post('/toggleLikeArtwork', [VisitorController::class, 'toggleLikeArtwork'])->name('toggleLikeArtwork');

    });

});
