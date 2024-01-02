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
    $funcionarios = User::whereIn('numeroFuncionario', $utilizadoruc->pluck('numeroFuncionario'))->get();

    $docentenaoresponsavel = User::whereIn('numeroFuncionario', $utilizadoruc->where('docenteresponsavel', 0)->pluck('numeroFuncionario'))->get();
    $docenteresponsavel = User::whereIn('numeroFuncionario', $utilizadoruc->where('docenteresponsavel', 1)->pluck('numeroFuncionario'))->get();
    return view('pages.detalhesUnidadesCurriculares', compact('utilizadoruc','codigo','funcionarios','docenteresponsavel','docentenaoresponsavel'));
 }
}
