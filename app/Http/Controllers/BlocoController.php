<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bloco;

class BlocoController extends Controller
{
    //
    public function indexJson()
    {
        $blocos = Bloco::all();
        return response()->json($blocos);

    }
    public function index()
    {

        $blocos = Bloco::all();

        return view('', compact('blocos'));
    }
}
