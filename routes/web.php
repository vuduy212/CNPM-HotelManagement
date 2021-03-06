<?php

use App\Http\Controllers\RoomBillController;
use App\Http\Controllers\RoomCategoriesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomStatusController;
use App\Http\Controllers\UserController;
use App\Models\RoomBill;
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
Route::get('/denies', [App\Http\Controllers\HomeController::class, 'denies'])->name('denies');

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
        Route::get('/{roomCategories}', [$class, 'show'])->name('show');
        Route::put('/{roomCategories}', [$class, 'update'])->name('update');
        Route::delete('/{roomCategories}', [$class, 'destroy'])->name('destroy');
        Route::get('/{roomCategories}/edit', [$class, 'edit'])->name('edit');
        Route::get('/{roomCategories}/select', [$class, 'SelectCategoryOrder'])->name('select');
    });

    /*------ Route Room ------*/
    Route::prefix('rooms')->name('rooms.')->group(function () {
        $class = RoomController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{room}', [$class, 'show'])->name('show');
        Route::put('/{room}', [$class, 'update'])->name('update');
        Route::delete('/{room}', [$class, 'destroy'])->name('destroy');
        Route::get('/{room}/edit', [$class, 'edit'])->name('edit');
    });

    /*------ Route Room's status ------*/
    Route::prefix('status')->name('status.')->group(function () {
        $class = RoomStatusController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{roomStatus}', [$class, 'show'])->name('show');
        Route::put('/{roomStatus}', [$class, 'update'])->name('update');
        Route::delete('/{roomStatus}', [$class, 'destroy'])->name('destroy');
        Route::get('/{roomStatus}/edit', [$class, 'edit'])->name('edit');
    });

    /*------ Route Room's order ------*/
    Route::prefix('bills')->name('bills.')->group(function () {
        $class = RoomBillController::class;
        Route::get('/', [$class, 'index'])->name('index');
        Route::get('/create', [$class, 'create'])->name('create');
        Route::post('/', [$class, 'store'])->name('store');
        Route::get('/{roomBill}', [$class, 'show'])->name('show');
        Route::put('/{roomBill}', [$class, 'update'])->name('update');
        Route::delete('/{roomBill}', [$class, 'destroy'])->name('destroy');
        Route::get('/{roomBill}/edit', [$class, 'edit'])->name('edit');
    });
});
