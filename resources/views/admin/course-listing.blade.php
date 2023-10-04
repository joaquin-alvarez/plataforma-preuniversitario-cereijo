<x-layouts.app>
    <x-layouts.navbar></x-layouts.navbar>

    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between pb-16">

            <x-page-header title="Cursos" message="Listado de todos los cursos" />

            <div class="w-full flex-grow pt-10">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->course }}</td>
                                <td>
                                    <button class="btn btn-ghost btn-xs"><a href={{ route('admin.course.student.index', ['course' => $course]) }}>ver alumnos</a></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
