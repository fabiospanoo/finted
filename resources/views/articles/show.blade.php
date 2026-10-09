<x-layout>
    <div class="container py-5">

        {{-- Percorso di navigazione --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tutti-gli-articoli') }}">Annunci</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>

        <div class="row g-5 align-items-start">

            {{-- Colonna sinistra: foto e descrizione --}}
            <div class="col-12 col-lg-7">

                {{-- Carosello (le foto per ora sono segnaposto) --}}
                <div id="article-carousel" class="carousel slide mb-4" data-bs-ride="false">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < 3; $i++)
                            <button type="button" data-bs-target="#article-carousel"
                                    data-bs-slide-to="{{ $i }}"
                                    class="{{ $i === 0 ? 'active' : '' }}"
                                    @if ($i === 0) aria-current="true" @endif
                                    aria-label="Foto {{ $i + 1 }}"></button>
                        @endfor
                    </div>

                    <div class="carousel-inner rounded">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                @if ($i === 0 && !empty($article->image))
                                    <img src="{{ asset('storage/' . $article->image) }}"
                                         class="d-block w-100" alt="{{ $article->title }}">
                                @else
                                    <div class="ratio ratio-4x3 bg-secondary-subtle">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box-seam display-1 text-secondary"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>

                    <button class="carousel-control-prev" type="button"
                            data-bs-target="#article-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Foto precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                            data-bs-target="#article-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Foto successiva</span>
                    </button>
                </div>

                <h2 class="h5 mb-3">Descrizione</h2>
                <p class="mb-0">{!! nl2br(e($article->body)) !!}</p>
            </div>

            {{-- Colonna destra: pannello acquisto --}}
            <aside class="col-12 col-lg-5">
                <div class="card">
                    <div class="card-body p-4">
                        <span class="badge text-bg-primary mb-3">
                            {{ $article->category->name ?? 'Senza categoria' }}
                        </span>

                        <h1 class="h3 mb-2">{{ $article->title }}</h1>

                        <p class="display-6 fw-bold mb-4">
                            € {{ number_format($article->price, 2, ',', '.') }}
                        </p>

                        <div class="d-grid gap-2 mb-4">
                            <a href="#" class="btn btn-primary btn-lg">
                                <i class="bi bi-envelope me-1"></i> Contatta il venditore
                            </a>
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="bi bi-heart me-1"></i> Salva tra i preferiti
                            </button>
                        </div>

                        <hr>

                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-person-circle fs-2"></i>
                            <div>
                                <div class="small text-secondary">
                                    Pubblicato {{ $article->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <div class="mt-5">
            <a href="{{ route('tutti-gli-articoli') }}" class="link-secondary text-decoration-none">
                <i class="bi bi-arrow-left"></i> Torna agli annunci
            </a>
        </div>
    </div>
</x-layout>
