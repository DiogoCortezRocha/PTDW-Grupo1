@extends('layouts.app', ['page' => __('ciclosEstudos'), 'pageSlug' => 'ciclosEstudos'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h2 class="card-title"><strong>Listagem de Ciclos de Estudos</strong></h2>
                        </div>

                        <div class="col-3 text-right">
                            <a href="#" class="btn btn-sm btn-primary">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    <span>Adicionar</span>
                                    <span>UC</span>

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
                                        codigo
                                    </th>
                                    <th>
                                        Nome
                                    </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cursos as $curso)
                                
                                    <tr onclick="window.location='{{ route('detalhescurso',['codigo' => $curso] ) }}';" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f5f5f5';" onmouseout="this.style.backgroundColor='';">
                                        <td>
                                            {{ $curso->codigo }}
                                        </td>
                                        <td>
                                            {{ $curso->name }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                </div>
                                            </div>
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
