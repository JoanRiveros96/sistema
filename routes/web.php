<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\ColegioController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AdmisionController;
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
    return view('auth.login');
});
/*Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('empleado/create',[EmpleadoController::class,'create']);
*/
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('banner', BannerController::class)->middleware('auth');
Route::resource('noticia', NoticiaController::class)->middleware('auth');
Route::resource('comunicado', ComunicadoController::class)->middleware('auth');
Route::resource('social', SocialController::class)->middleware('auth');
Route::resource('footer', FooterController::class)->middleware('auth');
Route::resource('historia', HistoriaController::class)->middleware('auth');
Route::resource('colegio', ColegioController::class)->middleware('auth');
Route::resource('plataforma', PlataformaController::class)->middleware('auth');
Route::resource('cuenta', CuentaController::class)->middleware('auth');
Route::resource('egresado', EgresadoController::class)->middleware('auth');
Route::resource('evento', EventoController::class)->middleware('auth');
Route::resource('admision', AdmisionController::class)->middleware('auth');

Auth::routes();

// Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EmpleadoController::class,'index']);
    Route::get('/home', [BannerController::class,'index'])->name('home');
    Route::get('/', [NoticiaController::class,'index']);
    Route::get('/', [ComunicadoController::class,'index']);
    Route::get('/', [SocialController::class,'index']);
    Route::get('/', [FooterController::class,'index']);
    Route::get('/', [HistoriaController::class,'index']);
    Route::get('/', [ColegioController::class,'index']);
    Route::get('/', [PlataformaController::class,'index']);
    Route::get('/', [CuentaController::class,'index']);
    Route::get('docs/{id}/download', [CuentaController::class, 'download'])->name('docs.download');
    Route::get('/', [EgresadoController::class,'index']);
    Route::get('/', [EventoController::class,'index']);
    Route::get('/', [AdmisionController::class,'index']);
    

});


