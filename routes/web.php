<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; //untuk menjalankan fungsi-fungsi pada StudentController
use App\Http\Controllers\UserController;


//file ini digunakan untuk menjalankan routes 
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

Route::resource('students', StudentController::class); //untuk menjalankan fungsi-fungsi pada StudentController

Route::resource('user', UserController::class);

Route::get('/search', [StudentController::class, 'search'])->name('search');

Route::get('students/{id}/detail', [StudentController::class, 'detail']);

Route::get('/students/{id}/report', [StudentController::class, 'report']);