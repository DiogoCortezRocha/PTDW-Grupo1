<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bloco;
use App\Models\Restricoes;


class RestricaoController extends Controller
{
    //
    public function IndexJson()
    {
        $restricoes = Restricoes::all();
        return response()->json($restricoes);

    }
    public function Index()
    {
        $user = auth()->user();
        $blocosUtilizador = $user->blocos;


        $blocoInstance = new Bloco();
        $partesDoDiaDiferentes = $blocoInstance->partesDoDia();
        $diaDaSemanaDiferentes = $blocoInstance->diasDaSemana();
        $blocosTodos = $blocoInstance->blocos();

        return view('pages.horarios', compact('blocosUtilizador', 'partesDoDiaDiferentes', 'diaDaSemanaDiferentes', 'blocosTodos'));
    }

}
