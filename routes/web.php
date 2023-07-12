<?php

use App\Http\Controllers\BuscarFacturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EmisoraController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ReceptoraController;

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

Route::get('/',[BuscarFacturaController::class,'index'])->name("principal");
//Ruta paa login
Route::get('/login',[LoginController::class,'index'])->name("login");

//Ruta de validación de login
Route::post('/login',[LoginController::class,'store']);

//Ruta de Logout
Route::get('/logout',[LogoutController::class,'store'])->name("logout"); 

//Ruta para mostrar el dashboard del usuario autenticado con userrname en URL, se agrega al final para 
Route::get('/dashboard',[PostController::class,'index'])->name("post.index");
//Ruta para el form de la empresa
Route::get('/RegistrandoEmpresaEmisora',[EmisoraController::class,'index'])->name("emisora.index");
//Ruta para uardar datos
Route::post('/RegistrandoEmpresaEmisora',[EmisoraController::class,'store'])->name("emisora.store");
//Ruta para la vista de la tabla de las empresas emisoras
Route::get('/visualizarempresas',[EmisoraController::class,'show'])->name("emisora.show");
//ruta para eliminar emisora
Route::delete('/Emisora/{id}', [EmisoraController::class, 'delete'])->name('emisora.delete');
//RUta para el form
Route::get('/RegistrandoEmpresaReceptora',[ReceptoraController::class,'index'])->name("receptora.index");
//ruta para guardar datos
Route::post('/RegistrandoEmpresaReceptora',[ReceptoraController::class,'store'])->name("receptora.store");
//Ruta para la vista de la tabla de las empresas receptoras
Route::get('/visualizarempresasREceptora',[ReceptoraController::class,'show'])->name("receptora.show");
//ruta para eliminar empresa receptora 
Route::delete('/Receptora/{id}', [ReceptoraController::class, 'delete'])->name('receptora.delete');
//Ruta para dirigir alformulario de factura
Route::get('/Facturas/form',[FacturaController::class,'index'])->name("factura.index");
//Ruta para registrar factura
Route::post('/Registrando',[FacturaController::class,'store'])->name("factura.store");
//Ruta para la vista de la tabla de las facturas
Route::get('/Ver/facturas',[FacturaController::class,'show'])->name("factura.show");
//Ruta para poder guardar los archivos de las facturas
Route::post('/facturas/pdf',[FacturaController::class,'storePdf'])->name("factura.pdf");
Route::post('/facturas/xml',[FacturaController::class,'storeXml'])->name("factura.xml");
//ruta para eliminar factura 
Route::delete('/Facturas/{id}', [FacturaController::class, 'delete'])->name('factura.delete');

//Ruta para descargar los archivos de la tabla de Facturas
Route::get('/descargarArchivo/{file}',[FacturaController::class,'descargar'])->name('factura.descargar');
//Ruta para buscar factura
Route::post('/buscarFactura',[BuscarFacturaController::class,'buscar'])->name('factura.buscar');
