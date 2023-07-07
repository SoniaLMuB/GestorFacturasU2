<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\BuscarFacturaController;
use App\Http\Controllers\EmpresaEmisoraController;
use App\Http\Controllers\EmpresaReceptoraController;

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

Route::get('/',[BuscarController::class,'index']);

//Ruta paa login
Route::get('/login',[LoginController::class,'index'])->name("login");

//Ruta de validación de login
Route::post('/login',[LoginController::class,'store']);

//Ruta de Logout
Route::get('/logout',[LogoutController::class,'store'])->name("logout"); 

//Ruta para mostrar el dashboard del usuario autenticado con userrname en URL, se agrega al final para 
Route::get('/dashboard',[PostController::class,'index'])->name("post.index");
//Ruta para el form de la empresa
Route::get('/RegistrandoEmpresaEmisora',[EmpresaEmisoraController::class,'index'])->name("emisora.index");
//Ruta para uardar datos
Route::post('/RegistrandoEmpresaEmisora',[EmisoraController::class,'store'])->name("emisora.store");
//Ruta para la vista de la tabla de las empresas emisoras
Route::get('/visualizarempresas',[EmpresaEmisoraController::class,'show'])->name("emisora.show");
//RUta para el form
Route::get('/RegistrandoEmpresaReceptora',[EmpresaReceptoraController::class,'index'])->name("receptora.index");
//ruta para guardar datos
Route::post('/RegistrandoEmpresaReceptora',[EmpresaReceptoraController::class,'store'])->name("receptora.store");
//Ruta para la vista de la tabla de las empresas receptoras
Route::get('/visualizarempresasREceptora',[EmpresaReceptoraController::class,'show'])->name("receptora.show");
//Ruta para dirigir alformulario de factura
Route::get('/Facturas/form',[FacturaController::class,'index'])->name("facturas.index");
//Ruta para registrar factura
Route::post('/Registrando',[FacturaController::class,'store'])->name("facturas.store");
//Ruta para la vista de la tabla de las facturas
Route::get('/Ver/facturas',[FacturaController::class,'show'])->name("facturas.show");
//Ruta para poder guardar los archivos de las facturas
Route::post('/facturas/pdf',[FacturaController::class,'storePdf'])->name("facturas.pdf");
Route::post('/facturas/xml',[FacturaController::class,'storeXml'])->name("facturas.xml");
//Ruta para descargar los archivos de la tabla
Route::get('/download/{file}',[FacturaController::class,'descargar'])->name('facturas.download');
//Ruta para buscar factura
Route::post('/buscarFactura',[BuscarFacturaController::class,'buscar'])->name('facturas.buscar');