<x-layout>
    <div class="p-4 my-2 ">
        
        <!-- Breadcrumb identico al mockup (Home / Categoria / Titolo) -->
        <nav class="show-breadcrumb" aria-label="breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span class="separator">/</span>
            <a href="{{ route('tutti-gli-articoli') }}">
                {{ $article->category->name ?? 'Annunci' }}
            </a>
            <span class="separator">/</span>
            <span class="current">{{ $article->title }}</span>
        </nav>

        <div class="pt-3 pb-3 align-items-center d-inline-flex">
            <a href="{{ route('tutti-gli-articoli') }}" class="d-inline-flex align-items-center btn-ui-outline py-2 px-3 text-decoration-none fw-bold gap-2" style="font-size: 14px;">
                <div class="container-fluid px-0 gap-2 d-flex align-items-center">
                    <i class="bi bi-arrow-left" style="line-height: 1"></i>
                    <span>Torna agli annunci</span>
                </div>
            </a>
        </div>

        <div class="row g-5 align-items-start">

            <!-- ==========================================
                 COLONNA SINISTRA: GALLERIA + DESCRIZIONE
                 ========================================== -->
            <div class="col-12 col-lg-7">

                <!-- 1. Box Immagine Principale con Carosello -->
                <div id="article-carousel" class="carousel slide show-carousel-box mb-3" data-bs-ride="false">
                    
                    <div class="carousel-inner">
                        @for ($i = 0; $i < 4; $i++)
                        
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                @if ($i === 0 && !empty($article->image))
                                    {{-- La prima foto è quella reale caricata dall'utente --}}
                                    <img src="{{ asset('storage/' . $article->image) }}" 
                                        class="d-block w-100" 
                                        alt="{{ $article->title }}">
                                @else
                                <div class="col-12 col-md-6 mb-3">
                                    @if ($article->images->count() > 0)
                                        <div id="carouselExample" class="carousel slide">
                                            <div class="carousel-inner">
                                                @foreach ($article->images as $key => $image)
                                                    <div class="carousel-item @if ($loop->first) active @endif">
                                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow"
                                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if ($article->images->count() > 1)
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                                    data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            @endif
                                        </div>
                                    @else
                                        <img src="https://picsum.photos" alt="Nessuna foto inserita dall'utente">
                                    @endif
                                </div>
                                    {{-- Foto casuali diverse per testare lo scorrimento del carosello --}}
                                    <img src="https://picsum.photos/800/500?random={{ $i }}" 
                                        class="d-block w-100" 
                                        alt="Foto {{ $i + 1 }}">
                                @endif
                            </div>
                        @endfor
                    </div>

                    <!-- Frecce circolari scure sui lati -->
                    <button class="show-carousel-arrow prev" type="button" data-bs-target="#article-carousel" data-bs-slide="prev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="show-carousel-arrow next" type="button" data-bs-target="#article-carousel" data-bs-slide="next">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <!-- Indicatore di conteggio in basso a destra -->
                    <div class="show-carousel-counter" id="carousel-counter">
                        1/4
                    </div>
                </div>

                <!-- 2. Riga delle 4 Miniature (Thumbnails interattive) -->
                <div class="d-flex gap-2 mb-4">
                    @for ($i = 0; $i < 4; $i++)
                        <button type="button"
                                class="show-thumb-btn {{ $i === 0 ? 'active' : '' }}"
                                data-bs-target="#article-carousel"
                                data-bs-slide-to="{{ $i }}"
                                aria-label="Visualizza immagine {{ $i + 1 }}">
                            @if ($i === 0 && !empty($article->image))
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Miniatura {{ $i + 1 }}">
                            @else
                                <img src="https://picsum.photos/800/500?random={{ $i }}" alt="Miniatura {{ $i + 1 }}">
                            @endif
                        </button>
                    @endfor
                </div>
            </div>

            <!-- ==========================================
                 COLONNA DESTRA: CARD DETTAGLIO PRODOTTO
                 ========================================== -->
            <aside class="col-12 col-lg-5">
                <div class="show-product-card">
                    
                    <!-- Badge Categoria -->
                    <div class="mb-3">
                        <span class="badge-accent">
                            {{ $article->category->name ?? 'Senza categoria' }}
                        </span>
                    </div>

                    <!-- Titolo Prodotto -->
                    <h1 class="fw-bold text-primary mb-2 text-break" style="font-size: 26px;">
                        {{ $article->title }}
                    </h1>

                    <!-- Prezzo -->
                    <div class="fw-bold text-primary mb-4 text-break" style="font-size: 32px;">
                        € {{ number_format($article->price, 2, ',', '.') }}
                    </div>
                    
                    <!-- Descrizione Prodotto -->

                    <div class="mb-3 pt-2">
                        <h2 class="fw-bold text-primary mb-3" style="font-size: 20px;">Descrizione</h2>
                        <p class="text-secondary small lh-base mb-4 text-break" style="font-size: 14px;">
                            {{ $article->body }}
                        </p>
                    </div>

                    <!-- Linea divisoria sottile -->
                    <div class="my-4" style="border-top: 1px solid var(--border-color);"></div>

                    <!-- Informazioni Venditore -->
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <div class="text-secondary small" style="font-size: 12px;">
                                Pubblicato {{ $article->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-layout>