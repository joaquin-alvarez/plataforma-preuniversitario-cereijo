<x-layouts.guest>
    <div class="container mx-auto">
        <div class="card w-96 bg-base-100 shadow-xl mx-auto my-24">
            <div class="card-body">
                <h2 class="card-title">Login</h2>
                <form method="post" action={{ route('login') }}>
                    @csrf
                    <div class="form-control w-full max-w-xs">
                        <label class="label" for="dni">
                            <span class="label-text">DNI</span>
                        </label>
                        <input type="number" value="{{ old('dni') }}" class="input input-bordered w-full max-w-xs @error('dni') input-error @else input-secondary @enderror" name="dni" id="dni" required />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label" for="password">
                            <span class="label-text">Contraseña</span>
                        </label>
                        <input type="password" class="input input-bordered w-full max-w-xs @error('password') input-error @else input-secondary @enderror" name="password" id="password" required />
                    </div>
                    @error('login')
                    <span class="text-error">{{ $message }}</span>
                    @enderror
                    <div class="card-actions justify-start">
                        <button type="submit" class="btn btn-primary mt-6">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>
