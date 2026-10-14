<x-layout>
    @if (session('errorMessage'))
        <div class="row justify-content-center pt-5">
            <div class="col-5 alert alert-danger text-center">
                {{ session('errorMessage') }}
            </div>
        </div>
    @endif

    @if (session('message'))
        <div class="row justify-content-center pt-5">
            <div class="col-5 alert alert-success text-center">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <div class="container-fluid px-0">
        <header class="home-hero">
            <img class="home-hero__image"
                src="https://static.vinted.com/assets/seller-promotion/default/banner-wide-1ca50d3217a3d2402dda712a8e79af381c4bd7cd5cceb0a0b7be17ac2c7522d8.jpg"
                alt="Immagine hero">
            <div class="home-hero__inner">
                <div class="home-hero__card">
                    <span class="badge-accent mb-3">
                        Nuova collezione
                    </span>
                    <h1 class="display-5 fw-bold text-primary lh-sm mb-3" style="font-size: 50px;">
                        L'usato di qualità,<br>a portata di mano.
                    </h1>
                    <p class="fs-6 footer-muted mb-4" style="max-width: 480px;">
                        Dall'elettronica all'abbigliamento: trova affari sicuri ogni giorno.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('tutti-gli-articoli') }}" class="btn-custom-accent">
                            Esplora le occasioni
                        </a>
                        {{-- <a href="#" class="btn-custom-outline">
                            Scopri le novit&agrave;
                        </a> --}}
                    </div>
                </div>
            </div>
        </header>

        <section id="annunci" class="py-5">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 fw-bold text-primary mb-0">In evidenza</h2>
                    <a href="{{ route('tutti-gli-articoli') }}"
                        class="text-accent text-decoration-none small fw-semibold">
                        Vedi tutto
                    </a>
                </div>

                <div class="article-cards-row">
                    @forelse ($articles as $article)
                        <div class="article-card-column">
                            <x-card :article="$article" />
                        </div>
                    @empty
                        <div class="article-cards-empty">
                            <p class="footer-muted mb-0">Nessun annuncio per ora. Torna presto!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="py-3 mb-5">
            <div class="container-fluid px-0">
                <div class="promo-banner-box">
                    <div class="row align-items-center gy-3">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small text-accent fw-bold text-uppercase" style="font-size: 12px;">
                                    Offerta in corso
                                </span>
                                <span class="small footer-muted text-uppercase" style="font-size: 12px;">
                                    Scade tra: <span id="promo-countdown" class="fw-bold text-accent">59:59</span>
                                </span>
                            </div>

                            <h3 class="fw-bold text-primary my-1" style="font-size: 24px;">
                                Promo a tempo!
                            </h3>
                            <p class="footer-muted mb-0 small">
                                Ordina qualcosa entro il tempo stabilito e ottieni una spedizione gratuita su oltre
                                1000 annunci!
                            </p>
                        </div>

                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('tutti-gli-articoli') }}" class="btn-ui-outline">
                                Scopri l'offerta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>