<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    //

public function Index()
{

    $cursos = Curso::all();

    return view('pages.ciclosEstudos', compact('cursos'));
}

public function show($codigo){

      // Encontrar o curso com o código fornecido
      $curso = curso::where('codigo', $codigo)->first();
      return view('pages.detalhescurso', compact('curso'));
       
    }
}
