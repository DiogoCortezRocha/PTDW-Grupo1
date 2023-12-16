@extends('layouts.app', ['page' => __('formulario'), 'pageSlug' => 'formulario'])

@section('content')
    <div class="row">

        <div class="tab">
            <button onclick="openCity(event, 'London')">TI</button>
            <button onclick="openCity(event, 'Paris')">DADM</button>
            <button onclick="openCity(event, 'Tokyo')">DWM</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ __('Unidade curricular') }}</label>
                                    <input type="text" name="name"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Docente responsável') }}</label>
                                    <input type="email" name="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email address') }}"
                                        value="{{ old('email', auth()->user()->email) }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Outros docentes') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Utilização de laboratorios') }}</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="obrigatorio"
                                                name="obrigatorio">
                                            <label class="custom-control-label"
                                                for="obrigatorio">{{ __('Obrigatório') }}</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="preferencial"
                                                name="preferencial">
                                            <label class="custom-control-label"
                                                for="preferencial">{{ __('Preferencial') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Laboratorios possiveis') }}</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Laboratorios possiveis') }}</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Laboratorios possiveis') }}</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Software necessário(nome,fabricante,versão,sistema operativo)') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Sala para Avaliação') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Guardar') }}</button>
                    </div>
                </form>

            </div>


        </div>

    </div>
    <style>
        /* Style the tab */
        .tab {

            overflow: hidden;
            margin-left: 15px;


        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: white;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border: 1px solid white;
            float: left;
            outline: none;
            cursor: pointer;
            transition: 0.3s;
            padding: 10px 16px;
            font-size: 17px;
            margin-right: 2px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
@endsection
