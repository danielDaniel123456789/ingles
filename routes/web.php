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
Route::get('voz', function () {    return view('voz/index');});
Route::get('/', function () {    return view('welcome');});
Route::get('ejemplo1', function () {    return view('ejemplo1');});
Route::get('plantilla2', function () {    return view('plantilla2');});
Route::get('plantilla3', function () {    return view('plantilla3');});
Route::get('/configuracion', function () {    return view('configuracion/configuracion');});
Route::get('/sobre', function () {    return view('sobre/index');});
Auth::routes();

Route::get('extencion', function () {    return view('cliente/extencion');});
Route::get('predeterminado', function () {    return view('cliente/predeterminado');});
Route::get('instalar', function () {    return view('cliente/instalar');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\VervoController;
Route::get('/insertarVervo', function () {  return view('vervos/insertarVervo');});

Route::resource('vervo', VervoController::class);
Route::get('vista', [VervoController::class, 'vista'])->name('vista');
Route::get('listaVervosTerminada', function () {    return view('listaVervosTerminada');});
Route::post('formExamen', [VervoController::class, 'formExamen'])->name('formExamen');
Route::get('formExamen', [VervoController::class, 'formExamen'])->name('formExamen');
Route::get('evaluacion', [VervoController::class, 'evaluacion'])->name('evaluacion');


Route::get('informe', [VervoController::class, 'informe'])->name('informe');
Route::get('historial', [VervoController::class, 'historial'])->name('historial');
Route::post('vervoRevisada', [VervoController::class, 'vervoRevisada'])->name('vervoRevisada');
Route::post('insertarVervo', [VervoController::class, 'insertarVervo'])->name('insertarVervo');
Route::post('reiniciarVervosDesde0', [VervoController::class, 'reiniciarVervosDesde0'])->name('reiniciarVervosDesde0');
Route::post('bajarNivelVervo', [VervoController::class, 'bajarNivelVervo'])->name('bajarNivelVervo');
Route::post('subirNivelVervo', [VervoController::class, 'subirNivelVervo'])->name('subirNivelVervo');

Route::post('evaluacionBajarNivelVervo', [VervoController::class, 'evaluacionBajarNivelVervo'])->name('evaluacionBajarNivelVervo');
Route::post('evaluacionSubirNivelVervo', [VervoController::class, 'evaluacionSubirNivelVervo'])->name('evaluacionSubirNivelVervo');


Route::get('demoVervo', [VervoController::class, 'demoVervo'])->name('demoVervo');




use App\Http\Controllers\AprendidaController;
Route::post('formAprendida', [AprendidaController::class, 'formAprendida'])->name('formAprendida');

Route::post('repasarPalabra', [AprendidaController::class, 'repasarPalabra'])->name('repasarPalabra');

//administrador

use App\Http\Controllers\CategoriaController;
Route::get('categorias', [CategoriaController::class, 'categorias'])->name('categorias');
Route::get('nuevaCategoria', function () {    return view('categoria/agregar');});
Route::get('categorias', [CategoriaController::class, 'categorias'])->name('categorias');
Route::post('nuevaCategoria', [CategoriaController::class, 'nuevaCategoria'])->name('nuevaCategoria');
Route::post('modificarCategoria', [CategoriaController::class, 'modificarCategoria'])->name('modificarCategoria');


use App\Http\Controllers\ImagenFondoController;
Route::get('imagenFondo', [ImagenFondoController::class, 'imagenFondo'])->name('imagenFondo');
Route::post('eliminarImagenFondo', [ImagenFondoController::class, 'eliminarImagenFondo'])->name('eliminarImagenFondo');
Route::post('insertarImagenFondo', [ImagenFondoController::class, 'insertarImagenFondo'])->name('insertarImagenFondo');


use App\Http\Controllers\VozController;
Route::post('actualizarVoz', [VozController::class, 'actualizarVoz'])->name('actualizarVoz');
Route::get('configurarVoz', [VozController::class, 'configurarVoz'])->name('configurarVoz');
Route::get('configuracion', [VozController::class, 'configuracion'])->name('configuracion');
//Route::get('/configuracion', function () {    return view('configuracion/configuracion');});