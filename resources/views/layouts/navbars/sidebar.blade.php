<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">

            <a href="#" class="simple-text logo-normal">{{ _('ESTGA') }} </a>
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
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Gestao Utilizadores') }}</p>
                </a>
            </li>


            <li @if ($pageSlug == 'Docentes') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('Docentes') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'formulario') class="active " @endif>
                <a href="{{ route('pages.formulario') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('Especificidades de salas') }}</p>
                </a>
            </li>


        </ul>
    </div>
</div>
