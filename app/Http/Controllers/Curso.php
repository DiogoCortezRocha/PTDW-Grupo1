<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso as cursos;

class Curso extends Controller
{
    // 
    public function adicionar()
{
    return view('ciclos.adicionar');
}
public function editar($id)
{
    //
    
    
    $ciclo = cursos::find($id);

    return view('ciclos.editar', compact('ciclo'));
}
public function remover($id)
{
    // Lógica para remover o ciclo de estudos com base no ID
    cursos::destroy($id);

    return redirect()->route('ciclos.listagem')->with('success', 'Ciclo de Estudos removido com sucesso.');
}
}
