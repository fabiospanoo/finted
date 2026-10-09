<div class="card-item">
    <div>
        <!-- Contenitore Immagine + Badge -->
        <div class="card-media-box mb-3">
            <!-- Badge categoria o tag -->
            <span class="badge-accent position-absolute top-0 start-0 m-2">
                {{ $article->category->name ?? 'Usato' }}
            </span>

            <!-- Se c'è un'immagine la mostra, altrimenti mostra il cerchio del mockup -->
            @if(isset($article) && !empty($article->image))
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
            @else
                <div class="card-circle-placeholder">
                    <i class="bi bi-box-seam"></i>
                </div>
            @endif
        </div>

        <!-- Titolo dell'annuncio e icona preferiti -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h5 class="fw-bold mb-0 text-truncate text-primary" style="font-size: 16px; max-width: 80%;">
                {{ $article->title ?? 'Nome prodotto' }}
            </h5>
            
            <button type="button" class="btn p-0 border-0" title="Salva tra i preferiti">
                <i class="bi bi-heart fs-6 text-secondary"></i>
            </button>
        </div>

        <!-- Breve descrizione -->
        <p class="small text-truncate mb-3 text-secondary" style="font-size: 13px;">
            {{ $article->category_id ?? '[Categoria]' }}
        </p>
    </div>

    <!-- Prezzo e Bottone azione -->
    <div class="d-flex justify-content-between align-items-center pt-2" style="border-top: 1px solid var(--border-color);">
        <span class="fw-bold fs-6 text-primary">
            € {{ isset($article->price) ? number_format($article->price, 2, ',', '.') : '00,00' }}
        </span>

        <!-- @if(isset($article->id)) -->
            <a href="{{ route('articles.show', $article) }}" class="btn-custom-outline py-1 px-3" style="font-size: 12px !important;">
                Dettaglio
            </a>
        <!-- @else
            <a href="#" class="btn-custom-outline py-1 px-3" style="font-size: 12px !important;">
                Aggiungi
            </a>
        @endif -->
    </div>
</div>