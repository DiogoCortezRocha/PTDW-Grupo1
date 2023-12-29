@extends('layouts.app', ['page' => __('detalhesUnidadesCurricilares'), 'pageSlug' => 'detalhesDocente'])

@section('content')
   
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><strong>Detalhes da Unidade Curricular {{ $codigo->name }}</strong></h4>
    </div>
    <div class="card-body">
        @include('alerts.success')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>{{ __('Código') }}</strong></label>
                    <p class="card-text">{{ $codigo->codigo }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('Nome da Unidade Curricular') }}</strong></label>
                    <p>{{ $codigo->name }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('ACN') }}</strong></label>
                    <p>{{ $codigo->acn }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('Número de horas') }}</strong></label>
                    <p>{{ $codigo->horas }} horas</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>{{ __('Docentes a lecionar a unidade curricular') }}</strong></label>
                    @foreach($funcionarios as $numero)
                        <li>{{ $numero->name }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

