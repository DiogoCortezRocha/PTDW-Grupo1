<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo logo-container" style="display: flex; flex-direction: column; align-items: flex-start;">
            <div style="display: flex; align-items: center; width: 100%;">
                <img src="{{ asset('white/img/ua-logo.svg') }}" alt="logotipo" width="45">
                <div class="UA" style="font-size: 30px; margin-left: 10px;">ESTGA</div>
            </div>
            @if (auth()->user()->tipoUtilizador == 'ambos')
            <hr style="width: 100%; border: 0; border-top: 1px solid #e8eaedc0;">

            <div class="row">
                <div class="col-md-6 px-1 mb-2">
                    <button id="btn-docente" class="btn btn-primary w-100 d-flex justify-content-center" style="padding: 10px; font-size: 16px;">Docente</button>
                </div>
                <div class="col-md-6 px-1 mb-2">
                    <button id="btn-comissaoHorarios" class="btn btn-primary w-100 d-flex justify-content-center flex-column" style="padding: 10px; font-size: 16px;">Comissão <br> Horários</button>
                </div>
            </div>
        @endif
        </div>
        <ul class="nav">

            @if (auth()->user()->tipoUtilizador == 'comissaoHorarios' || auth()->user()->tipoUtilizador == 'ambos')
                <li class="comissaoHorarios-item @if ($pageSlug == 'dashboard') active @endif">
                    <a href="{{ route('dashboardPage') }}">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>{{ __('Pagina Inicial') }}</p>
                    </a>
                </li>



                <li class="comissaoHorarios-item @if ($pageSlug == 'users') active @endif">
                    <a href="{{ route('user.index') }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>{{ __('Gestao Utilizadores') }}</p>
                    </a>
                </li>

                <li class="comissaoHorarios-item @if ($pageSlug == 'docentes') active @endif">
                    <a href="{{ route('pages.docentes') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('docentes') }}</p>
                    </a>
                </li>
                <li class="comissaoHorarios-item @if ($pageSlug == 'unidadesCurriculares') active @endif">
                    <a href="{{ route('pages.unidadesCurriculares') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Unidades Curriculares') }}</p>
                    </a>
                </li>
                <li class="comissaoHorarios-item @if ($pageSlug == 'ciclosEstudos') active @endif">
                    <a href="{{ route('pages.ciclosEstudos') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Cursos') }}</p>
                    </a>
                </li>
            @endif



            @if (auth()->user()->tipoUtilizador == 'docente' || auth()->user()->tipoUtilizador == 'ambos')
                <li class="docente-item @if ($pageSlug == 'horarios') active @endif">
                    <a href="{{ route('pages.horarios') }}">
                        <i class="tim-icons icon-calendar-60"></i>
                        <p>{{ __('Restrições de horários') }}</p>
                    </a>
                </li>
                <li class="docente-item @if ($pageSlug == 'formulario') active @endif">
                    <a href="{{ route('pages.formulario') }}">
                        <i class="tim-icons icon-notes"></i>
                        <p>{{ __('Especificidades de salas') }}</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const btnDocente = document.getElementById('btn-docente');
        const btnComissaoHorarios = document.getElementById('btn-comissaoHorarios');
        const userType = "{{ auth()->user()->tipoUtilizador }}";

        // Esconde todos os itens de menu quando a página é carregada
        document.querySelectorAll('.docente-item, .comissaoHorarios-item').forEach(function(item) {
            item.style.display = 'none';
        });

        // Verifica se há uma seleção armazenada no localStorage e mostra os itens de menu apropriados
        const selection = localStorage.getItem('selection');

        if (userType === 'docente' || selection === 'docente' || (selection === null && userType !==
                'comissaoHorarios')) {
            document.querySelectorAll('.docente-item').forEach(function(item) {
                item.style.display = 'block';
            });
        } else if (userType === 'comissaoHorarios' || selection === 'comissaoHorarios') {
            document.querySelectorAll('.comissaoHorarios-item').forEach(function(item) {
                item.style.display = 'block';
            });
        }

        if (btnDocente) {
            btnDocente.addEventListener('click', function() {
                document.querySelectorAll('.docente-item').forEach(function(item) {
                    item.style.display = 'block';
                });
                document.querySelectorAll('.comissaoHorarios-item').forEach(function(item) {
                    item.style.display = 'none';
                });
                // Armazena a seleção no localStorage
                localStorage.setItem('selection', 'docente');

                window.location.href = "/dashboard?selection=docente";
            });
        }

        if (btnComissaoHorarios) {
            btnComissaoHorarios.addEventListener('click', function() {
                document.querySelectorAll('.docente-item').forEach(function(item) {
                    item.style.display = 'none';
                });
                document.querySelectorAll('.comissaoHorarios-item').forEach(function(item) {
                    item.style.display = 'block';
                });
                // Armazena a seleção no localStorage
                localStorage.setItem('selection', 'comissaoHorarios');

                window.location.href = "/dashboard?selection=comissaoHorarios";
            });
        }
    });
</script>
<style>
    .logo-container {
        display: flex;
        align-items: center;
    }

    .button-container {
        display: flex;
        flex-direction: column;
        margin-left: 10px;
    }


    .button-container .btn {
        text-align: left;
        white-space: normal;
        line-height: 1.2;
    }
</style>
