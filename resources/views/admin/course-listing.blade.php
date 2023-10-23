<x-layouts.app>
    <x-layouts.navbar></x-layouts.navbar>

    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between pb-16">

            <x-page-header title="Cursos" message="Listado de todos los cursos" />

            <div x-data="filterTable(['course'])">
                <div class="w-full flex-grow pt-10">
                    <div class="mb-5">
                        <input x-model="search" type="text" placeholder="Buscar..." class="input input-bordered input-md w-full max-w-md" />
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table" x-data="{ checked: false }">
                            <thead>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" x-model="checked" />
                                    </label>
                                </th>
                                <th>Curso</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr x-show="filterItem({{$course}})" x-transition>
                                    <td>
                                        <input type="checkbox" class="checkbox" x-model="checked" />
                                    </td>
                                    <td>{{ $course->course }}</td>
                                    <td>
                                        <button class="btn btn-ghost btn-xs"><a href={{ route('admin.course.student.index', ['course' => $course]) }}>ver alumnos</a></button>
                                        <button class="btn btn-ghost btn-xs"><a href={{ route('admin.course.subject.index', ['course' => $course]) }}>ver materias</a></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            function filterTable(keys = [])
            {
                return {
                    search: '',
                    filterItem(item) {
                        if (!keys.length) return true;
                        return keys.some(key => String(item[key]).includes(this.search.toUpperCase()));
                    }
                }
            }
        </script>
    @endpush
</x-layouts.app>
