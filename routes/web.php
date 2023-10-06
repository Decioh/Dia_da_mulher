<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssistidaController;

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
    return view('home');
});

Route::get('/',[AssistidaController::class, 'index'])->name('assistida.index');
Route::get('/cadastro',[AssistidaController::class, 'create'])->name('assistida.create');
Route::post('/cadastro/novo',[AssistidaController::class, 'store'])->name('assistida.store');