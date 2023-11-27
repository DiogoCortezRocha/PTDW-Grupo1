<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">

           <strong> <a href="#" class="simple-text logo-normal">{{ _('ESTGA') }} </a></strong>
        </div>
        <ul class="nav">


            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('Perfil utilizador') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('user.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('Gestao Utilizadores') }}</p>
                </a>
            </li>


            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Docentes') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'formulario') class="active " @endif>
                <a href="{{ route('pages.formulario') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ _('Especificidades de salas') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'horarios') class="active" @endif>
                <a href="{{ route('pages.horarios') }}">
                    <i class="tim-icons icon-calendar-60"></i>
                    <p>{{ _('Restrições de horários') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'unidadesCurriculares') class="active" @endif>
                <a href="{{ route('pages.unidadesCurriculares') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Unidades Curriculares') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'ciclosEstudos') class="active" @endif>
                <a href="{{ route('pages.ciclosEstudos') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Ciclos de Estudos') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
