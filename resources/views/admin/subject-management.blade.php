@php use Illuminate\Support\Js; @endphp
<x-layouts.app>
    <x-layouts.navbar></x-layouts.navbar>

    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between pb-16 prose prose-slate max-w-none">

            <div>
                <h1 class="pt-16">Administrar Materias</h1>
                <p>Si lo que estás buscando es <b>asignar docentes a materias</b> desde una hoja de cálculos dirigite a: cargas masivas -> asignar docentes o al siguiente <a class="link" href="">link</a>.</p>
            </div>

            <div class="pt-8 flex flex-col gap-6 justify-between" x-data="{
                subjects: {{ Js::from($subjects) }},
                filter: '',
                filteredSubjects() {
                    return this.subjects.filter( subject =>
                        subject.name.toLowerCase().includes(this.filter.toLowerCase()) ||
                        subject.course.course.toLowerCase().includes(this.filter.toLowerCase())
                    );
                }
            }">
                <div>
                    <label class="block mx-3">
                        <svg
                            class="pointer-events-none absolute z-10 my-3.5 ms-4 stroke-current opacity-60 text-base-content"
                            width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <div>
                            <input x-model="filter" autocomplete="off" spellcheck="false" type="search" placeholder="Buscar Materias"
                                   class="w-full input accent-primary-focus py-3.5 pl-12 filter-input" />
                        </div>
                    </label>
                </div>

                <div class="overflow-x-auto mx-3">
                    <table class="table">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Materia</th>
                            <th>Docente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="subject in filteredSubjects()" :key="subject.id">
                            <tr>
                                <td>
                                    <span class="font-bold" x-text="subject.course.course"></span>
                                </td>
                                <td>
                                    <span class="font-bold" x-text="convertToTitleCase(subject.name)"></span>
                                </td>
                                <td>
                                    <span x-text="subject.teacher.proper_full_name"></span>
                                </td>
                                <th>
                                    <a :href="'/administrador/editar-materia/' + subject.id"><button type="button" class="btn btn-primary btn-xs">Cambiar Docente</button></a>
                                </th>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
