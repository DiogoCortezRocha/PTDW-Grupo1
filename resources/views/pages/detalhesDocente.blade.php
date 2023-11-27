@extends('layouts.app', ['page' => __('detalhesDocente'), 'pageSlug' => 'detalhesDocente'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Horários</h5>
                    <form>
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    @php
                                        $diasSemana = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
                                    @endphp
                                    @foreach ($diasSemana as $dia)
                                        <th scope="col">{{ $dia }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Manhã</th>
                                    @foreach ($diasSemana as $dia)
                                        <td>
                                            <input type="checkbox" name="{{ $dia }}Manha"
                                                id="{{ $dia }}Manha" disabled>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th scope="row">Tarde</th>
                                    @foreach ($diasSemana as $dia)
                                        <td>
                                            <input type="checkbox" name="{{ $dia }}Tarde"
                                                id="{{ $dia }}Tarde" disabled>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th scope="row">Noite</th>
                                    @foreach ($diasSemana as $dia)
                                        <td>
                                            <input type="checkbox" name="{{ $dia }}Noite"
                                                id="{{ $dia }}Noite" disabled>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>







        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Observações</h5>
                <textarea class="form-control" rows="5" readonly></textarea>
            </div>
        </div>
</div>



            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Docente') }}</h5>
                </div>
                <form>
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Nome') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ _('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('Email address') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="{{ _('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>



    </div>
@endsection
