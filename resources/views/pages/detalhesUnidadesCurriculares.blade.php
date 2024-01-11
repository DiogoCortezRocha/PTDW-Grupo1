@extends('layouts.app', ['page' => __('detalhesUnidadesCurriculares'), 'pageSlug' => 'unidadesCurriculares'])

@section('content')
   
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><strong>{{ $uc->name }}</strong></h4>
    </div>
    <div class="card-body">
        @include('alerts.success')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>{{ __('Código') }}</strong></label>
                    <p class="card-text">{{ $uc->codigo }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('Nome da Unidade Curricular') }}</strong></label>
                    <p>{{ $uc->name }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('ACN') }}</strong></label>
                    <p>{{ $uc->acn }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('Número de horas') }}</strong></label>
                    <p>{{ $uc->horas }} horas</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>{{ __('Docentes a lecionar a unidade curricular') }}</strong></label>
                  @if (count($docentenaoresponsavel) > 0)   
                    <ul>
                        @foreach ($docentenaoresponsavel as $numero)
                            <li>{{ $numero->nome }}</li>
                        @endforeach
                    </ul>            
                  @else
                  
    <div class="d-flex align-items-center">
        <p class="paragraph">Não contém docente a lecionar a unidade curricular</p>
    </div>

    <!-- Modal -->
   
                  @endif
                  <label><strong>{{ __('Docente responsável pela unidade curricular') }}</strong></label>
                    @if (count($docenteresponsavel)>0)
                        <ul>
                            @foreach ($docenteresponsavel as $numero)
                                <li>{{ $numero->nome }}</li>
                            @endforeach
                        </ul>
                    @else
                    <div class="d-flex align-items-center">
                        <p>Não contém docente responsável</p>
                        <button class="btn btn-primary add-button ml-2" data-toggle="modal" data-target="#adicionadocentemodel">
                            <div class="icon">+</div>
                        </button>
                    </div>    
                    @endif
                    <div class="modal fade" id="adicionadocentemodel" tabindex="-1" role="dialog" aria-labelledby="adicionadocenteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="adicionadocenteModalLabel"><strong>Adicionar docente responsável</strong></h4>
                                    <button type="button" class="close" data-dismiss="model" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <label>{{ __('Nome docente responsável') }}</label>
                                     <select name="docentes">
                                        @foreach ($adicionadocentes['numerosENomes'] as $docente)
                                            <option value="{{ $docente['numeroFuncionario'] }}">{{ $docente['nome'] }}</option>
                                        @endforeach
                                    </select>
                                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <!-- Outros botões ou ações, se necessário -->
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

