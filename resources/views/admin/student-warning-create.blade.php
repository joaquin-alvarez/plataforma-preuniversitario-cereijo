<x-layouts.admin-dashboard>
    <div class="prose max-w-none w-full flex flex-col">
        <!-- Page Header -->
        <h1 class="text-2xl font-bold">Crear Amonestación</h1>
        
        <!-- Student Search -->
        <div class="form-control w-full max-w-sm mt-4">
            <form >
                <label class="w-full">
                    <svg class="pointer-events-none absolute z-10 my-3.5 ms-4 stroke-current opacity-60 text-base-content" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="search" name="search" placeholder="DNI del alumno" class="pl-12 block input input-bordered w-full max-w-xs" 
                    value="{{ request('search') }}"  
                    hx-get="{{ route( 'admin.student_search' ) }}"
                    hx-target="#response"
                    hx-trigger="input changed delay:500ms, search"
                    />
                </label>
            </form>
            <div id="response">
                @isset($result)
                    
                @endisset
            </div>
        </div>
        
        <!-- Form -->
        <form method="POST" action="{{ route('admin.student_warnings.store') }}" class="mt-4">
            @csrf

            <div class="form-control w-full max-w-sm">
                <label class="label">
                    <span class="label-text">Alumno</span>
                </label>
                <input type="numeric" name="dni" id="dni" required value="{{ old('dni') }}"
                class="@error('date_of') input-error @enderror disabled input input-bordered w-full max-w-xs">
                @error('date_of')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Fecha del Suceso Field (Datepicker) -->
            <div class="form-control w-full max-w-sm">
                <label class="label">
                    <span class="label-text">Fecha del Suceso</span>
                </label>
                <input type="date" name="date_of" id="date_of" required value="{{ old('date_of') }}"
                class="@error('date_of') input-error @enderror input input-bordered w-full max-w-xs">
                @error('date_of')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Razón Field -->
            <div class="form-control w-full mt-4">
                <label class="label">
                    <span class="label-text">Razón</span>
                </label>
                <input type="text" name="reason" id="reason" required value="{{ old('reason') }}" 
                class="@error('reason') input-error @enderror input input-bordered w-full">
                @error('reason')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Observaciones Field -->
            <div class="form-control w-full mt-4">
                <label class="label">
                    <span class="label-text">Observaciones</span>
                </label>
                <textarea name="observations" id="observations" rows="4" class="@error('observations') input-error @enderror textarea textarea-bordered h-24"></textarea>
                @error('observations')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</x-layouts.admin-dashboard>
