<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UnidadeCurricular;
use App\Models\User;
use App\Models\Utilizador_uc;
use Illuminate\Http\Request;

class UnidadeCurricularController extends Controller
{
    //

    /**
     * Display a listing of UnidadeCurriculares.
     */
    public function IndexJson()
    {
        $ucs = UnidadeCurricular::all();
        return response()->json($ucs);
    }
    public function Index()
    {

        $ucs = UnidadeCurricular::all();

        return view('pages.unidadesCurriculares', compact('ucs'));
    }


    //TODO: Enviar para view
    public function show($codigo)
    {
        // Encontrar a Unidade Curricular com o código fornecido
        $uc = UnidadeCurricular::where('codigo', $codigo)->first();

        // Verificar se a UC foi encontrada
        if ($uc) {
            // Carregar automaticamente os utilizadores associados usando o relacionamento
            $uc->load('utilizadores');

            // Aceder as informações sobre uma UC e os números de funcionário associados
            $utilizadoruc = $uc->utilizadores;
            $funcionarios = User::whereIn('numeroFuncionario', $utilizadoruc->pluck('numeroFuncionario'))->get();
            $docentenaoresponsavel = User::whereIn('numeroFuncionario', $utilizadoruc->where('docenteresponsavel', 0)->pluck('numeroFuncionario'))->get();
            $docenteresponsavel = User::whereIn('numeroFuncionario', $utilizadoruc->where('docenteresponsavel', 1)->pluck('numeroFuncionario'))->get();
            $adicionadocentes = $this->docentes();
            return view('pages.detalhesUnidadesCurriculares', compact('utilizadoruc', 'uc', 'funcionarios', 'docenteresponsavel', 'docentenaoresponsavel', 'adicionadocentes'));
        } else {
           
            return redirect()->back();
        }
    }

    //TODO: Redirecionar para outra view
    public function destroy($codigo)
    {
        // Remover uma UC
        UnidadeCurricular::destroy($codigo);
        return redirect()->route('')->with('success', 'UC removida com sucesso');
    }

    //TODO: Redirecionar para pagina de criaçao de UC
    public function create()
    {
        // Exibir o formulário para criar uma nova UC
        return view('');
    }
    public function inserir_uc()
    {
        return view('pages.inserir_uc');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string', 
            'name' => 'required|string',
            'acn' => 'required|string',
            'horas' => 'required|numeric',
        ]);
        $exiteuc=UnidadeCurricular::where('codigo',$request->input('codigo'))->exists();
        // Criação de uma nova uc na base de dados
        if($exiteuc){
            return redirect()->route('inserir_uc')->with('error', 'Código unidade curricular já existente');
        }
        $uc = new UnidadeCurricular;
        $uc->codigo = $request->codigo;
        $uc->name = $request->name;
        $uc->acn = $request->acn;
        $uc->horas = $request->horas;
        

        $uc->save();

        // Redirecionamento com mensagem de sucesso
        return redirect()->back()->with('success', 'Unidade curricular criada com sucesso!');
    }
    public function docentes()
    {
        $docente = new User;
        $numerosENomes = $docente->todosNumerosFuncionariosENomes();
        return ['numerosENomes' => $numerosENomes];
    }
    public function adiciona_docenteresponsavel_uc(Request $request, $codigo)
    {
        $request->validate([
            'docentes' => 'required',
        ]);
        $existeCombinação = Utilizador_uc::where('numeroFuncionario', $request->input('docentes'))
        ->where('codigoUC', $codigo)
        ->exists();

        if ($existeCombinação) {
        return redirect()->route('detalhesuc', ['codigo' => $codigo])->with('error', 'Este docente já leciona a unidade curricular');
         }

        // Criar uma nova instância do model Utilizador_Uc
        $utilizadorUc = new Utilizador_uc;

        // Atribuir os valores aos campos do model
        $utilizadorUc->numeroFuncionario = $request->input('docentes');
        $utilizadorUc->codigoUC = $codigo; // Usar o código recebido na rota
        $utilizadorUc->docenteresponsavel = 1;

        // guardar os dados na base de dados
        $utilizadorUc->save();

        // Redirecionar para a rota desejada 
        return redirect()->route('detalhesuc', ['codigo' => $codigo])->with('success', 'Docente responsável adicionado com sucesso!');
    }
    public function adiciona_docentenaoresponsavel_uc(Request $request, $codigo)
    {
        $request->validate([
            'docentes' => 'required',
        ]);
        $existeCombinação = Utilizador_uc::where('numeroFuncionario', $request->input('docentes'))
        ->where('codigoUC', $codigo)
        ->first();

        if ($existeCombinação) {
            if ($existeCombinação->docenteresponsavel) {
                return redirect()->route('detalhesuc', ['codigo' => $codigo])->with('error', 'Este docente é responsável pela unidade curricular');
            } else {
                return redirect()->route('detalhesuc', ['codigo' => $codigo])->with('error', 'Este docente já leciona a unidade curricular');
            }
        }

        // Criar uma nova instância do model Utilizador_Uc
        $utilizadorUc = new Utilizador_uc;

        // Atribuir os valores aos campos do modelo
        $utilizadorUc->numeroFuncionario = $request->input('docentes');
        $utilizadorUc->codigoUC = $codigo; // Usar o código recebido na rota
        $utilizadorUc->docenteresponsavel = 0;

        // guardar os dados na base de dados
        $utilizadorUc->save();

        // Redirecionar para a rota desejada 
        return redirect()->route('detalhesuc', ['codigo' => $codigo])->with('success', 'Docente adicionado com sucesso!');
    }
    

    public function update(Request $request, $id)
    {


        $unidadeCurricular = UnidadeCurricular::where('codigo', $id)->first();

        // Verificar se o registro existe
        if ($unidadeCurricular) {
            // Atualizar os campos do registro
            $unidadeCurricular->software = $request->input('software');
            $unidadeCurricular->salaAvaliacao = $request->input('tipo');

            $unidadeCurricular->save();

            // Redirecionar para a página anterior com uma mensagem de sucesso
            return back()->with('success', 'Dados atualizados com sucesso!');
        } else {
            // Registro não encontrado, redirecionar com uma mensagem de erro
            return back()->with('error', 'Registro não encontrado!');
        }
    }
}
