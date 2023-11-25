@extends('layouts.app', ['page' => __('horarios'), 'pageSlug' => 'horarios'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Horários</h5>
                <form >
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
                                <th scope="col"></th> <!-- Adicionado para o botão de salvar -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Manhã</th>
                                @foreach ($diasSemana as $dia)
                                    <td>
                                        <input type="checkbox" name="{{ $dia }}Manha" id="{{ $dia }}Manha">
                                    </td>
                                @endforeach
                                <td></td> <!-- Célula vazia para alinhar com o botão de salvar -->
                            </tr>
                            <tr>
                                <th scope="row">Tarde</th>
                                @foreach ($diasSemana as $dia)
                                    <td>
                                        <input type="checkbox" name="{{ $dia }}Tarde" id="{{ $dia }}Tarde">
                                    </td>
                                @endforeach
                                <td></td> <!-- Célula vazia para alinhar com o botão de salvar -->
                            </tr>
                            <tr>
                                <th scope="row">Noite</th>
                                @foreach ($diasSemana as $dia)
                                    <td>
                                        <input type="checkbox" name="{{ $dia }}Noite" id="{{ $dia }}Noite">
                                    </td>
                                @endforeach
                                <td></td> <!-- Célula vazia para alinhar com o botão de salvar -->
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right"> <!-- Alinhamento à direita -->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
