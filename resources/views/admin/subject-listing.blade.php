<x-layouts.app>
    <x-layouts.navbar></x-layouts.navbar>

    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between pb-16">

            @php
                $title = isset($course) ? "Materias de $course" : "Materias";
                $message = isset($course) ? "Listado de materias de $course" : "Listado de todas las materias";
            @endphp

            <x-page-header :title="$title" :message="$message" />

            <div class="w-full flex-grow pt-10">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Materia</th>
                            @unless(isset($course))
                                <td>Curso</td>
                            @endunless
                            <th>Docente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                @unless(isset($course))
                                    <td>{{ $subject->course->course }}</td>
                                @endunless
                                <td>{{ $subject->teacher->proper_full_name }}</td>
                                <td>
                                    <button class="btn btn-info btn-xs">
                                        <a href={{ route('admin.subject.edit', ['subject' => $subject]) }}>cambiar docente</a>
                                    </button>
                                    {{--                                    <button class="btn btn-accent btn-xs">
                                                                            <a href={{ route('teacher.edit-subject-tests', ['subject' => $subject]) }}>calificar</a>
                                                                        </button>--}}
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
