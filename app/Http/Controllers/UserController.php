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

    public function import() {
        return view('pages.import');
    }

    public function storeImport(Request $request) {
        // dd($request->all());
        // dd(file($request->file->getRealPath()));
        Excel::import(new DocentesImport, $request->file, \Maatwebsite\Excel\Excel::XLSX);
        // Excel::import(new DocentesImport, $file);
        // Excel::import(new DocentesImport, request()->file('file'));
        return redirect('user')->with('success', 'All good!');
    }
}
