<x-layouts.admin-dashboard>
  <div class="prose max-w-none w-full flex flex-col">
    <div>
      <h1>Amonestaciones de Alumnos</h1>
    </div>
    <div class="flex flex-col gap-4">
      <div>
        <div>
          <label class="w-full">
            <svg class="pointer-events-none absolute z-10 my-3.5 ms-4 stroke-current opacity-60 text-base-content" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="search" name="search" placeholder="DNI del Alumno" class="pl-12 block input input-bordered w-full max-w-xs" 
            hx-post="{{ route('admin.student_warnings.search') }}"
            hx-headers='{"X-CSRF-TOKEN":"{{ csrf_token() }}"}'
            hx-target="#response"
            hx-trigger="input changed delay:500ms, search"
            />
          </label>
        </div>
      </div>
      <div class="overflow-x-auto">
        <table id="response" class="table">
          <!-- head -->
          @isset($students)
              @fragment('result-list')
              @if($students->count() > 0)
                <thead>
                  <tr>
                    <th>Alumno</th>
                    <th>Curso</th>
                    <th>Nº de Amonestaciones</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">{{ $student->dni }}</div>
                        <div class="text-sm opacity-100">{{ $student }}</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Zemlak, Daniel and Leannon
                    <br/>
                    <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                  </td>
                  <td>Purple</td>
                  <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                  </th>
                </tr>
                @endforeach
              @else
              "Cero resultados"
              @endif
            @endfragment
          @endisset
          
            
            
          </table>
        </div>
      </div>
    </div>
  </x-layouts.admin-dashboard>