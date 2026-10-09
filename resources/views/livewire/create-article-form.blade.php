<div>
    <div class="container py-5">

        @if (session('success'))
            <div class="ann-alert mb-4" role="status">
                <span class="ann-alert__icon" aria-hidden="true">✓</span>
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-5 align-items-start">

            {{-- Modulo --}}
            <section class="col-12 col-lg-7">
                <h1 class="h2 mb-1">Cosa vuoi vendere?</h1>
                <p class="ann-muted mb-4">I campi contrassegnati con * sono obbligatori.</p>

                <form wire:submit="store">

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Titolo
                        </label>

                        <input type="text" id="title" class="form-control" wire:model.live="title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">
                            Prezzo
                        </label>

                        <input id="price" class="form-control" rows="1" type="number" wire:model.live="price"></input>
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Categoria --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">
                            Categoria
                        </label>

                        <select id="category" class="form-select" wire:model.live="category_id">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">
                            Contenuto
                        </label>

                        <textarea id="body" class="form-control" rows="6" wire:model.live="body"></textarea>
                        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Crea articolo
                    </button>

                </form>
            </section>
        </div>
    </div>
</div>