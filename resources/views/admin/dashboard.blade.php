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
            <span class="font-bold">Testing subir boletines</span>
            <form action="{{ route('admin.student_grades_report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="student_dni">Student DNI:</label>
                <select id="student_dni" name="student_dni">
                    @foreach($students as $student)
                        <option value="{{ $student->dni }}">{{ $student->dni }}</option>
                    @endforeach
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

        <div class="mt-16 flex flex-row gap-20">
            <div>
                <span class="font-bold">Testing crear ausencia</span>
                <form action="{{ route('admin.student_absence_report.store') }}" method="POST">
                    @csrf
                    <label for="student_dni">Student DNI:</label>
                    <select id="student_dni" name="student_dni">
                        @foreach($students as $student)
                            <option value="{{ $student->dni }}">{{ $student->dni }}</option>
                        @endforeach
                    </select><br><br>

                    <label for="date_of_absence">Choose :</label>
                    <input type="date" id="date_of_absence" name="date_of_absence"><br><br>

                    <label for="comment">Comentarios</label>
                    <input class="input input-bordered" type="text" id="comment" name="comment"><br><br>

                    <label for="is_justified">Esta justificada:</label>
                    <input type="radio" id="no" name="is_justified" value=false @checked(true)>
                    <label for="no">No</label>
                    <input type="radio" id="yes" name="is_justified" value=true>
                    <label for="yes">Si</label><br><br>

                    <button class="btn-sm btn-primary" type="submit" >Save</button>

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
            <div>
                <span class="font-bold">Testing ver ausentismo</span>
            </div>
        </div>
    </div>
</x-layouts.app>
