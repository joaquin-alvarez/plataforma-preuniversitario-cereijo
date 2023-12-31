@php use Illuminate\Support\Facades\Storage; @endphp
<x-layouts.app>
    <div class="drawer lg:drawer-open">
        <input id="the-drawer" type="checkbox" class="drawer-toggle"/>
        <div class="drawer-content flex flex-col items-center">
            <div class="navbar bg-base-100">
                <div class="flex-1 justify-end">
                    <ul class="menu menu-horizontal px-1">
                        <li>
                            <details>
                                <summary>
                                    Mi Perfil
                                </summary>
                                <ul class="p-2 bg-base-100 rounded-t-none">
                                    <li><a>Cambio de contraseña</a></li>
                                    <li><a>No se</a></li>
                                </ul>
                            </details>
                        </li>
                        <li><a>Salir</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="p-4 sm:p-8 w-full">
                {{ $slot }}
            </div>
            
            <label for="the-drawer" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
            
        </div>
        <div class="drawer-side">
            <label for="the-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside class="bg-gray-50 min-h-screen w-80">
                <div class="bg-base-100 sticky top-0 z-20 hidden items-center gap-2 bg-opacity-90 px-4 py-2 backdrop-blur lg:flex shadow-sm">
                    <a href="#" class="flex-0 btn btn-ghost px-2">
                        <img alt="Logo Colegio Cereijo" width="40" height="40" src="{{ Storage::url('assets/logo.png') }}">
                        <div class="font-title inline-flex text-lg md:text-2xl text-slate-900">Colegio Cereijo</div>
                    </a>
                </div>
                <div class="h-4"></div>
                <ul class="menu bg-base-100 gap-4 pr-4 w-80 rounded-box">
                    <li>
                        <h2 class="prose text-slate-900 menu-title">Administrar Alumnos</h2>
                        <ul>
                            <li>
                                <a class="@isActiveRoute(['admin.student_warnings', 'admin.student_warnings.create', 'admin.student_warnings.show'])"
                                href="{{ route('admin.student_warnings') }}">Amonestaciones</a>
                            </li>
                            <li>
                                <a class="@isActiveRoute('admin.student_absence_reports.index')"
                                href="{{ route('admin.student_absence_reports.index') }}">Faltas / Retiros anticipados</a>
                            </li>
                            <li>
                                <a class=""
                                href="">Autorizados a retirar</a>
                            </li>
                            <li>
                                <a class="" 
                                href="">Buscador de alumnos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h2 class="prose text-slate-900 menu-title">Administrar Calificaciones</h2>
                            <ul>
                                <li><a href="">Apertura y cierre de Periodos de Calificaciones</a></li>
                                <li><a href="">Boletines de calificaciones</a></li>
                                <li><a href="">Buscador de calificaciones</a></li>
                            </ul>
                        </li>
                        <li>
                            <h2 class="prose text-slate-900 menu-title">Administrar Cursos</h2>
                            <ul>
                                <li><a href="">Cambiar Docente</a></li>
                            </ul>
                        </li>
                        <li>
                            <h2 class="prose text-slate-900 menu-title">Calendario</h2>
                            <ul>
                                <li><a href="">Administrar eventos</a></li>
                            </ul>
                        </li>
                        <li>
                            <h2 class="prose text-slate-900 menu-title">Cuentas de usuario</h2>
                            <ul>
                                <li><a href="">Administrar cuentas</a></li>
                            </ul>
                        </li>
                        <li>
                            <h2 class="prose text-slate-900 menu-title">Carga de datos</h2>
                            <ul>
                                <li><a href="">Cargar Alumnos y Docentes</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </x-layouts.app>
    