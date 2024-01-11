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
        return view('pages.detalhesUnidadesCurriculares', compact('utilizadoruc', 'codigo', 'funcionarios', 'docenteresponsavel', 'docentenaoresponsavel'));
    }


    //funçao index que envia para a view a lista de unidades curriculares do utilizador logado

    public function index()
    {
        $utilizadoruc = Utilizador_uc::where('numeroFuncionario', auth()->user()->numeroFuncionario)->get();
        $ucs = UnidadeCurricular::whereIn('codigo', $utilizadoruc->pluck('codigoUC'))->get();

        $docentes = collect();
        foreach ($ucs as $uc) {
            $docentes->push($this->showDocentesUc($uc->codigo));
        }

        $salas = Sala::all();

        $SalaInstance = new Sala();
        $tiposSalas = $SalaInstance->tiposSalas();
        $docentes = $docentes->flatten();


        $userUcGroupByUc = $this->getuserUcGroupByUc();

        return view('pages.formulario', compact('ucs', 'salas', 'tiposSalas', 'utilizadoruc', 'docentes', 'userUcGroupByUc'));
    }

    public function showDocentesUc($codigo)
    {
        $ucInstance = UnidadeCurricular::find($codigo);
        $users = $ucInstance->users;
        return $users;
    }

    public function getuserUcGroupByUc()
    {
        $user_ucInstance = new Utilizador_uc();
        $userUcGroupByUc = $user_ucInstance->get();
        return $userUcGroupByUc->groupBy('codigoUC');
    }
}
