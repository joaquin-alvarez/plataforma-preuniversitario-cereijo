<x-layouts.admin-dashboard>
    <div class="prose max-w-none w-full flex flex-col">
        <div class="text-md breadcrumbs">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Inicio</a></li> 
                <li><a href="{{ route('admin.student_warnings.index') }}">Buscar Amonestaciones</a></li> 
                <li>Editando: {{ $student->dni }}</li>
            </ul>
        </div>
        <div>
            <h1>Amonestaciones de: {{ $student->proper_full_name }}</h1>
        </div>
        <div class="flex flex-col gap-4">
            <div>
                rerer
            </div>
        </div>
    </div>
</x-layouts.admin-dashboard>