<?php

use App\Http\Controllers\RoomCategoriesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomStatusController;
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

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------ Admin ------*/
Route::prefix('admin')->middleware('auth')->group(function () {

    /*------ Route Users ------*/
    Route::prefix('users')->name('users.')->group(function () {
        $class = UserController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{user}', [$class, 'show'])->name('show');
        Route::put('/{user}', [$class, 'update'])->name('update');
        Route::delete('/{user}', [$class, 'destroy'])->name('destroy');
        Route::get('/{user}/edit', [$class, 'edit'])->name('edit');
    });

    /*------ Route RoomCategory ------*/
    Route::prefix('categories')->name('categories.')->group(function () {
        $class = RoomCategoriesController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{user}', [$class, 'show'])->name('show');
        Route::put('/{user}', [$class, 'update'])->name('update');
        Route::delete('/{user}', [$class, 'destroy'])->name('destroy');
        Route::get('/{user}/edit', [$class, 'edit'])->name('edit');
    });

    /*------ Route Room ------*/
    Route::prefix('rooms')->name('rooms.')->group(function () {
        $class = RoomController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{user}', [$class, 'show'])->name('show');
        Route::put('/{user}', [$class, 'update'])->name('update');
        Route::delete('/{user}', [$class, 'destroy'])->name('destroy');
        Route::get('/{user}/edit', [$class, 'edit'])->name('edit');
    });

    /*------ Route Room's status ------*/
    Route::prefix('status')->name('status.')->group(function () {
        $class = RoomStatusController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{user}', [$class, 'show'])->name('show');
        Route::put('/{user}', [$class, 'update'])->name('update');
        Route::delete('/{user}', [$class, 'destroy'])->name('destroy');
        Route::get('/{user}/edit', [$class, 'edit'])->name('edit');
    });
});
