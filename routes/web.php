<?php

use App\Http\Controllers\ContratoController;
use App\Http\Controllers\CuartoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InquilinoController;
use App\Http\Controllers\OtroReciboController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Models\ReciboAlquiler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'mostrar'])->name('home');
Route::get('/principal', [HomeController::class, 'mostrar'])->name('principal');

//cuarto
Route::get('/cuarto', [CuartoController::class, 'index'])->name('mostrar_cuarto');
Route::post('/cuarto-register', [CuartoController::class, 'store']);
Route::get('/cuartos/edit/{id}', [CuartoController::class, 'edit']);
Route::put('/cuarto-update/{id}', [CuartoController::class, 'update']);

//inquilino
Route::get('/inquilino', [InquilinoController::class, 'index'])->name('mostrar_inquilino');
Route::post('/inquilino-register', [InquilinoController::class, 'store']);
Route::get('/inquilinos/edit/{id}', [InquilinoController::class, 'edit']);
Route::put('/inquilin-update/{id}', [InquilinoController::class, 'update']);

//imagen
Route::delete('/imagenes/delete/{id}', [ImagenController::class, 'destroy']);
Route::get('/cuartos/{cuartoId}/imagenes', [CuartoController::class, 'getImagenes']);


//ruta para Servicio
Route::post('agregar-servicio', [ServicioController::class, 'store'])->middleware('auth')->name('agregarDelito');
Route::get('servicio', [ServicioController::class, 'index'])->name('mostrar_servicio');
Route::put('servicio/update/{id}', [ServicioController::class, 'update'])->name('actualizar_servicio');
Route::get('servicio/edit/{id}', [ServicioController::class, 'edit'])->name('editar_servicio');


//contrato
Route::get('/contrato', [ContratoController::class, 'index'])->name('mostrar_contrato');
Route::post('/contrato-register', [ContratoController::class, 'store'])->name('contrato_register');
Route::get('/contratos/edit/{id}', [ContratoController::class, 'edit']);
Route::put('/contrato-update/{id}', [ContratoController::class, 'update']);

Route::get('/contratos', [ContratoController::class, 'mostrarContratos'])->name('mostrar_contratos');
//PDF CONTRATO
Route::get('Contrato/{id}/pdf', [ContratoController::class, 'generarPDF'])->name('contratoPDF.pdf');


//recibo inquilino
Route::get('/recibo', [ReciboController::class, 'index'])->name('mostrar_recibo');
Route::post('/recibo-register', [ReciboController::class, 'store'])->name('resgistrar_recibo');
Route::get('/recibos/edit/{id}', [ReciboController::class, 'edit']);
Route::put('/recibo-update/{id}', [ReciboController::class, 'update']);
Route::get('/Recibos', [ReciboController::class, 'mostrarRecibos'])->name('mostrar_recibos');
//pagar recibo
Route::post('/actualizar-pago', [ReciboController::class, 'actualizarPago'])->name('actualizar_pago');


//hacer recibo para un contrato
Route::get('/Recibo/{id}/Contrato', [ReciboController::class, 'create'])->name('recibo');
//ver detalle de un recibo
Route::get('/ReciboDetalle/{id}', [ReciboController::class, 'detalle'])->name('Detalle_recibo');


//otro recibos
Route::post('/otroRecibo/Registrar', [OtroReciboController::class, 'otroRecibo'])->name('Otro_Recibo');
Route::get('/Otro/recibos/edit/{id}', [OtroReciboController::class, 'edit']);
Route::put('/Otro/recibo-update/{id}', [OtroReciboController::class, 'update']);
Route::get('/Otro/Recibos', [OtroReciboController::class, 'mostrarRecibos'])->name('mostrar_Otrosrecibos');
//pdf Otrorecibo
Route::get('Otrorecibo/{id}/pdf', [OtroReciboController::class, 'generarPDF'])->name('Otrorecibo.pdf');

//ver detalle de Otrorecibo
Route::get('/OtroReciboDetalle/{id}', [OtroReciboController::class, 'detalle'])->name('Detalle_Otrorecibo');

//pdf recibo
Route::get('recibo/{id}/pdf', 'App\Http\Controllers\ReciboController@generarPDF')->name('recibo.pdf');




//reserva
//contrato
Route::get('/reserva', [ReservaController::class, 'index'])->name('mostrar_reserva');
Route::post('/reserva-register', [ReservaController::class, 'store'])->name('reserva_register');
Route::get('/reservas/edit/{id}', [ReservaController::class, 'edit']);
Route::put('/reserva-update/{id}', [ReservaController::class, 'update']);

Route::get('/Reservas', [ReservaController::class, 'mostrar'])->name('mostrar_reservas');

//ver detalle de una reserva
Route::get('/ReservasDetalle/{id}', [ReservaController::class, 'detalle'])->name('Detalle_reserva');


//perfil
Route::get('/Perfil', [PerfilController::class, 'index'])->name('mostrar_perfil');
//calendario
Route::get('/Calendario', [PerfilController::class, 'calendario'])->name('mostrar_calendario');


