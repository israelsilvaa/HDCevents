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
    $email = "coticproeg@gmail.com";
    $telefone = 9132017909;
    $array = [10,25,36,44,59];
    $nomes = ["Rafael","Carol","Tácio","Fabio","Israel","Diego","Fabian"];

    return view('produtos',
        [
        'chaveEmail'=> $email,
        'chaveTelefone' => $telefone,
        'chaveArray' => $array,
        'chaveNomes' => $nomes
        ]);
});
