<x-layouts.app>
    <x-layouts.navbar/>
    <div class="container mx-auto">
        <div>
            <h1>Autorizaciones para calificar</h1>
            <form action={{ route('admin.gradable.update') }} method="POST">
                @csrf
                @method('PUT')
                <ul class="flex flex-row gap-10">
                    @foreach ($states as $state)
                        <li class="flex flex-col">
                            <label>{{ $state->student_grade_column }}</label>
                            <input type="hidden" value="0" name="states[{{ $state->student_grade_column }}]">
                            <input type="checkbox" value="1" name="states[{{ $state->student_grade_column }}]" @checked($state->state)>
                        </li>
                    @endforeach
                </ul>
                <button class="btn-sm btn-primary mt-2" type="submit">ACTUALIZAR</button>
            </form>
        </div>
    </div>
</x-layouts.app>
