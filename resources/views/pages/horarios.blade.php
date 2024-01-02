@extends('layouts.app', ['page' => __('horarios'), 'pageSlug' => 'horarios'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Horários</h5>
                    <form>
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
                                                <input type="checkbox"
                                                    name="horarios[{{ $sequencial }}][{{ $dia->id }}]"
                                                    id="bloco{{ $sequencial }}{{ $dia->id }}"
                                                    value="{{ $parteDia->id }}"
                                                    @if (in_array($sequencial, $blocosUtilizador->pluck('id')->toArray())) checked @endif

                                                >
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
                        <div class="text-right"> <!-- Alinhamento à direita -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
