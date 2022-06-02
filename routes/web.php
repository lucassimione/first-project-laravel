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
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [EventController::class, 'index']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::get('/events/create', [EventController::class, 'create']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::get('/contact', [ContactController::class, '__construct']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::get('/products', [ProductController::class, 'exibirProdutos']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::get('/product/{id}', [ProductController::class, 'exibirProduto']); // indicando qual controller será acionado a partir da requisição dessa rota
