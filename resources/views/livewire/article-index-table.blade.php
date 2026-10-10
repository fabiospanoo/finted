<div>
    {{-- Messaggio di conferma --}}
    @if (session('success'))
        <div class="ann-alert mb-4" role="status">
            <span class="ann-alert__icon" aria-hidden="true">✓</span>
            {{ session('success') }}
        </div>
    @endif
    <div class="row">

    </div>
    {{-- Griglia di card --}}
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 g-3">
        @forelse ($articles as $article)
            <div class="col">
                <x-card :article="$article" />
            </div>
        @empty
            <div class="col-12">
                <p class="footer-muted mb-0">Nessun annuncio per ora. Torna presto!</p>
            </div>
        @endforelse
    </div>
</div>