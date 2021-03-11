<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/libros', [App\Http\Controllers\HomeController::class, 'index'])->name('libros');
Route::get('/mislibros', [App\Http\Controllers\UserController::class, 'index'])->name('mis-libros');
Route::delete('/borrar/{libroId}', [App\Http\Controllers\UserController::class, 'borrar'])->name('borrar');


