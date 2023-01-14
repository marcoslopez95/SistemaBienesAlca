<?php

use App\Http\Controllers\BienNacionalyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartamentController;
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

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('login',function(){
    return view('auth.login');
});

Route::resource('categoria', CategoryController::class);
Route::resource('sub-categoria', SubCategoryController::class);
Route::resource('departamento', DepartamentController::class);

Route::resource('bienes-nacionales', BienNacionalyController::class);
