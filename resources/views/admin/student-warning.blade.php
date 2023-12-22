<x-layouts.admin-dashboard>
  <div class="prose max-w-none w-full flex flex-col">
    <div>
      <h1>Amonestaciones de Alumnos</h1>
    </div>
    <div>
      <div>
        <h3> 
          Search Contacts 
          <span class="htmx-indicator"> 
            <span class="loading loading-spinner loading-lg"></span>
          </span> 
        </h3>
        <input class="form-control" type="search" 
        name="search" placeholder="Begin Typing To Search Users..." 
        hx-get="{{ route('admin.student_warnings.index') }}"
        {{-- hx-header="{'X-CSRF-TOKEN':'{{ csrf_token() }}', 'my-header':'joaco'}" --}}
        hx-trigger="input changed delay:500ms, search" 
        hx-target="this" 
        hx-indicator=".htmx-indicator">
        
        @isset($students)
        @fragment('student-list')
        <ul>
          @if ($students->count > 0)
          @foreach ($students as $student)
          <li>{{ $student->name }}</li>
          @endforeach
          @else
          "No se encontraron resultados"
          @endif
        </ul>
        @endfragment
        @endisset
      </div>
      <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>
                <label>
                  <input type="checkbox" class="checkbox" />
                </label>
              </th>
              <th>Name</th>
              <th>Job</th>
              <th>Favorite Color</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <th>
                <label>
                  <input type="checkbox" class="checkbox" />
                </label>
              </th>
              <td>
                <div class="flex items-center gap-3">
                  <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                      <img src="/tailwind-css-component-profile-2@56w.png" alt="Avatar Tailwind CSS Component" />
                    </div>
                  </div>
                  <div>
                    <div class="font-bold">Hart Hagerty</div>
                    <div class="text-sm opacity-50">United States</div>
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
          </table>
        </div>
      </div>
    </div>
</x-layouts.admin-dashboard>