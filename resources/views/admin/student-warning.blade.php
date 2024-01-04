<x-layouts.admin-dashboard>
  <div class="prose max-w-none w-full flex flex-col">
    
    <h1 class="font-bold">Amonestaciones de Alumnos</h1>
    
    <div class="flex flex-col gap-4 mt-4">
      
      <a class="self-end mp-4" href="{{ route('admin.student_warnings.create') }}">
        <button class="btn btn-primary">Crear amonestacion</button>
      </a>
      
      <div class="mt-4">
        <h2 class="font-bold mb-4">Buscador de amonestaciones</h2>
        <x-active-search route="admin.student_warnings" placeholder="DNI del alumno"/>
      </div>
      
      <div class="overflow-x-auto">
        <table id="response" class="table">
          <!-- head -->
          @fragment('result-list')
            @if($warnings->isNotEmpty())
            <thead>
              <tr>
                <th>Alumno</th>
                <th>Curso</th>
                <th>Fecha</th>
                <th>Razón</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($warnings as $warning)
              <tr>
                <td>
                  {{ $warning->student->dni }} 
                  ({{ $warning->student->proper_full_name }})
                </td>
                <td>
                  {{ $warning->student->studentCourse->course }}
                </td>
                <td>
                  {{ $warning->date_of }}
                </td>
                <td>
                  {{ $warning->reason }}
                </td>
                <td>
                  <a href="{{ route('admin.student_warnings.show', ['warning' => $warning]) }}">
                    <button class="btn btn-ghost btn-xs">ver</button>
                  </a>
                  <a href="{{ route('admin.student_warnings.edit', ['warning' => $warning]) }}">
                    <button class="btn btn-ghost btn-xs">editar</button>
                  </a>
                  <a href="{{ route('admin.student_warnings.destroy', ['warning' => $warning]) }}">
                    <button class="btn btn-ghost btn-xs">borrar</button>
                  </a>
                </td>
              </tr>
              @endforeach
              @endif
            @endfragment
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layouts.admin-dashboard>