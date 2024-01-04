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
                <li class="comissaoHorarios-item" @if ($pageSlug == 'users') class="active " @endif>
                    <a href="{{ route('user.index') }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>{{ __('Gestao Utilizadores') }}</p>
                    </a>
                </li>

                <li class="comissaoHorarios-item" @if ($pageSlug == 'tables') class="active " @endif>
                    <a href="{{ route('pages.tables') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Docentes') }}</p>
                    </a>
                </li>
                <li class="comissaoHorarios-item" @if ($pageSlug == 'unidadesCurriculares') class="active" @endif>
                    <a href="{{ route('pages.unidadesCurriculares') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Unidades Curriculares') }}</p>
                    </a>
                </li>
                <li class="comissaoHorarios-item" @if ($pageSlug == 'ciclosEstudos') class="active" @endif>
                    <a href="{{ route('pages.ciclosEstudos') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Ciclos de Estudos') }}</p>
                    </a>
                </li>
            @endif



            @if (auth()->user()->tipoUtilizador == 'docente' || auth()->user()->tipoUtilizador == 'ambos')
                <li class="docente-item" @if ($pageSlug == 'formulario') class="active " @endif>
                    <a href="{{ route('pages.formulario') }}">
                        <i class="tim-icons icon-notes"></i>
                        <p>{{ __('Especificidades de salas') }}</p>
                    </a>
                </li>

                <li class="docente-item" @if ($pageSlug == 'horarios') class="active" @endif>
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

    if (btnDocente) {
        btnDocente.addEventListener('click', function() {
            document.querySelectorAll('.docente-item').forEach(function(item) {
                item.style.display = 'block';
            });
            document.querySelectorAll('.comissaoHorarios-item').forEach(function(item) {
                item.style.display = 'none';
            });
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
