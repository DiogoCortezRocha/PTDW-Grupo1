<?php

namespace App\Http\Controllers;

use App\Models\UnidadeCurricular;
use App\Models\Utilizador_uc;
use App\Models\Sala;
use Illuminate\Support\Facades\DB;

class Utilizador_UnidadeCurricular extends Controller
{
    //

    //funçao index que envia para a view a lista de unidades curriculares do utilizador logado

    public function index()
    {
        $utilizadoruc = Utilizador_uc::where('numeroFuncionario', auth()->user()->numeroFuncionario)->get();
        $ucs = UnidadeCurricular::whereIn('codigo', $utilizadoruc->pluck('codigoUC'))->get();

        $docentes = collect();
        foreach ($ucs as $uc) {
            $docentes->push($this->showDocentesUc($uc->codigo));
        }

        $salas = Sala::all();

        $SalaInstance = new Sala();
        $tiposSalas = $SalaInstance->tiposSalas();
        $docentes = $docentes->flatten();


        $userUcGroupByUc = $this->getuserUcGroupByUc();


        return view('pages.formulario', compact('ucs', 'salas', 'tiposSalas', 'utilizadoruc', 'docentes', 'userUcGroupByUc'));
    }


    public function showDocentesUc($codigo)
    {
        $ucInstance = UnidadeCurricular::find($codigo);
        $users = $ucInstance->users;
        return $users;
    }

    public function getuserUcGroupByUc()
    {
        $user_ucInstance = new Utilizador_uc();
        $userUcGroupByUc = $user_ucInstance->get();
        return $userUcGroupByUc->groupBy('codigoUC');
    }
    public function destroy_docente_responsavel($numeroFuncionario, $codigoUC)
    {
        try {
            // Execute uma instrução SQL para excluir o registro
            $deleted = DB::table('Utilizador_UnidadeCurricular')
                ->where('numeroFuncionario', $numeroFuncionario)
                ->where('codigoUC', $codigoUC)
                ->delete();

            // Verifique se algum registro foi excluído
            if (!$deleted) {
                return redirect()->route('detalhesuc', ['codigo' => $codigoUC])->with('error', 'Docente responsável não encontrado');
            }

            return redirect()->route('detalhesuc', ['codigo' => $codigoUC])->with('success', 'Docente responsável excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('detalhesuc', ['codigo' => $codigoUC])->with('error', 'Erro ao excluir docente responsável: ' . $e->getMessage());
        }
    }
}
