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
                                        <input type="checkbox" name="{{ $dia }}Manha" id="{{ $dia }}Manha" disabled>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Tarde</th>
                                @foreach ($diasSemana as $dia)
                                    <td>
                                        <input type="checkbox" name="{{ $dia }}Tarde" id="{{ $dia }}Tarde" disabled>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Noite</th>
                                @foreach ($diasSemana as $dia)
                                    <td>
                                        <input type="checkbox" name="{{ $dia }}Noite" id="{{ $dia }}Noite" disabled>
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
            <div class="card-body" >
                <h5 class="card-title">Observações</h5>
                <textarea class="form-control" rows="5" readonly></textarea>
            </div>
        </div>
    </div>
</div>
@endsection
