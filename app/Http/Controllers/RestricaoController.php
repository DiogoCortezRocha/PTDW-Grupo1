<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bloco;
use App\Models\Restricoes;
use Illuminate\Http\Request;
use App\Models\Observacao;
use App\Models\User;



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

       $observacoes= $user->observacao;


        return view('pages.horarios', compact('blocosUtilizador', 'partesDoDiaDiferentes', 'diaDaSemanaDiferentes', 'blocosTodos','observacoes'));
    }

    public function store(Request $request)
{

    $user = auth()->user();
    $blocosSelecionados = $request->input('blocos');
    $observacao = $request->input('observacoes');

    $this->delete();

     // Atualizar o campo restricaoSubmetida do usuário
     $user->restricaoSubmetida = 1;


    foreach($blocosSelecionados as $blocoId) {
        // Criar uma nova restrição para cada bloco selecionado
        Restricoes::create([
            'numeroFuncionario' => $user->numeroFuncionario,
            'idBloco' => $blocoId
        ]);
    }

     // Atualizar a observação existente ou criar uma nova
     Observacao::updateOrCreate(
        ['numeroFuncionario' => $user->numeroFuncionario], // Condições para encontrar a observação existente
        ['obsDocente' => $observacao] // Valores para atualizar ou criar
    );

    return redirect()->back()->with('success', 'Restrições guardadas com sucesso!');
}


public function delete()
{
    $user = auth()->user();

    // Remover todas as restrições existentes para o usuário
    Restricoes::where('numeroFuncionario', $user->numeroFuncionario)->delete();
}

}
