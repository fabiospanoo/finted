<x-layout>
    <div class="auth-page-container">
        <div class="auth-grid">

            <!-- ================= COLONNA SINISTRA ================= -->
            <div class="auth-col-left">
                <!-- Testo centrale -->
                <div class="my-auto py-3">
                    <h1 class="fw-bold text-primary mb-3" style="font-size: 42px; line-height: 1.2;">
                        Dai una seconda vita<br>alle cose che non usi più
                    </h1>
                    <p class="auth-muted fs-6 mb-4">
                        Registrati e pubblica il tuo primo annuncio in pochi minuti.
                    </p>

                    <!-- Le 3 pillole -->
                    <div class="d-flex flex-wrap gap-2">
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
                    <a href="{{ route('login') }}">Accedi</a>
                    <a href="{{ route('register') }}" class="active">Registrati</a>
                </div>

                <!-- Form Registrazione -->
                <div class="auth-form-content">
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="name" class="form-label auth-muted small mb-1">Nome</label>
                            <input id="name" type="text" name="name"
                                   class="form-control auth-input @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="Il tuo nome"
                                   required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label auth-muted small mb-1">Email</label>
                            <input id="email" type="email" name="email"
                                   class="form-control auth-input @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="nome@email.it"
                                   required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label auth-muted small mb-1">Password</label>
                            <input id="password" type="password" name="password"
                                   class="form-control auth-input @error('password') is-invalid @enderror"
                                   placeholder="Almeno 8 caratteri"
                                   required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Conferma Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label auth-muted small mb-1">Conferma password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   class="form-control auth-input"
                                   placeholder="Ripeti la password"
                                   required autocomplete="new-password">
                        </div>

                        <!-- Bottone Invio Form -->
                        <button type="submit" class="btn auth-btn mb-3">
                            Registrati e inserisci annuncio
                        </button>

                        <!-- Link Login -->
                        <p class="text-center auth-muted small mb-0">
                            Hai già un account? <a href="{{ route('login') }}" class="text-accent text-decoration-none fw-semibold">Accedi</a>
                        </p>
                    </form>
                </div>

                <!-- Spazio per bilanciare la colonna in basso -->
                <div></div>
            </div>

        </div>
    </div>
</x-layout>