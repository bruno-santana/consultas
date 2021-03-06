<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\BeneficiariosController;

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
/*
Route::get('/', function () {
    return view('home');
});
*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/documentos/list', [DocumentoController::class, 'list'])->name('documentos.list');
Route::get('/documentos/show/{id}', [DocumentoController::class, 'show'])->name('documentos.show');
Route::get('/pagamentos/show', [PagamentosController::class, 'show'])->name('pagamentos.show');
Route::get('/beneficiarios/show', [BeneficiariosController::class, 'show'])->name('beneficiarios.show');

