@extends('layouts.app', ['page' => __('detalhesDocente'), 'pageSlug' => 'detalhesDocente'])

@section('content')

    <div class="row">
        <div class="col-md-8 ">
            <div class="card" style="min-height: 94%;">
                <div class="card-body">
                    <h4 class="card-title mb-4"><strong>Impedimentos de {{$user->nome}}</strong></h4>
                    
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        @foreach ($diaDaSemanaDiferentes as $dia)
                                            <th scope="col">{{ $dia->diaDaSemana }}</th>
                                        @endforeach
                                        <th scope="col"></th> <!-- Adicionado para o botão de salvar -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sequencial = 1; // Contador sequencial
                                    @endphp
                                    @foreach ($partesDoDiaDiferentes as $parteDia)
                                        <tr>
                                            <th scope="row">{{ $parteDia->partDoDia }}</th>
                                            @foreach ($diaDaSemanaDiferentes as $dia)
                                                <td>
                                                    <input  @disabled(true) type="checkbox" name="blocos[]"
                                                        id="bloco{{ $sequencial }}{{ $dia->id }}"
                                                        value="{{ $sequencial }}"
                                                        @if (in_array($sequencial, $blocosUtilizador->pluck('id')->toArray())) checked @disabled(true) @endif>
                                                </td>
                                                @php
    
                                                    $sequencial++;
                                                @endphp
                                            @endforeach
                                            <td></td> <!-- Célula vazia para alinhar com o botão de salvar -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card " >
                <div class="card-body">
                    <h4 class="card-title"><strong>Observações Docente</strong></h4>
                    <textarea class="form-control" rows="3" readonly> {{ $observacoes ? $observacoes->obsDocente : '' }}</textarea>
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title"><strong>Suas observações</strong></h4>
                     <textarea class="form-group w-100" name="observacoes" rows="3"> </textarea>
                </div>
            </div>
        </div>
        
    </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong>Unidades curriculares a lecionar</strong></h4>
            </div>
                <div class="card-body">
             @if (count($ucnome)>0)
                @foreach ($ucnome as $uc)
                 <p>{{$uc->name}}</p>
                 
                 @endforeach
             @else
              <p>Não contém unidades curriculares a lecionar</p>   
             @endif (count($ucnome) > 0)  
                  
                    </div>
                </div>
         </div>
              



    
@endsection
