<x-layouts.app>
    <x-layouts.navbar></x-layouts.navbar>
    
    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between pb-16">
            {{ $states }}
            <x-page-header title="Estado de periodos" message="Apertura y cierre de los periodos de calificación" />
            
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>1er trimestre</th>
                            <th>2do trimestre</th>
                            <th>3er trimestre</th>
                            <th>Diciembre</th>
                            <th>Marzo</th>
                            <th>Nota Final</th>
                        </tr>
                    </thead>
                    <tbody x-data="{}">
                        <!-- row 1 -->
                        <tr>
                            <td>
                                <input type="checkbox" class="toggle toggle-info toggle-md" />
                            </td>
                            <td>
                                <input type="checkbox" class="toggle toggle-info toggle-md" />
                            </td>
                            <td>
                                <input type="checkbox" class="toggle toggle-info toggle-md" />
                            </td>
                            <td>
                                <input type="checkbox" class="toggle toggle-info toggle-md" />
                            </td>
                            <td>
                                <input type="checkbox" class="toggle toggle-info toggle-md" />
                            </td>
                            <td>
                                <input type="checkbox" class="toggle toggle-info toggle-md" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>