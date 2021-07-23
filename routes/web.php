<?php

use App\Http\Controllers\CapacitacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DireccionController;

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

Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/capacitacion', function () {
    return view('Capacitacion.index');
});

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/usuario', function () {
    return view('usuario.index');
});

Route::get('/usuario/create', [EmpleadoController::class,'create']);
*/

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('capacitacion', CapacitacionController::class)->middleware('auth');
Route::resource('direccion', DireccionController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::post('login',function(){
    $credentials = request()->only('email','password');

    $remember = request()->filled('remember');

    if (Auth::attempt($credentials,$remember)){
        request()->session()->regenerate();

        return redirect('home');
    }
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
