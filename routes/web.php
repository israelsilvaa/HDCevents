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

// GET:     pegar dados de busca.
// POST:    criar eventos.
// DELETE:  deletar eventos.
// PUT:     atualizar eventos.

Route::get('/', [EventController::class, 'index']);//pagina inicial
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');//criar evento
Route::get('/events/{id}', [EventController::class, 'show']);//buscar evento
Route::post('/events', [EventController::class, 'store']);
Route::delete('events/{id}', [EventController::class,'destroy']);

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');


