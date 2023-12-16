<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UnidadeCurricular;
use Illuminate\Http\Request;

class UnidadeCurricularController extends Controller
{
    //

     /**
     * Display a listing of UnidadeCurriculares.
     */
    public function IndexJson()
    {
        $ucs = UnidadeCurricular::all();
        return response()->json($ucs);

    }
    public function Index()
    {

        $ucs = UnidadeCurricular::all();

        return view('pages.unidadesCurriculares', compact('ucs'));
    }


//TODO: Enviar para view
    public function show($codigo)
    {
        // Acessar a informação sobre uma UC
        $uc = UnidadeCurricular::find($codigo);
        return view('', compact('uc'));
    }


//TODO: Redirecionar para outra view
    public function destroy($codigo)
    {
        // Remover uma UC
        UnidadeCurricular::destroy($codigo);
        return redirect()->route('')->with('success', 'UC removida com sucesso');
    }

    //TODO: Redirecionar para pagina de criaçao de UC
    public function create()
    {
        // Exibir o formulário para criar uma nova UC
        return view('');
    }


}
