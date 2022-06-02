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

Route::get('/', function () {
    $nome = 'Lucas Rodrigues Simione';
    $arr = ['Lucas', 'Felipe', 'Maiker'];

    return view('welcome', 
        ['nome' => $nome, 
        'arr' => $arr
        ]);
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/produto', function () {
    return view('product');
});

