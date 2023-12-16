<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Database\Factories\SalaFactory;
use Illuminate\Http\Request;
use App\Models\Sala;

class SalaController extends Controller
{
    public function IndexJson()
    {
        $salas = Sala::all();
        return response()->json($salas);

    }
    public function Index()
    {

        $salas = Sala::all();

        return view('', compact('salas'));
    }
}
