<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UnidadeCurricular;
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
        // Redirecionar para a rota 'funcionario' com todas as informações da UC
        return redirect()->route('funcionario', ['codigo' => $uc]);
    } else {
        // Tratar caso a UC não seja encontrada
        // Por exemplo, redirecionar de volta à página anterior ou para uma página de erro
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
    public function inserir_uc(){
        return view('pages.inserir_uc');
    }
   
   public function store(Request $request){
    $request->validate([
        'codigo' => 'required|string', // Adapte as regras conforme necessário
        'name' => 'required|string',
        'acn' => 'required|string',
        'horas' => 'required|numeric',
    ]);

    // Criação de um novo perfil no banco de dados
    $uc = new UnidadeCurricular;
    $uc->codigo = $request->codigo;
    $uc->name = $request->name;
    $uc->acn = $request->acn;
    $uc->horas = $request->horas;
    // Adicione outros campos conforme necessário

    $uc->save();

    // Redirecionamento com mensagem de sucesso
    return redirect()->back()->with('success', 'Unidade curricular criada com sucesso!');
}
}

