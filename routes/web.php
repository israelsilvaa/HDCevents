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
    return view('welcome');
});

Route::get('/produtos', function () {
    
    $busca  = request('search');

    return view('produtos', ['busca' => $busca]);

});

Route::get('/produto_teste/{id?}', function ($id = 1) {
    
    return view('produto', ['id' => $id ]);
});
