<?php

namespace App\Http\Controllers;

use App\Models\UnidadeCurricular;
use App\Models\User;
use App\Models\Utilizador_uc;
use Illuminate\Http\Request;

class Utilizador_UnidadeCurricular extends Controller
{
    //
    public function show(UnidadeCurricular $codigo)
    {
    
    // Acessar as informações sobre uma UC e os números de funcionário associados
    $utilizadoruc = Utilizador_uc::where('codigoUC', $codigo->codigo)->get();
    $funcionarios = User::whereIn('id', $utilizadoruc->pluck('numeroFuncionario'))->get();
    // Se quiser apenas os números de funcionário
    return view('pages.detalhesUnidadesCurriculares', compact('utilizadoruc','codigo','funcionarios'));
 }
}
