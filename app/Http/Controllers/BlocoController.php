<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bloco;

class BlocoController extends Controller
{
    //
    public function tudoJson()
    {
        $blocos = Bloco::all();
        return response()->json($blocos);

    }
    public function tudo()
    {

        $blocos = Bloco::all();

        return view('', compact('blocos'));
    }
}
