<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', ['users' => $model->paginate(15)]);

    }

    public function IndexDocentes()
    {
        $users  = User::whereIn('tipoUtilizador', ['docente', 'ambos'])->get();
        return view('pages.docentes', compact('users'));
    }

}
