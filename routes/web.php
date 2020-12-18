<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');


Route::resource('students', App\Http\Controllers\StudentController::class);

Route::resource('sessions', App\Http\Controllers\SessionController::class);

Route::resource('grades', App\Http\Controllers\GradeController::class);

Route::resource('batches', App\Http\Controllers\BatchController::class);