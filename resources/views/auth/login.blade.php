<x-layout>
    <div class="auth-page-container">
        <div class="auth-grid">

            <!-- ================= COLONNA SINISTRA ================= -->
            <div class="auth-col-left">
                <!-- Testo centrale -->
                <div class="my-auto py-3">
                    <h1 class="auth-heading fw-bold text-primary mb-3">
                        Dai una seconda vita<br>alle cose che non usi più
                    </h1>
                    <p class="auth-muted fs-6 mb-4">
                        Accedi per inserire e gestire i tuoi annunci in pochi minuti.
                    </p>

                    <!-- Le 3 pillole -->
                    <div class="auth-step-list d-flex gap-2">
                        <span class="auth-step-pill">1 Registrati</span>
                        <span class="auth-step-pill">2 Inserisci annuncio</span>
                        <span class="auth-step-pill">3 Libera spazio</span>
                    </div>
                </div>

                <!-- Cerchio decorativo in basso a sinistra -->
                <div class="pt-4">
                    <div class="auth-circle-shape"></div>
                </div>
            </div>

            <!-- ================= COLONNA DESTRA ================= -->
            <div class="auth-col-right">
                <!-- Switch in alto a destra: [ Accedi | Registrati ] -->
                <div class="auth-switch-pill mb-4">
                    <a href="{{ route('login') }}" class="active">Accedi</a>
                    <a href="{{ route('register') }}">Registrati</a>
                </div>

                <!-- Form centrato nella sua metà -->
                <div class="auth-form-content">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label auth-muted small mb-1">Email</label>
                            <input id="email" type="email" name="email"
                                   class="form-control auth-input @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="nome@email.it"
                                   required autofocus autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label auth-muted small mb-1">Password</label>
                            <input id="password" type="password" name="password"
                                   class="form-control auth-input @error('password') is-invalid @enderror"
                                   placeholder="La tua password"
                                   required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ricordami & Password dimenticata -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label auth-muted small" for="remember">Ricordami</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-accent text-decoration-none">
                                    Password dimenticata?
                                </a>
                            @endif
                        </div>

                        <!-- Bottone Invio Form -->
                        <button type="submit" class="btn auth-btn mb-3">
                            Accedi
                        </button>

                        <!-- Link Registrazione -->
                        <p class="text-center auth-muted small mb-0">
                            Non hai un account? <a href="{{ route('register') }}" class="text-accent text-decoration-none fw-semibold">Registrati</a>
                        </p>
                    </form>
                </div>

                <!-- Spazio per bilanciare la colonna in basso -->
                <div></div>
            </div>

        </div>
    </div>
</x-layout>