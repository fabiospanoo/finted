<x-layout>
    <div class="container-fluid px-0 py-4">

        @if (session('review_message'))
            <div class="promo-banner-box d-flex align-items-center gap-3 py-3 px-4 mb-4" role="status">
                <span class="nav-circle-btn btn-filled"><i class="bi bi-check-lg"></i></span>
                <span class="text-primary">{{ session('review_message') }}</span>
            </div>
        @endif

        @if ($article_to_check)
            {{-- Intestazione --}}
            <div class="mb-4 mt-4">
                <span class="badge-accent mb-4 area-revisore">{{ __('ui.area-revisore') }}</span>
                <h1 class="h2 fw-bold text-primary mb-2 revisiona-annunci">{{ __('ui.revisiona-annunci') }}</h1>
            </div>

            <div class="row g-4 align-items-start">
                <section class="col-12 col-lg-7" aria-label="Foto dell'annuncio">
                    @if ($article_to_check->images->isNotEmpty())
                        <div class="row row-cols-2 row-cols-md-3 g-3">
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="{{ $image->getUrl(400, 600) }}" class="img-fluid rounded shadow"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="revisor-no-images">
                            <i class="bi bi-image" aria-hidden="true"></i>
                            <span class="nessuna-immagine">{{ __('ui.nessuna-immagine') }}</span>
                        </div>
                    @endif
                </section>

                {{-- Dati dell'annuncio e azioni --}}
                <aside class="col-12 col-lg-5">
                    <div class="revisor-article-card position-sticky">

                        <span class="badge-accent mb-3">
                            {{ $article_to_check->category->name ?? __('ui.senza-categoria') }}
                        </span>

                        <h2 class="h3 fw-bold text-primary lh-sm mb-2">
                            {{ $article_to_check->title }}
                        </h2>

                        <div class="fs-2 fw-bold text-accent mb-3">
                            € {{ number_format($article_to_check->price, 2, ',', '.') }}
                        </div>

                        <p class="footer-muted mb-4">{{ $article_to_check->body }}</p>

                        <div class="create-preview-divider mb-4"></div>
                        <div class="small text-secondary mb-4 pubblicato">
                            <span class="pubblicato-testo">{{ __('ui.pubblicato') }}</span> {{ $article_to_check->created_at->diffForHumans() }}
                        </div>
                        {{-- Azioni --}}
                        <div class="row g-2">
                            <div class="col-6">
                                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-custom-outline w-100 rifiuta">
                                        <i class="bi bi-x-lg me-1"></i> {{ __('ui.rifiuta') }}
                                    </button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-custom-accent w-100 accetta">
                                        <i class="bi bi-check-lg me-1"></i> {{ __('ui.accetta') }}
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
                    <h2 class="h4 fw-bold text-primary mb-2 nessun-annuncio-da-revisionare">{{ __('ui.nessun-annuncio-da-revisionare') }}</h2>
                    <p class="footer-muted mb-4 tutti-annunci-controllati">{{ __('ui.tutti-annunci-controllati') }}</p>
                    <a href="{{ route('home') }}" class="btn-custom-accent torna-homepage">{{ __('ui.torna-homepage') }}</a>
                </div>
            </div>
        @endif
    </div>


    <br> 

    <livewire:revisor.rejected-articles />

</x-layout>