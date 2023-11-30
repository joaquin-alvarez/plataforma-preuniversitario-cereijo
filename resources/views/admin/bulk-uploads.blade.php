<x-layouts.app>
    <x-layouts.navbar/>

    <div class="container mx-auto">
        <div class="flex flex-col gap-6 justify-between prose prose-slate max-w-none">
            <div>
                <h1 class="pt-16">Carga de datos</h1>
                <p>Creación de alumnos y docentes en masa utilizando hojas de cálculo. Asignación de materias a docentes con la misma metodología.</p>
            </div>
            <div>
                <h2>Carga de alumnos</h2>
                <ol>
                    <li>
                        <a class="link" href="{{ Storage::url('app/public/file-1') }}" download>Descargá la plantilla (.xlsx)</a>
                    </li>
                    <li>
                        Completala y subila
                    </li>
                    <li>
                        <strong>IMPORTANTE:</strong> Tené en cuenta que en caso de ya existir alumnos con el mismo DNI el mismo será actualizado con la información de la hoja de cálculo.
                    </li>
                </ol>
                <div class="pt-6">
                    <form method="GET">
                        <div class="flex flex-col">
                            <label for="file"></label>
                            <input name="file" type="file" class="file-input file-input-bordered w-full max-w-xs" />
                        </div>
                            <button disabled class="btn btn-primary mt-10 max-w-xs w-full" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="divider divider-secondary"></div>
            <div>
                <h2>Carga de docentes</h2>
                <ol>
                    <li>
                        <a class="link" href="{{ Storage::url('app/public/file-1') }}" download>Descargá la plantilla (.xlsx)</a>
                    </li>
                    <li>
                        Completala y subila
                    </li>
                    <li>
                        <strong>IMPORTANTE:</strong> Tené en cuenta que en caso de ya existir docentes con el mismo DNI el mismo será actualizado con la información de la hoja de cálculo.
                    </li>
                </ol>
                <div class="pt-6">
                    <form method="GET">
                        <div class="flex flex-col">
                            <label for="file"></label>
                            <input name="file" type="file" class="file-input file-input-bordered w-full max-w-xs" />
                        </div>
                        <button disabled class="btn btn-primary mt-10 max-w-xs w-full" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
