<div class="card-item w-100 h-100 d-flex flex-column justify-content-between p-3 rounded-4">
    <div>
        <!-- Contenitore Immagine + Badge -->
        <div class="card-media-box position-relative mb-3 overflow-hidden rounded-3">
            <!-- Badge categoria o tag -->
            <span class="badge-accent position-absolute top-0 start-0 m-2">
                {{ $article->category->name ?? 'Usato' }}
            </span>

            <!-- Immagine con aspect-ratio per evitare deformazioni -->
            @if(isset($article) && !empty($article->image))
                <img src="{{ asset('storage/' . $article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-100 h-100">
            @else
                <div class="card-placeholder w-100 h-100">
                    <img src="https://picsum.photos/400/300" 
                         alt="Immagine di esempio" 
                         class="w-100 h-100">
                </div>
            @endif
        </div>

        <!-- Titolo dell'annuncio -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h5 class="fw-bold mb-0 text-truncate text-primary" style="font-size: 16px; max-width: 100%;">
                {{ $article->title ?? 'Nome prodotto' }}
            </h5>
        </div>

        <!-- Breve descrizione -->
        <p class="small text-truncate mb-3 text-secondary" style="font-size: 13px;">
            {{ $article->body ?? '[Breve descrizione]' }}
        </p>
    </div>

    <!-- Prezzo e Bottone azione -->
    <div class="d-flex justify-content-between align-items-center pt-2"
        style="border-top: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));">
        <span class="fw-bold fs-6 text-primary">
            € {{ isset($article->price) ? number_format($article->price, 2, ',', '.') : '00,00' }}
        </span>

        @if(isset($article->id))
            <a href="{{ route('mostra-articolo', $article) }}" class="btn-custom-outline py-1 px-3"
                style="font-size: 12px !important;">
                Dettaglio
            </a>
        @else
            <a href="#" class="btn-custom-outline py-1 px-3" style="font-size: 12px !important;">
                Aggiungi
            </a>
        @endif
    </div>
</div>