@extends('layouts.app', ['page' => __('Adicionar Utilizador'), 'pageSlug' => 'create_user'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="title">{{ __('Adicionar Utilizador') }}</h2>
                </div>
                <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('numeroFuncionario') ? ' has-danger' : '' }}">
                                <label>{{ __('Número de Funcionário') }}</label>
                                <input type="text" name="numeroFuncionario" class="form-control{{ $errors->has('numeroFuncionario') ? ' is-invalid' : '' }}" placeholder="{{ __('Número de Funcionário') }}" value="{{ old('numeroFuncionario') }}">
                                @include('alerts.feedback', ['field' => 'numeroFuncionario'])
                            </div>
                            <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" name="nome" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('nome') }}">
                                @include('alerts.feedback', ['field' => 'nome'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Endereço de Email') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Endereço de Email') }}" value="{{ old('email') }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                <label>{{ __('Telefone') }}</label>
                                <input type="telefone" name="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefone') }}" value="{{ old('telefone') }}">
                                @include('alerts.feedback', ['field' => 'telefone'])
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label>{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group">
                                <label>{{ __('Confirmação da Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirmação da Password') }}" value="">
                            </div>
                            <div class="form-group{{ $errors->has('acn') ? ' has-danger' : '' }}">
                                <label>{{ __('ACN') }}</label>
                                <input type="acn" name="acn" class="form-control{{ $errors->has('acn') ? ' is-invalid' : '' }}" placeholder="{{ __('ACN') }}" value="{{ old('acn') }}">
                                @include('alerts.feedback', ['field' => 'acn'])
                            </div>
                            <div class="form-group{{ $errors->has('tipoUtilizador') ? ' has-danger' : '' }}">
                                <label>{{ __('Tipo de Utilizador') }}</label>
                                <select name="tipoUtilizador" class="form-control{{ $errors->has('tipoUtilizador') ? ' is-invalid' : '' }}">
                                    <option value="docente" {{ old('tipoUtilizador')}}>docente</option>
                                    <option value="comissaoHorarios" {{ old('tipoUtilizador')}}>comissaoHorarios</option>
                                    <option value="ambos" {{ old('tipoUtilizador')}}>ambos</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'tipoUtilizador'])
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Guardar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
