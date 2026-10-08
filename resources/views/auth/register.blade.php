<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="auth-card">
                    <h1 class="h3 mb-1">Registrati</h1>
                    <p class="auth-muted mb-4">Crea il tuo account per inserire un annuncio.</p>

                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-6">
                                <label for="name" class="form-label">Nome</label>
                                <input id="name" type="text" name="name"
                                       class="form-control auth-input @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" placeholder="Il tuo nome"
                                       required autofocus autocomplete="given-name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="cognome" class="form-label">Cognome</label>
                                <input id="cognome" type="text" name="cognome"
                                       class="form-control auth-input @error('cognome') is-invalid @enderror"
                                       value="{{ old('cognome') }}" placeholder="Il tuo cognome"
                                       required autocomplete="family-name">
                                @error('cognome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email"
                                   class="form-control auth-input @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="nome@email.it"
                                   required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password"
                                   class="form-control auth-input @error('password') is-invalid @enderror"
                                   placeholder="Almeno 8 caratteri"
                                   required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Conferma password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   class="form-control auth-input"
                                   placeholder="Ripeti la password"
                                   required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn auth-btn w-100">
                            Registrati 
                        </button>
                    </form>

                    <p class="text-center auth-muted mt-4 mb-0">
                        Hai già un account? <a href="{{ route('login') }}">Accedi</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>