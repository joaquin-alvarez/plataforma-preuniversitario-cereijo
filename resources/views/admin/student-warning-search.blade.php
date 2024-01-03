<x-layouts.admin-dashboard>
  <div class="prose max-w-none w-full flex flex-col">
    
    <h1 class="font-bold">Amonestaciones de Alumnos</h1>
    
    <div class="flex flex-col gap-4 mt-4">

      <x-active-search route="admin.student_warnings.search" placeholder="DNI del alumno"/>

      <div class="overflow-x-auto">
        <table id="response" class="table">
          <!-- head -->
          @isset($students)
          @fragment('result-list')
          @if($students->count() > 0)
          <thead>
            <tr>
              <th>Alumno</th>
              <th>Curso</th>
              <th>Nº de Amonestaciones</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
            <tr>
              <td>
                {{ $student->dni }} 
                ({{ $student->proper_full_name }})
              </td>
              <td>
                {{ $student->studentCourse->course }}
              </td>
              <td>
                {{ $student->student_warnings_count }}
              </td>
              <th>
                <a href="{{ route('admin.student_warnings.show', ['user' => $student]) }}">
                  <button class="btn btn-ghost btn-xs">ver amonestaciones</button>
                </a>
                <a href="{{ route('admin.student_warnings.create', ['user' => $student]) }}">
                  <button class="btn btn-ghost btn-xs">amonestar</button>
                </a>
              </th>
            </tr>
            @endforeach
            @else
            "Cero resultados"
            @endif
            @endfragment
            @endisset
            
            
            
          </table>
        </div>
      </div>
    </div>
  </x-layouts.admin-dashboard>