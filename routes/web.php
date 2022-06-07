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


Route::get('/', [EventController::class, 'index']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); // indicando qual controller será acionado a partir da requisição dessa rota
Route::get('/events/{id}', [EventController::class, 'show']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::post('/events', [EventController::class, 'store']); 

Route::get('/contact', [ContactController::class, 'index']); // indicando qual controller será acionado a partir da requisição dessa rota
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
