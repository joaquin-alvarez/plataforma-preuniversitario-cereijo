<x-layouts.app>
    <x-layouts.navbar/>
    <div class="container mx-auto">
        <div>
            <span class="font-bold">Autorizaciones para calificar</span>
            <form action="{{ route('admin.gradable.update') }}" method="POST">
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

        <div class="mt-16">
            <span class="font-bold">Testing subir archivos</span>
            <form action="{{ route('admin.file.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="user_dni">User DNI:</label>
                <select id="user_dni" name="user_dni">
                    @foreach($users as $user)
                        <option value="{{ $user->dni }}">{{ $user->dni }}</option>
                    @endforeach
                </select><br><br>

                <label for="tag">Tag:</label>
                <select id="tag" name="tag">
                    <option value="1">REPORT_CARD</option>
                    <option value="2">ABSENCE_NOTE</option>
                </select><br><br>

                <label for="file">Choose file:</label>
                <input type="file" id="file" name="file"><br><br>

                <button class="btn-sm btn-primary" type="submit" >Upload</button>

                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>

    </div>
</x-layouts.app>
