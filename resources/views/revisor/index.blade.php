<x-layout>
    <div class="container-fluid px-0 py-4">

        @if ($article_to_check)
            {{-- Intestazione --}}
            <div class="mb-4 mt-4">
                <span class="badge-accent mb-4">Area revisore</span>
                <h1 class="h2 fw-bold text-primary mb-2">Revisiona annunci</h1>
            </div>

            {{-- Messaggio di conferma --}}
            @if (session('success'))
                <div class="promo-banner-box d-flex align-items-center gap-3 py-3 px-4 mb-4" role="status">
                    <span class="nav-circle-btn btn-filled"><i class="bi bi-check-lg"></i></span>
                    <span class="text-primary">{{ session('success') }}</span>
                </div>
            @endif
            <div class="row g-5 align-items-start">

                {{-- Foto dell'annuncio --}}
                <div class="col-12 col-lg-7">
                    <div class="row row-cols-2 row-cols-md-3 g-3">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col">
                                <div class="card-media-box" style="height: 200px;">
                                    <img src="https://picsum.photos/300" alt="Foto {{ $i + 1 }} dell'annuncio">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Dati dell'annuncio e azioni --}}
                <aside class="col-12 col-lg-5">
                    <div class="create-preview-card position-sticky" style="top: 24px;">

                        <span class="badge-accent mb-3">
                            {{ $article_to_check->category->name ?? 'Senza categoria' }}
                        </span>

                        <h2 class="h3 fw-bold text-primary lh-sm mb-2">
                            {{ $article_to_check->title }}
                        </h2>

                        <div class="fs-2 fw-bold text-accent mb-3">
                            € {{ number_format($article_to_check->price, 2, ',', '.') }}
                        </div>

                        <p class="footer-muted mb-4">{{ $article_to_check->body }}</p>

                        <div class="create-preview-divider mb-4"></div>
                        <div class="small text-secondary mb-4">
                            Pubblicato {{ $article_to_check->created_at->diffForHumans() }}
                        </div>
                        {{-- Azioni --}}
                        <div class="row g-2">
                            <div class="col-6">
                                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-custom-outline w-100">
                                        <i class="bi bi-x-lg me-1"></i> Rifiuta
                                    </button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-custom-accent w-100">
                                        <i class="bi bi-check-lg me-1"></i> Accetta
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        @else
            {{-- Nessun annuncio da revisionare --}}
            <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                <div class="promo-banner-box text-center" style="max-width: 520px;">
                    <span class="nav-circle-btn btn-filled reviewer-empty-state-icon mx-auto mb-3" style="width: 56px; height: 56px;">
                        <i class="bi bi-check2-all fs-4"></i>
                    </span>
                    <h2 class="h4 fw-bold text-primary mb-2">Nessun annuncio da revisionare</h2>
                    <p class="footer-muted mb-4">Hai finito: tutti gli annunci sono stati controllati.</p>
                    <a href="{{ route('home') }}" class="btn-custom-accent">Torna all'homepage</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>