<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UnidadeCurricular;
use App\Models\Utilizador_uc;
use App\Imports\DsdImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import_form() {
        return view('pages.importDsd');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        // Import into multiple tables without explicit conditions
        // $tables = [new User(), new UnidadeCurricular(), new Utilizador_uc(), new Curso(), new Curso_uc()];
        $tables = [new User(), new UnidadeCurricular(), new Utilizador_uc()];

        foreach ($tables as $table) {
            Excel::import(new DsdImport($table), $file);
        }
        
        return back()->withStatus(__('Ficheiro importado com sucesso em todas as tabelas!'));
    }
}
