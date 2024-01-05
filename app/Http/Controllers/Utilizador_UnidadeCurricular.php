<?php

namespace App\Http\Controllers;

use App\Models\UnidadeCurricular;
use App\Models\User;
use App\Models\Utilizador_uc;
use App\Models\Sala;

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


    //funçao index que envia para a view a lista de unidades curriculares do utilizador logado

    public function index()
    {
        $utilizadoruc = Utilizador_uc::where('numeroFuncionario', auth()->user()->numeroFuncionario)->get();
        $uc = UnidadeCurricular::whereIn('codigo', $utilizadoruc->pluck('codigoUC'))->get();
        $salas = Sala::all();
        $SalaInstance = new Sala();
        $tiposSalas = $SalaInstance->tiposSalas();

        return view('pages.formulario', compact('uc','salas','tiposSalas'));
    }

}
