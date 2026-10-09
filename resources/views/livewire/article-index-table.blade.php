<div>
    {{-- Messaggio di conferma --}}
        @if (session('success'))
            <div class="ann-alert mb-4" role="status">
                <span class="ann-alert__icon" aria-hidden="true">✓</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Griglia di card --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($articles as $article)
                <div class="col">
                    <article class="ann-card h-100 d-flex flex-column">
                        {{-- <span class="ann-badge align-self-start">
                            {{ $article->category->name ?? 'Senza categoria' }}
                        </span> --}}

                        <h2 class="h5 mt-3 mb-1">{{ $article->title }}</h2>

                        <div class="ann-price mb-2">
                            € {{ number_format($article->price, 2, ',', '.') }}
                        </div>

                        <p class="ann-muted mb-4">{{ Str::limit($article->body, 110) }}</p>

                        {{-- <div class="ann-card__footer mt-auto">
                            <div class="small ann-muted mb-3">
                                {{ $article->user->name ?? 'Utente' }}
                                · {{ $article->created_at->diffForHumans() }}
                            </div>
                            <a href="{{ route('article.show', $article) }}" class="btn ann-btn-outline w-100">
                                Vedi annuncio
                            </a>
                        </div> --}}
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="ann-empty">
                        <p class="h5 mb-2">Nessun annuncio per ora</p>
                        <p class="ann-muted mb-4">Sii il primo a pubblicarne uno.</p>
                        {{-- <a href="{{ auth()->check() ? route('article.create') : route('login') }}"
                           class="btn ann-btn d-inline-flex align-items-center">
                            Inserisci annuncio
                        </a> --}}
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Paginazione --}}
        {{-- @if ($articles->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $articles->links() }}
            </div>
        @endif --}}
</div>
