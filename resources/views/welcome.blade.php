<x-layout>
    <div class="container-fluid px-0">
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
                            Scopri le novitÃ
                        </a>
                    </div>
                </div>

                <!-- Box con cerchio a destra (identico al wireframe) -->
                <div class="col-lg-6">
                    <div class="hero-box">
                        <img src="https://static.vinted.com/assets/seller-promotion/default/banner-wide-1ca50d3217a3d2402dda712a8e79af381c4bd7cd5cceb0a0b7be17ac2c7522d8.jpg" alt="Immagine hero">
                    </div>
                </div>
            </div>
        </div>
    </header>


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


    <!-- ========================================================
            SEZIONE: IN EVIDENZA (GRIGLIA CARD)
            ======================================================== -->
    <section id="annunci" class="py-5">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 fw-bold text-primary mb-0">In evidenza</h2>
                <a href="{{ route('tutti-gli-articoli') }}" class="text-accent text-decoration-none small fw-semibold">
                    Vedi tutto
                </a>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
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
  
</x-layout>