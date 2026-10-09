<x-layout>
    <div class="container-fluid px-0">
        <!-- ========================================================
            FILTRO CATEGORIE (Pills orizzontali)
            ======================================================== -->
        <section id="categorie" class="py-2">
            <div class="container-fluid px-0">
                <div class="d-flex gap-2 overflow-x-auto pb-2" style="scrollbar-width: none;">
                    <!-- Bottone "Tutti" attivo -->
                    <a href="#" class="btn-custom-accent">
                        Tutti
                    </a>
        
                    @if(isset($categories) && count($categories) > 0)
                        @foreach($categories as $category)
                            <a href="#" class="btn-custom-outline">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    @else
                        <!-- Placeholder nel caso il db sia momentaneamente vuoto -->
                        <a href="#" class="btn-custom-outline">[Categoria 1]</a>
                        <a href="#" class="btn-custom-outline">[Categoria 2]</a>
                        <a href="#" class="btn-custom-outline">[Categoria 3]</a>
                        <a href="#" class="btn-custom-outline">[Categoria 4]</a>
                    @endif
                </div>
            </div>
        </section>
        {{-- <div class="row"></div>
        <div class="col-12 col-lg-6">
            <h1 class="h2 mb-1">Benvenuto su Presto.it</h1>
            <p class="ann-muted mb-4">Il marketplace dove puoi vendere e comprare prodotti di seconda mano.</p>
        </div>
        </div> --}}
        <header class="py-5 my-2">
            <div class="container-fluid px-0">
                <div class="row align-items-center gy-4">
                    <!-- Testo a sinistra -->
                    <div class="col-lg-6 pe-lg-5">
                        <span class="badge-accent mb-3">
                            Nuova collezione
                        </span>
                        <h1 class="display-5 fw-bold text-primary lh-sm mb-3">
                            Scelti per durare,<br>pensati per te
                        </h1>
                        <p class="fs-6 footer-muted mb-4" style="max-width: 480px;">
                            Una frase che descrive il vostro catalogo e il vantaggio principale per chi compra.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#annunci" class="btn-custom-accent">
                                Acquista ora
                            </a>
                            <a href="#" class="btn-custom-outline">
                                Scopri le novità
                            </a>
                        </div>
                    </div>

                    <!-- Box con cerchio a destra (identico al wireframe) -->
                    <div class="col-lg-6">
                        <div class="hero-box">
                            <div class="hero-circle-placeholder">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <span class="position-absolute bottom-0 start-0 m-4 footer-muted small">
                                [Immagine hero]
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>




        <!-- ========================================================
            SEZIONE: IN EVIDENZA (GRIGLIA CARD)
            ======================================================== -->
        <section id="annunci" class="py-5">
            <div class="container-fluid px-0">
                <!-- Header Sezione -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 fw-bold text-primary mb-0">In evidenza</h2>
                    <a href="#" class="text-accent text-decoration-none small fw-semibold">
                        Vedi tutto
                    </a>
                </div>

                <!-- Griglia a 4 colonne che chiama il componente blade -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                    @if(isset($articles) && count($articles) > 0)
                        @foreach($articles as $article)
                            <div class="col">
                                <x-card :article="$article" />
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback 4 card d'anteprima -->
                        <div class="col"><x-card /></div>
                        <div class="col"><x-card /></div>
                        <div class="col"><x-card /></div>
                        <div class="col"><x-card /></div>
                    @endif
                </div>
            </div>
        </section>


        <!-- ========================================================
            BANNER PROMOZIONALE
            ======================================================== -->
        <section class="py-3 mb-5">
            <div class="container-fluid px-0">
                <div class="promo-banner-box">
                    <div class="row align-items-center gy-3">
                        <div class="col-md-8">
                            <span class="small text-accent fw-bold text-uppercase" style="font-size: 12px;">
                                Offerta in corso
                            </span>
                            <h3 class="fw-bold text-primary my-1" style="font-size: 24px;">
                                [Titolo della promozione]
                            </h3>
                            <p class="footer-muted mb-0 small">
                                [Condizioni o scadenza]
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="#" class="btn-custom-accent">
                                Scopri l'offerta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
