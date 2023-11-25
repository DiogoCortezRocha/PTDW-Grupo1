@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">

                        <div class="col-9">
                            <h2 class="card-title" ><strong>Listagem de Docentes</strong></h2>
                        </div>
                        <div class="col-1">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 80%" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style> svg{fill:#0ebdc7}</style><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 408c0 13.3-10.7 24-24 24s-24-10.7-24-24V305.9l-31 31c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l72-72c9.4-9.4 24.6-9.4 33.9 0l72 72c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-31-31V408z"/></svg>
                        </div>
                        <div class="col-2 botaoAddUser">
                            <a href="#" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
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
                                        Observação
                                    </th>
                                    <th class="text-center">
                                        Estado
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        123444
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        niger@ua.pt
                                    </td>
                                    <td class="text-center">
                                        So tem 2 blocos disponiveis
                                    </td>
                                    <td class="text-center">
                                        Enviado
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdoxwn">
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





                                <tr>
                                    <td>
                                        123344
                                    </td>
                                    <td>
                                        Curaçao
                                    </td>
                                    <td>
                                        curaçao@ua.pt
                                    </td>
                                    <td class="text-center">
                                            atrasado 2 dias
                                    </td>
                                    <td class="text-center">
                                        Por enviar
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







                                <tr>
                                    <td>
                                        123355
                                    </td>
                                    <td>
                                       maria
                                    </td>
                                    <td>
                                        maria@ua.pt
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                       Enviado
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





                                <tr>
                                    <td>
                                       124466
                                    </td>
                                    <td>
                                        manel
                                    </td>
                                    <td>
                                        manel@ua.pt
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                       Enviado
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




                                <tr>
                                    <td>
                                        124488
                                    </td>
                                    <td>
                                        Malawi
                                    </td>
                                    <td>
                                        malaki@ua.pt
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                       Enviado
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




                                <tr>
                                    <td>
                                        125599
                                    </td>
                                    <td>
                                        Chile
                                    </td>
                                    <td>
                                       chile@ua.pt
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                        Enviado
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



                                <tr>
                                    <td>
                                        126699
                                    </td>
                                    <td>
                                        Portugal
                                    </td>
                                    <td>
                                        Portugal@ua.pt
                                    </td>
                                    <td class="text-center">
                                        atrasado 2 dias
                                    </td>
                                    <td class="text-center">
                                        Por enviar
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
