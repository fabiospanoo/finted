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

                <!-- 3. Descrizione -->
                <div class="mb-4">
                    <h2 class="fw-bold text-primary mb-3" style="font-size: 20px;">Descrizione</h2>
                    <p class="text-secondary small lh-base mb-4 text-break" style="font-size: 14px;">
                        {{ $article->body }}
                    </p>

                    <!-- Link Torna agli annunci posizionato sotto la descrizione -->
                    <a href="{{ route('tutti-gli-articoli') }}" class="show-back-link">
                        Torna agli annunci
                    </a>
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

                    <!-- Bottoni di Azione a Pillola -->
                    {{-- <div class="d-flex flex-column gap-2 mb-4">
                        <!-- Bottone pieno Lilla -->
                        <a href="#" class="btn-ui-accent w-100 py-2 text-center text-decoration-none fw-bold" style="font-size: 15px;">
                            Modifica annuncio
                        </a>

                        <!-- Bottone trasparente con bordo -->
                        <button type="button" class="btn-ui-outline w-100 py-2" style="font-size: 14px;">
                            Elimina annuncio
                        </button>
                    </div> --}}

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