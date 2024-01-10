<?php

namespace App\Http\Controllers;

use App\Models\UnidadeCurricular;
use App\Models\User;
use App\Models\Utilizador_uc;
use App\Models\Sala;

class Utilizador_UnidadeCurricular extends Controller
{
    //

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
