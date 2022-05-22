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

use App\Http\Controllers\VervoController;
Route::resource('vervo', VervoController::class);
Route::post('formExamen', [VervoController::class, 'formExamen'])->name('formExamen');
Route::get('formExamen', [VervoController::class, 'formExamen'])->name('formExamen');
Route::post('vervoRevisada', [VervoController::class, 'vervoRevisada'])->name('vervoRevisada');