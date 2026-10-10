<x-layout>
    <div class="container-fluid pt-4 m-0 px-0">

        {{-- Intestazione --}}
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 pt-2">
            <div>
                <h2 class="mb-1">Tutti gli annunci</h2>
            </div>
        </div>

        <section id="categorie" class="pt-3 pb-4">
            <div class="container-fluid px-0">
                <div class="d-flex flex-wrap gap-2 pb-2">
                    <a href="#" class="btn-custom-accent text-nowrap">
                        Tutti
                    </a>
                    @if(isset($categories) && count($categories) > 0)
                        @foreach($categories as $category)
                            <a href="#" class="btn-custom-outline text-nowrap">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    @else
                        <a href="#" class="btn-custom-outline text-nowrap">[Categoria 1]</a>
                        <a href="#" class="btn-custom-outline text-nowrap">[Categoria 2]</a>
                        <a href="#" class="btn-custom-outline text-nowrap">[Categoria 3]</a>
                        <a href="#" class="btn-custom-outline text-nowrap">[Categoria 4]</a>
                    @endif
                </div>
            </div>
        </section>

        <div class="col-12 pt-3">
                <livewire:article-index-table />
        </div>
    </div>
</x-layout>