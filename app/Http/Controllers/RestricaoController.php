<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restricoes;

class RestricaoController extends Controller
{
    //
    public function tudoJson()
    {
        $restricoes = Restricoes::all();
        return response()->json($restricoes);

    }
    public function tudo()
    {

        $restricoes = Restricoes::all();

        return view('', compact('restricoes'));
    }

}
