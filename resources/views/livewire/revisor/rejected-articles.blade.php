<div>
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-end gap-3 flex-wrap">
            <div>
                <span class="badge-accent mb-3">
                    Gestione annunci
                </span>
                <h2 class="h3 fw-bold text-primary mb-0">
                    Annunci rifiutati
                </h2>
            </div>

            <div class="input-group rejected-articles-search">
                <input
                    type="text"
                    class="form-control rejected-search-field"
                    placeholder="Cerca un annuncio..."
                    aria-label="Cerca un annuncio"
                    wire:model.live="search"
                >

                <button
                    class="btn rejected-search-clear"
                    type="button"
                    aria-label="Cancella ricerca"
                    wire:click="$set('search', '')"
                >
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success" role="status">
            {{ session('message') }}
        </div>
    @endif

    @if ($rejected_articles->isNotEmpty())

        <div class="table-responsive rejected-articles-container">

            <table class="table table-hover rejected-articles-table align-middle mb-0">

                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th class="rejected-category-column">Categoria</th>
                        <th class="rejected-actions-column">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rejected_articles as $article)

                        <tr wire:key="rejected-article-{{ $article->id }}">

                            <td class="fw-semibold">
                                {{ $article->title }}
                            </td>

                            <td>
                                {{ Str::limit($article->body, 80) }}
                            </td>

                            <td>
                                <span class="badge rejected-category-badge">
                                    {{ $article->category->name ?? 'Senza categoria' }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    {{-- Ripristina --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm rejected-restore-btn text-nowrap"
                                        wire:click="restore({{ $article->id }})"
                                        wire:confirm="Vuoi ripristinare questo annuncio?"
                                        wire:loading.attr="disabled"
                                        wire:target="restore({{ $article->id }})">

                                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                                        Ripristina
                                    </button>

                                    {{-- Elimina definitivamente --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm rejected-delete-btn text-nowrap"
                                        wire:click="destroy({{ $article->id }})"
                                        wire:confirm="Sei sicuro di voler eliminare definitivamente questo annuncio?"
                                        wire:loading.attr="disabled"
                                        wire:target="destroy({{ $article->id }})">

                                        <i class="bi bi-trash me-1"></i>
                                        Elimina definitivamente
                                    </button>

                                </div>
                            </td>

                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    @else

        <div class="rejected-empty-state text-center py-4">
            <i class="bi bi-search fs-3 d-block mb-2"></i>

            @if (trim($search) !== '')
                <h3 class="h5">Nessun risultato trovato</h3>
                <p class="text-secondary mb-0">
                    Non ci sono annunci che corrispondono alla ricerca
                    "{{ $search }}".
                </p>
            @else
                <h3 class="h5">Nessun annuncio rifiutato</h3>
                <p class="text-secondary mb-0">
                    Non ci sono annunci da ripristinare.
                </p>
            @endif
        </div>
    @endif
</div>