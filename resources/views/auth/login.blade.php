<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="auth-card">
                    <h1 class="h3 mb-1">Bentornato</h1>
                    <p class="auth-muted mb-4">Accedi per inserire il tuo annuncio.</p>

                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email"
                                   class="form-control auth-input @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="nome@email.it"
                                   required autofocus autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password"
                                   class="form-control auth-input @error('password') is-invalid @enderror"
                                   placeholder="La tua password"
                                   required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label auth-muted" for="remember">Ricordami</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small">Password dimenticata?</a>
                            @endif
                        </div>

                        <button type="submit" class="btn auth-btn w-100">Accedi</button>
                    </form>

                    <p class="text-center auth-muted mt-4 mb-0">
                        Non hai un account? <a href="{{ route('register') }}">Registrati</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>