<x-layout>
    <div class="container-fluid pt-4 m-0 px-0">
        <section aria-labelledby="articles-index-title">
            <header class="pt-2 mb-4">
                <span class="badge-accent mb-3">Marketplace</span>
                <h1 id="articles-index-title" class="h2 fw-bold text-primary mb-2">
                    Tutti gli annunci
                </h1>
                <p class="text-secondary mb-0">
                    Esplora le proposte disponibili e trova qualcosa che fa per te.
                </p>
            </header>

            <div class="pt-2">
                <livewire:article-index-table />
            </div>
        </section>
    </div>
</x-layout>