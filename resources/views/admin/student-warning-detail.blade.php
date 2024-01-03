<x-layouts.admin-dashboard>
    <div class="prose max-w-none w-full flex flex-col">

        <div class="breadcrumbs py-0 text-md">
            <ul class="my-0 p-0">
                <li><a class="font-normal" href="{{ route('admin.dashboard') }}">Inicio</a></li> 
                <li><a class="font-normal" href="{{ route('admin.student_warnings.index') }}">Buscar Amonestaciones</a></li> 
                <li>Editando: {{ $student->dni }}</li>
            </ul>
        </div>

        <div class="mt-4">
            <h1 class="font-bold">Amonestaciones de: {{ $student->proper_full_name }}</h1>
        </div>

        <div class="mt-4">
            
        </div>
    </div>
</x-layouts.admin-dashboard>