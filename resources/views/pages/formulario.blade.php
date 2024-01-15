@extends('layouts.app', ['page' => __('formulario'), 'pageSlug' => 'formulario'])

@section('content')
    <div class="row">

        <div class="tab">
            @foreach ($ucs as $unidadeCurricular)
                <button data-codigo="{{ $unidadeCurricular->codigo }}" data-name="{{ $unidadeCurricular->name }}"
                    data-laboratorio-obrigatorio="{{ $unidadeCurricular->LaboratorioObrigatorio }}"
                    data-laboratorio-preferencial="{{ $unidadeCurricular->LaboratorioPreferencial }}"
                    data-userUcGroupByUc="{{ json_encode($userUcGroupByUc[$unidadeCurricular->codigo] ?? []) }}"
                    data-salaAvaliacao="{{ $unidadeCurricular->salaAvaliacao }}"
                    data-software="{{ $unidadeCurricular->software }}"
                    onclick="fillForm(this);">{{ $unidadeCurricular->name }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form id="myForm" method="post" action="{{ url('formularioEdit') }}">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ __('Unidade curricular') }}</label>
                                    <input type="text" name="name"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Docente responsável') }}</label>
                                    <input type="text" name="docenteResponsavel"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Não têm docente Responsável') }}"
                                        value="{{ old('email', auth()->user()->email) }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div id="docentes-div" class="form-group{{ $errors->has('docentes') ? ' has-danger' : '' }}">
                            <label>{{ __('Outros docentes') }}</label>
                            <ul id="docentes-list">
                                <!-- Os docentes serão adicionados aqui pelo JavaScript -->
                            </ul>
                            @include('alerts.feedback', ['field' => 'docentes'])
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ __('Utilização de laboratorios') }}</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="obrigatorio"
                                                name="obrigatorio" @if ($unidadeCurricular->LaboratorioObrigatorio == 1) checked @endif>
                                            <label class="custom-control-label"
                                                for="obrigatorio">{{ __('Obrigatório') }}</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="preferencial"
                                                name="preferencial" @if ($unidadeCurricular->LaboratorioPreferencial == 1) checked @endif>
                                            <label class="custom-control-label"
                                                for="preferencial">{{ __('Preferencial') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('sala') ? ' has-danger' : '' }}">
                                    <label>{{ __('Laboratorios possiveis') }}</label>
                                    <select name="sala"
                                        class="form-control{{ $errors->has('sala') ? ' is-invalid' : '' }}">
                                        <option value="">{{ __('Nenhum') }}</option>
                                        @foreach ($salas as $sala)
                                            <option value="{{ $sala->numero }}">{{ $sala->numero }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sala'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('sala') ? ' has-danger' : '' }}">
                                    <label>{{ __('Laboratorios possiveis') }}</label>
                                    <select name="sala"
                                        class="form-control{{ $errors->has('sala') ? ' is-invalid' : '' }}">
                                        <option value="">{{ __('Nenhum') }}</option>
                                        @foreach ($salas as $sala)
                                            <option value="{{ $sala->numero }}">{{ $sala->numero }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sala'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('sala') ? ' has-danger' : '' }}">
                                    <label>{{ __('Laboratorios possiveis') }}</label>
                                    <select name="sala"
                                        class="form-control{{ $errors->has('sala') ? ' is-invalid' : '' }}">
                                        <option value="">{{ __('Nenhum') }}</option>
                                        @foreach ($salas as $sala)
                                            <option value="{{ $sala->numero }}">{{ $sala->numero }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sala'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('software') ? ' has-danger' : '' }}">
                            <label>{{ __('Software necessário(nome,fabricante,versão,sistema operativo)') }}</label>
                            <input type="text" name="software"
                                class="form-control{{ $errors->has('software') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'software'])
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-danger' : '' }}">
                            <label>{{ __('Sala para Avaliação') }}</label>
                            <select name="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}">

                                @foreach ($tiposSalas as $tipo)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'tipo'])
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="text-right"> <!-- Alinhamento à direita -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </form>



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

        .tab button.selected {
            background-color: #e7e9eb;
            /* Substitua #your-color pela cor que você deseja */
        }

        form.readonly {
            background-color: #f0f0f0;
        }
    </style>
    <script>
        var originalAction = document.getElementById('myForm').action;

        function fillForm(button) {
            var name = button.getAttribute('data-name');
            var salaAvaliacao = button.getAttribute('data-salaAvaliacao');
            var laboratorioObrigatorio = button.getAttribute('data-laboratorio-obrigatorio');
            var laboratorioPreferencial = button.getAttribute('data-laboratorio-preferencial');
            var software = button.getAttribute('data-software');
            var codigoUc = button.getAttribute('data-codigo');
            var authUserNumeroFuncionario = @json(auth()->user()->numeroFuncionario);
            var userUcGroupByUc = JSON.parse(button.getAttribute('data-userUcGroupByUc'));

            console.log(userUcGroupByUc);
            document.querySelector('input[name="name"]').value = name;
            document.querySelector('input[name="obrigatorio"]').checked = laboratorioObrigatorio == 1;
            document.querySelector('input[name="preferencial"]').checked = laboratorioPreferencial == 1;
            document.querySelector('input[name="software"]').value = software;
            // Reset a ação do formulário para a ação original
            document.getElementById('myForm').action = originalAction;

            // Adicione o novo codigoUc ao final da ação do formulário
            document.getElementById('myForm').action += "/" + codigoUc;
            // Obtenha o elemento select para tipos de salas
            var tiposSalasSelect = document.querySelector('select[name="tipo"]');

            // Crie um novo elemento de opção
            var salaAvaliacaoOption = document.createElement('option');
            salaAvaliacaoOption.text = salaAvaliacao;
            salaAvaliacaoOption.value = salaAvaliacao;

            // Adicione a nova opção ao início do select
            tiposSalasSelect.insertBefore(salaAvaliacaoOption, tiposSalasSelect.firstChild);
            tiposSalasSelect.value = salaAvaliacao;

            var docenteResponsavelInput = document.querySelector('input[name="docenteResponsavel"]');
            var docentesList = document.getElementById('docentes-list');
            docentesList.innerHTML = ''; // Limpa a lista de docentes

            var docenteResponsavel = '';
            var outrosDocentes = [];
            var docentes = @json($docentes);
            var docentesMap = {};
            docentes.forEach(function(docente) {
                docentesMap[docente.numeroFuncionario] = docente.nome;
            });


            userUcGroupByUc.forEach(function(registro) {
                if (registro.docenteresponsavel == true) {
                    docenteResponsavel = registro.numeroFuncionario;
                    docenteResponsavelInput.value = docentesMap[docenteResponsavel];
                }
                if (Number(codigoUc) === Number(registro.codigoUC)) {
                    outrosDocentes.push(registro.numeroFuncionario);
                }
            });

            // Adiciona outros docentes à lista, excluindo o docente responsável
            if (docenteResponsavel === '') {
                docenteResponsavelInput.value = '';
                outrosDocentes = userUcGroupByUc.map(registro => registro.numeroFuncionario);
            }


            outrosDocentes.forEach(function(outroDocente) {

                if (outroDocente !== docenteResponsavel) {
                    var listItem = document.createElement('li');
                    listItem.textContent = docentesMap[outroDocente];
                    docentesList.appendChild(listItem);
                }
            });

            var docentesDiv = document.getElementById('docentes-div');
            if (docentesList.childElementCount === 0) {
                docentesDiv.style.display = 'none';
            } else {
                docentesDiv.style.display = 'block';
            }


            if (docenteResponsavel === authUserNumeroFuncionario) {
                // tornar o formulário editável
                document.querySelector('form').classList.remove('readonly');
                document.querySelectorAll('input, select, button[type="submit"]').forEach(function(element) {
                    element.removeAttribute('disabled');
                });
            } else {
                // tornar o formulário somente leitura
                document.querySelector('form').classList.add('readonly');
                document.querySelectorAll('input, select, button[type="submit"]').forEach(function(element) {
                    element.setAttribute('disabled', 'disabled');
                });
            }
        }


        window.onload = function() {
            // Seleciona o primeiro botão quando a página é carregada
            var firstButton = document.querySelector('.tab button');
            firstButton.click();
            firstButton.classList.add('selected');
            // Adiciona a classe 'selected' ao botão quando ele é clicado
            var buttons = document.querySelectorAll('.tab button');
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Remove a classe 'selected' de todos os botões
                    buttons.forEach(function(btn) {
                        btn.classList.remove('selected');
                    });

                    // Adiciona a classe 'selected' ao botão clicado
                    this.classList.add('selected');
                });
            });
        }
    </script>
@endsection
