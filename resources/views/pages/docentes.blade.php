@extends('layouts.app', ['page' => __('docentes'), 'pageSlug' => 'docentes'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h2 class="card-title"><strong>Listagem de Docentes</strong></h2>
                        </div>
                        <div class="col-1 text-right" >
                            <a onclick="window.location='{{ url('import') }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 80%" viewBox="0 0 384 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style> svg{fill:#0ebdc7} </style><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 408c0 13.3-10.7 24-24 24s-24-10.7-24-24V305.9l-31 31c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l72-72c9.4-9.4 24.6-9.4 33.9 0l72 72c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-31-31V408z" class="btn btn-sm btn-primary"/></svg>
                            </a>
                        </div>
                        <div class="col-2 text-right">
                            <a href="#" class="btn btn-sm btn-primary">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    <span>Adicionar</span>
                                    <span>Docente</span>
                                </div>

                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class="text-primary">
                                <tr>
                                    <th>
                                        Numero de funcionário
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th class="text-center">
                                        ACN
                                    </th>
                                    <th class="text-center">
                                        Restrição Horário
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $utilizador)
                                    <tr onclick="window.location='{{ route('detalhesdocentes',['numeroFuncionario' => $utilizador->numeroFuncionario]) }}';" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f5f5f5';" onmouseout="this.style.backgroundColor='';">
                                        <td>
                                            {{ $utilizador->numeroFuncionario }}
                                        </td>
                                        <td>
                                            {{ $utilizador->nome }}
                                        </td>
                                        <td>
                                            {{ $utilizador->email }}
                                        </td>
                                        <td class="text-center">
                                            {{ $utilizador->acn }}
                                        </td>
                                        <td class="text-center">
                                            {{ $utilizador->restricaoSubmetida ? 'Enviado' : 'Não Enviado' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
