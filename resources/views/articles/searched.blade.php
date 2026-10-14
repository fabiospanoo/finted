<x-layout>
    <div class="container-fluid pt-4 m-0 px-0">
        <section aria-labelledby="search-results-title">
            <header class="mb-4">
                <span class="badge-accent mb-3">Ricerca</span>
                <h1 id="search-results-title" class="h2 fw-bold text-primary mb-2">
                    Risultati per <span class="text-accent">“{{ $query }}”</span>
                </h1>
                <p class="text-secondary small mb-0">
                    {{ $articles->total() }} risultati trovati
                </p>
            </header>

            <div class="article-cards-row">
                @forelse ($articles as $article)
                    <div class="article-card-column">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="article-cards-empty text-center py-5">
                        <i class="bi bi-search fs-3 d-block mb-3 text-accent" aria-hidden="true"></i>
                        <h2 class="h5 fw-bold text-primary mb-2">Nessun risultato trovato</h2>
                        <p class="text-secondary mb-4">
                            Non ci sono annunci che corrispondono alla tua ricerca.
                        </p>
                        <a href="{{ route('tutti-gli-articoli') }}" class="btn-custom-accent">
                            Sfoglia tutti gli annunci
                        </a>
                    </div>
                @endforelse
            </div>

            @if ($articles->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links() }}
                </div>
            @endif
        </section>
    </div>
</x-layout>