<?php

namespace App\Http\Controllers;
use App\Models\User;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

     /**
     * Display pagian incial page
     *
     * @return \Illuminate\View\View
     */
    public function paginaInicial()
    {
        $utilizadores = User::whereIn('tipoUtilizador', ['docente', 'ambos'])->get();
        return view('dashboard', ['utilizadores' => $utilizadores]);
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function docentes()
    {

        return view('pages.docentes');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }

    /**
     * Display formulario page
     *
     * @return \Illuminate\View\View
     */
    public function formulario()
    {
        return view('pages.formulario');
    }

    /**
     * Display horarios page
     *
     * @return \Illuminate\View\View
     */
    public function horarios()
    {
        return view('pages.horarios');
    }


    public function detalhesDocente()
    {
        return view('pages.detalhesDocente');
    }

    public function detalhesUnidadesCurriculares()
    {
        return view('pages.detalhesUnidadesCurriculares');
    }


    public function unidadesCurriculares()
    {
        return view('pages.unidadesCurriculares');
    }

     /**
     * Display ciclosEstudos page
     *
     * @return \Illuminate\View\View
     */
    public function ciclosEstudos()
    {
        return view('pages.ciclosEstudos');
    }
}
