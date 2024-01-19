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
}
