<x-layouts.app>
    <x-layouts.navbar/>
    <div class="container mx-auto">
        <div>
            <span class="font-bold">Test subida de alumnos en bulk</span>
            <form action="administrador/importar-estudiantes" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="file" required>

                <button class="btn-sm btn-primary" type="submit">Import</button>
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
                    <input type="radio" id="no" name="is_justified" value="0" @checked(true)>
                    <label for="no">No</label>
                    <input type="radio" id="yes" name="is_justified" value="1" >
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

            <div class="flex flex-col" x-data="{
                students: {{ Js::from($students) }},
                selected: [],
                get reports() { try { parsed = JSON.parse(this.selected); } catch(e) { return false; } return parsed; },
            }" >
                <div>
                    <span class="font-bold">Testing ver/editar ausentismo</span><br>
                    <label>Student DNI:
                        <select x-model="selected" x-on:change="console.log(reports)">
                            <template x-for="student in students">
                                <option x-bind:value="JSON.stringify(student.student_absence_reports)" x-text="student.dni" ></option>
                            </template>
                        </select><br><br>
                    </label>
                </div>
                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>comment</th>
                            <th>date</th>
                            <th>justified</th>
                            <th>controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="report in reports">
                            <tr>
                                <td x-text="report.comment"></td>
                                <td x-text="report.date_of_absence"></td>
                                <td x-text="report.is_justified"></td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                asdasd
            </div>
        </div>
    </div>
</x-layouts.app>
