<x-layouts.admin-dashboard>
    <div class="prose max-w-none w-full flex flex-col">
        <!-- Page Header -->
        <h1 class="text-2xl font-bold">Crear Amonestación</h1>
        
        <!-- Student Info -->
        <div class="mt-4">
            <p><strong>Alumno:</strong> {{ $student->proper_full_name }}</p>
            <p><strong>DNI:</strong> {{ $student->dni }}</p>
        </div>
        
        <!-- Form -->
        <form method="POST" action="{{ route('admin.student_warnings.store') }}" class="mt-4">
            @csrf
            
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
