<div class="navbar bg-base-300">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a>Item 1</a></li>
                <li>
                    <a>Parent</a>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            @can('navigate-as-admin')
                <li tabindex="0">
                    <details>
                        <summary>Materias</summary>
                        <ul class="p-2">
                            <li><a href="{{ route('admin.subject_management.create') }}">Cambio de docente</a></li>
                        </ul>
                    </details>
                </li>
                <li tabindex="0">
                    <details>
                        <summary>Usuarios</summary>
                        <ul class="p-2">
                            <li><a href="{{ route('admin.user.create') }}">Nuevo usuario</a></li>
                            <li><a href="{{ route('admin.user.edit') }}">Editar usuario</a></li>
                            <li><a href="{{ route('admin.user.delete') }}">Eliminar usuario</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="{{ route('admin.bulk_uploads.create') }}">Carga de datos</a></li>
            @endcan
            @can('navigate-as-teacher')
                <li><a>Cursos</a></li>
                <li tabindex="0">
                    <details>
                        <summary>Usuarios</summary>
                        <ul class="p-2">
                            <li><a>Cambio de contraseña</a></li>
                            <li><a>Nuevo usuario</a></li>
                            <li><a>Eliminar usuario</a></li>
                        </ul>
                    </details>
                </li>
                <li><a>Item 3</a></li>
            @endcan
            @can('navigate-as-student')
                <li><a>Cursos</a></li>
                <li tabindex="0">
                    <details>
                        <summary>Usuarios</summary>
                        <ul class="p-2">
                            <li><a>Docentes</a></li>
                            <li><a>Estudiantes</a></li>
                        </ul>
                    </details>
                </li>
                <li><a>Item 3</a></li>
            @endcan
        </ul>
    </div>
    <div class="navbar-end">
        <button class="btn"><a href={{ route('logout') }}>Salir</a></button>
    </div>
</div>
