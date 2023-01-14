<?php

use App\Http\Controllers\BienNacionalyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubCategoryController;
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


Route::middleware(['guest'])->group(function () {
    Route::get('login',[LoginController::class,'view'])->name('login');
    Route::post('login',[LoginController::class,'login'])->name('login-store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
    Route::resource('categoria', CategoryController::class);
    Route::resource('subcategoria', SubCategoryController::class);
    Route::resource('departamento', DepartamentController::class);

    Route::resource('bienes-nacionales', BienNacionalyController::class)->except('update');
    Route::post('bienes-nacionales/{bienes_nacionale}', [BienNacionalyController::class,'update'])->name('bienes-nacionales.update');
});
