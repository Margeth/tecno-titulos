<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">GESTION DE TRAMITES</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/procedure-requests') }}"><i class="nav-icon icon-ghost"></i> Solicitudes de tràmite</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/minutes') }}"><i class="nav-icon icon-ghost"></i>Actas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/user-academic-degrees') }}"><i class="nav-icon icon-graduation"></i>Títulos académicos de usuarios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/signers') }}"><i class="nav-icon icon-umbrella"></i> Trámites a firmar</a></li>

            <li class="nav-title">USUARIOS Y PERMISOS</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i>Gestión de usuarios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-drop"></i> Roles</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/permissions') }}"><i class="nav-icon icon-graduation"></i> Permisos</a></li>

            <li class="nav-title">GESTION DE TITULOS</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/type-academic-degrees') }}"><i class="nav-icon icon-plane"></i>Tipos de titulos</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/entities') }}"><i class="nav-icon icon-compass"></i>Entidades</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/academic-degrees') }}"><i class="nav-icon icon-umbrella"></i> Gestión de titulos</a></li>

           <li class="nav-item"><a class="nav-link" href="{{ url('admin/stats') }}"><i class="nav-icon icon-diamond"></i> Estadìsticas</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            <li class="nav-title">GESTION DE REQUISITOS</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/requirements') }}"><i class="nav-icon icon-diamond"></i> Gestión de requisitos generales</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/academic-degree-requirements') }}"><i class="nav-icon icon-flag"></i> Gestión de requisitos por Titulos</a></li>
            <!--
            <li class="nav-title">CONFIGURACIÓN</li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
            -->
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
