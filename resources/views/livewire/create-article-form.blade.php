<div>
    {{-- Messaggio di conferma pubblicazione --}}
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center mb-4 rounded-4" role="alert">
            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <div class="row g-5 align-items-start">
        
        <!-- ==========================================
             COLONNA SINISTRA: FORM DI INSERIMENTO
             ========================================== -->
        <div class="col-12 col-lg-7">
            <!-- Intestazione -->
            <div class="mb-4">
                <h1 class="fw-bold text-primary mb-2" style="font-size: 38px;">
                    Cosa vuoi vendere?
                </h1>
                <p class="text-secondary small mb-0">
                    I campi contrassegnati con * sono obbligatori.
                </p>
            </div>

            <form wire:submit.prevent="store" novalidate>
               
            {{-- inserimento immagini --}}
            <div class="mb-3">
                <input type="file" wire:model.live="temporary_images" multiple
                    class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/"/>
                @error('temporary_images.*')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
                @error('temporary_images')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </div>
            @if (!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>Photo preview:</p>
                        <div class="row border border-4 border-success rounded shadow py-4">
                            @foreach ($images as $key => $image)
                                <div class="col d-flex flex-column align-items-center my-3">
                                    <div class="img-preview mx-auto shadow rounded"
                                        style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            
            <p>Photo preview:</p>
                <div class="row border border-4 border-success routned shadow py-4">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div
                                class="img-preview mx-auto shadow rounded"
                                style="background-image: url({{ $image->temporaryUrl() }});">
                            </div>
                            <button type="button" class="btn mt-1 btn-danger "
                                wire:click="removeImage({{ $key }})">X</button>
                        </div>
                    @endforeach
                </div>

                <!-- 1. Titolo -->
                <div class="mb-4">
                    <label for="title" class="form-label text-secondary small fw-semibold mb-1">
                        Titolo *
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        wire:model.live="title" 
                        class="form-control create-input-pill @error('title') is-invalid @enderror" 
                        placeholder="Nome dell'oggetto"
                    >
                    @error('title')
                        <div class="invalid-feedback ps-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 2. Categorie a Pillola -->
                <div class="mb-4">
                    <label class="form-label text-secondary small fw-semibold mb-2 d-block">
                        Categoria *
                    </label>
                    
                    <div class="d-flex flex-wrap gap-2">
                        @forelse ($categories as $category)
                            <button 
                                type="button" 
                                wire:click="selectCategory({{ $category->id }})" 
                                class="create-cat-pill {{ (string)$category_id === (string)$category->id ? 'active' : '' }}"
                            >
                                {{ $category->name }}
                            </button>
                        @empty
                            {{-- Fallback visivo se il database non è ancora popolato --}}
                            <button type="button" class="create-cat-pill active">Elettronica</button>
                            <button type="button" class="create-cat-pill">Auto e moto</button>
                            <button type="button" class="create-cat-pill">Casa e giardino</button>
                            <button type="button" class="create-cat-pill">Informatica</button>
                            <button type="button" class="create-cat-pill">Abbigliamento</button>
                            <button type="button" class="create-cat-pill">Sport</button>
                            <button type="button" class="create-cat-pill">Libri e musica</button>
                            <button type="button" class="create-cat-pill">Giochi e hobby</button>
                            <button type="button" class="create-cat-pill">Bambini</button>
                            <button type="button" class="create-cat-pill">Altro</button>
                        @endforelse
                    </div>
                    @error('category_id')
                        <div class="text-danger small mt-2 ps-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 3. Prezzo (€) -->
                <div class="mb-4">
                    <label for="price" class="form-label text-secondary small fw-semibold mb-1">
                        Prezzo (€) *
                    </label>
                    <input 
                        type="text" 
                        id="price" 
                        wire:model.live="price" 
                        class="form-control create-input-pill create-price-input @error('price') is-invalid @enderror" 
                        placeholder="0,00"
                    >
                    @error('price')
                        <div class="invalid-feedback ps-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 4. Descrizione -->
                <div class="mb-4">
                    <label for="body" class="form-label text-secondary small fw-semibold mb-1">
                        Descrizione *
                    </label>
                    <textarea 
                        id="body" 
                        wire:model.live="body" 
                        rows="6" 
                        class="form-control create-textarea @error('body') is-invalid @enderror" 
                        placeholder="Racconta lo stato dell'oggetto e perché lo vendi."
                    ></textarea>
                    @error('body')
                        <div class="invalid-feedback ps-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bottone di invio -->
                <div class="pt-2">
                    <button type="submit" class="btn btn-ui-accent py-2 px-4 fw-bold">
                        Pubblica annuncio
                    </button>
                </div>

            </form>
        </div>

        <!-- ==========================================
             COLONNA DESTRA: ANTEPRIMA REATTIVA LIVEWIRE
             ========================================== -->
        <div class="col-12 col-lg-5" style="padding-top: 6rem;">
            <div class="sticky-top" style="top: 30px;">
                <!-- Etichetta sopra la card -->
                <span class="text-secondary small fw-semibold d-block mb-1">
                    Anteprima annuncio
                </span>

                <!-- Card Anteprima (Mockup) -->
                <div class="create-preview-card">
                    
                    <!-- Badge Categoria -->
                    @if ($selectedCategoryName)
                        <div class="mb-3">
                            <span class="badge-accent">
                                {{ $selectedCategoryName }}
                            </span>
                        </div>
                    @endif

                    <!-- Titolo Reattivo -->
                    <h3 class="fw-bold text-primary mb-2 text-break" style="font-size: 24px;">
                        {{ !empty($title) ? $title : "[Titolo dell'annuncio]" }}
                    </h3>

                    <!-- Prezzo Reattivo -->
                    <div class="fw-bold fs-4 text-primary mb-3">
                        € {{ !empty($price) && is_numeric($price) ? number_format((float)$price, 2, ',', '.') : '0,00' }}
                    </div>

                    <!-- Divisore orizzontale della card -->
                    <div class="create-preview-divider mb-3"></div>

                    <!-- Descrizione Reattiva oppure linee segnaposto (mockup) -->
                    <div class="mb-4">
                        @if (!empty($body))
                            <p class="text-secondary small mb-0 text-break" style="line-height: 1.6;">
                                {{ Str::limit($body, 100) }}
                            </p>
                        @else
                            {{-- Linee placeholder tratteggiate come nella foto --}}
                            <div class="d-flex flex-column gap-2 py-1">
                                <div class="create-placeholder-line w-75"></div>
                                <div class="create-placeholder-line w-50"></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>