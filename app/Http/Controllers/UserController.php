<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\DocentesImport;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user; // Initialize the $user property in the constructor
    }

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

    /**
     * Show the form for editing the user.
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    // public function edit()
    {
        return view('users.edit',['user' => $user]);
        // return view('users.edit');
    }

    /**
     * Update the user
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, string $numeroFuncionario)
    {
        $this->user->where('numeroFuncionario', $numeroFuncionario)->update($request->except(['_token', '_method']));

        return back()->withStatus(__('Utilizador atualizado com sucesso.'));
    }

    public function import() {
        return view('pages.import');
    }

    public function storeImport(Request $request) {
       
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        Excel::import(new DocentesImport, $request->file, \Maatwebsite\Excel\Excel::XLSX);
        
        return redirect()->back()->with('alerts.success', 'Ficheiro importado com sucesso!');
        
    }
}
