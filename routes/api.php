<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeCurricularController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\RestricaoController;
use App\Http\Controllers\BlocoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Todas as Ucs json
Route::get('/UnidadesCurriculares/json',[UnidadeCurricularController::class,'indexJson']);

//Todas as salas Json
Route::get('/Salas/json',[SalaController::class,'indexJson']);


//Todas os Blocos Json
Route::get('/Blocos/json',[BlocoController::class,'indexJson']);


//Todas as Restricoes Json
Route::get('/Restricoes/json',[RestricaoController::class,'indexJson']);
