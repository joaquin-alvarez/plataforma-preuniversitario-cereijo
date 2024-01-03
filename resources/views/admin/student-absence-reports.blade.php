<x-layouts.admin-dashboard>
    <div class="prose max-w-none w-full">
        <h1>Ausencias de alumnos</h1>
        
        <div>
            <form method="POST" action="{{ route('admin.student_warnings.store') }}" class="mt-4">
                <div class="input-group">
                <label>DNI del alumno</label>
                <input type="search" name="search" placeholder="DNI del Alumno" class="pl-12 block input input-bordered w-full max-w-xs" 
                hx-post="{{ route('admin.student_absences.search') }}"
                hx-headers='{"X-CSRF-TOKEN":"{{ csrf_token() }}"}'
                hx-target="#response"
                hx-trigger="input changed delay:500ms, search"
                />
                <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
            <div>
                
                <table class="table" id="response">
                    @isset($students)
                    @fragment('student-list')
                    @if ($students->count() > 0)
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Curso</th>
                            <th>Nº de Ausencias</th>
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
                                {{ $student }}
                            </td>
                            <th>
                                <a href="{{ route('admin.student_warnings.show', ['user' => $student]) }}">
                                    <button class="btn btn-ghost btn-xs">ver ausencias</button>
                                </a>
                                <a href="{{ route('admin.student_warnings.create', ['user' => $student]) }}">
                                    <button class="btn btn-ghost btn-xs">nueva ausencia</button>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
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