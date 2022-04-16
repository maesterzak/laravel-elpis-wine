<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WineController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ->middleware('auth');

// Route::view('/', 'index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index2']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('tag', [TagController::class, 'index'])->middleware('auth');
Route::post('category', [CategoryController::class, 'index'])->middleware('auth');
Route::post('wine', [WineController::class, 'index']);

Route::get('edit/{id}', [WineController::class, 'edit'])->middleware('auth');
Route::post('update', [WineController::class, 'update'])->middleware('auth');

Route::get('delete/{id}', [WineController::class, 'delete'])->middleware('auth');;
