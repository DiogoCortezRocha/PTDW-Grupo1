@extends('layouts.app', ['page' => __('horarios'), 'pageSlug' => 'horarios'])

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Impedimentos</b></h5>
                    <form method="POST" action="{{ route('restricoes.store') }}">
                        @csrf
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
                                                <input type="checkbox" name="blocos[]"
                                                    id="bloco{{ $sequencial }}{{ $dia->id }}"
                                                    value="{{ $sequencial }}"
                                                    @if (in_array($sequencial, $blocosUtilizador->pluck('id')->toArray())) checked @endif>
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
                        <div class="mt-4">
                            <h4 class="card-title"><strong>Observações</strong></h4>
                            <textarea class="form-group w-100" name="observacoes" rows="6">{{  $observacoes ? $observacoes->obsDocente : '' }}</textarea>
                        </div>
                        <div class="text-right"> <!-- Alinhamento à direita -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    const element = document.getElementById('success-message');
                    element.style.display = 'none';
                }, 5000);
            </script>
        @endif
    </div>
@endsection
