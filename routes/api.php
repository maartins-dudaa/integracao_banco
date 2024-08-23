<?php

use App\Http\Controllers\UsuarioControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rota de gravação-gravar algo novo para o Banco 
Route::post('/usuario', [UsuarioControler::class, 'store']);