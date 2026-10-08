@php
    $link = fn (string $name) => Route::has($name) ? route($name) : '#';

    // Contatti di esempio (dati finti, da sostituire)
    $team = [
        ['nome' => 'Ivan',    'email' => 'ivan@example.com',    'tel' => '+39 000 123 4561'],
        ['nome' => 'Mikele',  'email' => 'mikele@example.com',  'tel' => '+39 000 123 4562'],
        ['nome' => 'Fabio',   'email' => 'fabio@example.com',   'tel' => '+39 000 123 4563'],
        ['nome' => 'Nadeesh', 'email' => 'nadeesh@example.com', 'tel' => '+39 000 123 4564'],
    ];
@endphp

<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="row g-4">

            {{-- Brand --}}
            <section class="col-12 col-md-6 col-lg-3" aria-label="{{ config('app.name') }}">
                <a href="{{ url('/') }}" class="site-footer__logo d-inline-block mb-3">
                    {{ strtoupper(config('app.name', 'Logo')) }}
                </a>
                <p class="footer-muted mb-0">
                    Dai una seconda vita agli oggetti che non usi più. Pubblica un annuncio in pochi minuti.
                </p>
            </section>

            {{-- Navigazione --}}
            <nav class="col-6 col-md-3 col-lg-2" aria-label="Navigazione footer">
                <h2 class="h6 mb-3">Esplora</h2>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ $link('annunci.index') }}">Tutti gli annunci</a></li>
                    <li><a href="{{ $link('annunci.create') }}">Inserisci annuncio</a></li>
                    @guest
                        <li><a href="{{ $link('login') }}">Accedi</a></li>
                        <li><a href="{{ $link('register') }}">Registrati</a></li>
                    @endguest
                </ul>
            </nav>

            {{-- Contatti --}}
            <section class="col-12 col-md-6 col-lg-4" aria-label="Contatti">
                <h2 class="h6 mb-3">Contatti</h2>
                <ul class="list-unstyled row row-cols-1 row-cols-sm-2 g-3 mb-0">
                    @foreach ($team as $persona)
                        <li class="col d-flex flex-column">
                            <span class="site-footer__name">{{ $persona['nome'] }}</span>
                            <a href="mailto:{{ $persona['email'] }}">{{ $persona['email'] }}</a>
                            <a href="tel:{{ preg_replace('/\s+/', '', $persona['tel']) }}">{{ $persona['tel'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>

            {{-- Informazioni --}}
            <nav class="col-6 col-md-3 col-lg-3" aria-label="Informazioni legali">
                <h2 class="h6 mb-3">Informazioni</h2>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="#">Chi siamo</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Termini e condizioni</a></li>
                    <li><a href="#">Cookie</a></li>
                </ul>
            </nav>
        </div>
    </div>

    {{-- Barra finale --}}
    <div class="site-footer__bottom">
        <div class="container py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <small class="footer-muted">&copy; {{ date('Y') }} {{ config('app.name') }}. Tutti i diritti riservati.</small>
            <a href="#top" class="site-footer__top">Torna su &uarr;</a>
        </div>
    </div>
</footer>