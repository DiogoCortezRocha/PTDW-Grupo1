@extends('layouts.app', ['page' => __('detalhesDocente'), 'pageSlug' => 'detalhesDocente'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><strong>Horário</strong></h4>
                    
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

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><strong>Observações</strong></h4>
                    <textarea class="form-control" rows="5" readonly> {{ $observacoes ? $observacoes->obsDocente : '' }}</textarea>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong>Editar Docente</strong></h4>
            </div>
            <form>
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Nome') }}</label>
                        <input type="text" name="name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email address') }}</label>
                        <input type="email" name="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                
            </form>
        </div>



    </div>
@endsection
