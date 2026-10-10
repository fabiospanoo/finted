<x-layout>
    <div class="container-fluid py-5 m-0">

        {{-- Intestazione --}}
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1">Tutti gli annunci</h1>
            </div>
        </div>

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

        <div class="col-12">
                <livewire:article-index-table />
        </div>
    </div>
</x-layout>