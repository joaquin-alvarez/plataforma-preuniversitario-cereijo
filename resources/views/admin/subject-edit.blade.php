<x-layouts.app>
    <x-layouts.navbar></x-layouts.navbar>

    <div class="container mx-auto min-h-screen">
        <div class="flex flex-col gap-6 justify-between pb-16 prose max-w-none">
            <div>
                <h1 class="pt-16" >Editando materia: {{ $subject->name }} {{ $subject->course->course }}</h1>
            </div>

            <div>
                <h2>Cambiar docente</h2>
                <form method="POST" action="{{ route('admin.subject.update', ['subject' => $subject]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="flex flex-row" x-data="dropdownFilter">
                        <div class="flex-grow">
                            <ul>
                                <li>
                                    <p>Actual: <strong>{{ $subject->teacher->proper_full_name }} ( DNI: {{ $subject->teacher->dni }} )</strong></p>
                                </li>
                                <li x-show="selectedTeacher">
                                    <p>Nuevo: <strong x-text="selectedTeacher ? selectedTeacher.proper_full_name + ' ( DNI: ' + selectedTeacher.dni + ' )': ''"></strong></p>
                                </li>
                            </ul>
                        </div>

                        <div class="basis-1/2">
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn m-1">Seleccionar nuevo docente</div>
                                <div tabindex="0" class="dropdown-content z-[1] card card-compact w-96 p-2 shadow bg-base-100">
                                    <input name="teacher_dni" type="hidden" :value="selectedTeacher.dni" required>
                                    <input type="number" placeholder="DNI del docente..." class="input input-bordered input-m w-full" x-model="searchTerm">
                                    <div :class="searchTerm ? 'mt-3' : ''">
                                        <template x-for="teacher in teachers">
                                            <div class="hover:bg-base-300 p-2 rounded cursor-pointer" x-show="searchTerm && teacher.dni.toString().includes(searchTerm.toLowerCase())"
                                                 x-text="teacher.proper_full_name" @@click="selectedTeacher = teacher">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button x-cloak type="submit" x-show="selectedTeacher" class="btn btn-primary mt-8">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="divider divider-secondary"></div>
        </div>
    </div>
    <script>
            let teachers = {{ Js::from($teachers) }};

            document.addEventListener('alpine:init', () => {
                Alpine.data('dropdownFilter', () => ({
                    searchTerm: '',
                    teachers: teachers,
                    selectedTeacher: '',
                }));
            });
    </script>
</x-layouts.app>
