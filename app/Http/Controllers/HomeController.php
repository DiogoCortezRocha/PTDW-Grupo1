<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RestricaoController;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $selection = $request->query('selection', 'docente');

        if (auth()->user()->tipoUtilizador == 'docente' || (auth()->user()->tipoUtilizador == 'ambos' && $selection == 'docente'))
        return (new RestricaoController())->Index();
        else if (auth()->user()->tipoUtilizador == 'comissaoHorarios' || (auth()->user()->tipoUtilizador == 'ambos' && $selection == 'comissaoHorarios'))

        return view('dashboard', ['utilizadores' => User::whereIn('tipoUtilizador', ['docente', 'ambos'])->get()]);

    }
}
