<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NoticiaController;
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

Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
Route::get('/home', [BannerController::class, 'index'])->name('home');
Route::get('/home', [NoticiaController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EmpleadoController::class,'index'])->name('home');
    Route::get('/', [BannerController::class,'index'])->name('home');
    Route::get('/', [NoticiaController::class,'index'])->name('home');
});


