<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RestricaoController;

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
    public function index()
    {
        if (auth()->user()->tipoUtilizador == 'docente' || auth()->user()->tipoUtilizador == 'ambos')
        return (new RestricaoController())->Index();
        else if (auth()->user()->tipoUtilizador == 'comissaoHorarios')
        return view('dashboard');
    }
}
