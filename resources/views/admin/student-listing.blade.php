<x-layouts.app>
    <x-layouts.navbar/>

    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between pb-16">

            <x-page-header title="Alumnos de {{ $course }}" />

            <div x-data="filterTable(['dni', 'last_name'])">
                <div class="w-full flex-grow">

                    <div class="mb-5">
                        <input x-model="search" type="text" placeholder="Buscar..." class="input input-bordered input-md w-full max-w-md" />
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th>
                                <th>
                                    Alumno
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr x-show="filterItem({{$student}})" x-transition>
                                    <td></td>
                                    <td>{{ $student }}</td>
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
                        return keys.some(key => String(item[key]).toUpperCase().includes(this.search.toUpperCase()));
                    }
                }
            }
        </script>
    @endpush
</x-layouts.app>
