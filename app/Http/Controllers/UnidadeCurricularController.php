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
    public function tudoJson()
    {
        $ucs = UnidadeCurricular::all();
        return response()->json($ucs);

    }
    public function tudo()
    {

        $ucs = UnidadeCurricular::all();

        return view('', compact('ucs'));
    }

}
