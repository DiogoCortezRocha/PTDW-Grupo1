<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo logo-container">
            <strong> <a href="#" class="simple-text logo-normal">{{ __('ESTGA') }} </a></strong>
            @if (auth()->user()->tipoUtilizador == 'ambos')
                <div class="button-container">
                    <button id="btn-docente" class="btn btn-primary">Docente</button>
                    <button id="btn-comissaoHorarios" class="btn btn-primary">Comissão Horários</button>
                </div>
            @endif
        </div>
        <ul class="nav">


            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Perfil utilizador') }}</p>
                </a>
            </li>

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

                <li class="comissaoHorarios-item @if ($pageSlug == 'tables') active @endif">
                    <a href="{{ route('pages.tables') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Docentes') }}</p>
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
                        <p>{{ __('Ciclos de Estudos') }}</p>
                    </a>
                </li>
            @endif



            @if (auth()->user()->tipoUtilizador == 'docente' || auth()->user()->tipoUtilizador == 'ambos')
                <li class="docente-item @if ($pageSlug == 'formulario') active @endif">
                    <a href="{{ route('pages.formulario') }}">
                        <i class="tim-icons icon-notes"></i>
                        <p>{{ __('Especificidades de salas') }}</p>
                    </a>
                </li>

                <li class="docente-item @if ($pageSlug == 'horarios') active @endif">
                    <a href="{{ route('pages.horarios') }}">
                        <i class="tim-icons icon-calendar-60"></i>
                        <p>{{ __('Restrições de horários') }}</p>
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
