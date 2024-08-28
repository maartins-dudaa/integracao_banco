<?php

use App\Http\Controllers\UsuarioControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rota de gravação-gravar algo novo para o Banco 
Route::post('/usuario', [UsuarioControler::class, 'store']);


Route::get('/usuario/{id}/find', [UsuarioControler::class, 'findById']);

Route::get('/usuario', [UsuarioControler::class, 'index']);

Route::get('/usuario/search', [UsuarioControler::class, 'searchByName']);

Route::get('/usuario/search/email', [UsuarioControler::class, 'searchByEmail']);

Route::delete('/usuario/{id}/delete', [UsuarioControler::class, 'delete']);

Route::put('/usuario', [UsuarioControler::class, 'update']);
