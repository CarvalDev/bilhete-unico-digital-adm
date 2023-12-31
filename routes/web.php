<?php

use App\Http\Controllers\CaixaEntradaController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\CatracaController;
use App\Http\Controllers\FaturamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinhasController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassageiroController;
use App\Http\Controllers\ReajusteController;

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

Route::post('/linhas/store',[LinhasController::class, 'store'])->name('linhas.store');
Route::delete("/carros/{id}", [CarroController::class,'destroy'])->name('carros.destroy');
Route::get('/home',[HomeController::class,'index'])->name('home.index');
Route::get('/passageiros',[PassageiroController::class, 'passageiroIndex'])->name('passageiros.index');
Route::get('/passageiros/form', [PassageiroController::class, 'form'])->name('passageiros.form');
Route::get('/linhas',[LinhasController::class, 'index'])->name('linhas.index');
Route::get('/linhas/register',[LinhasController::class, 'register'])->name('linhas.register');
Route::get('/caixaEntrada',[CaixaEntradaController::class, 'caixaIndex'])->name('caixaEntrada.index');
Route::get('/login',[LoginController::class, 'index'])->name('login.index');
Route::get('/reajuste',[ReajusteController::class, 'index'])->name('reajuste.index');
Route::get('/faturamento', [FaturamentoController::class, 'index'])->name('faturamento.index');
Route::get('/passageirosP/{id}/',[PassageiroController::class, 'perfilPassageiro'])->name('perfilPassageiro.index');
Route::get('/linhas/{id}/show', [LinhasController::class, 'show'])->name('linhas.show');
Route::post('/passageiros/store', [PassageiroController::class, 'store'])->name('passageiros.store');
Route::put('/linhas/{id}/update', [LinhasController::class, 'update'])->name('linhas.update');
Route::get('passageiros/AddBilhete/{id}', [PassageiroController::class, 'addBilhete'])->name('passageiros.addBilhete');
Route::post('passageiros/{id}/bilhetes/store', [PassageiroController::class, 'bilheteStore'])->name('passageiros.bilhetes.store');




 
