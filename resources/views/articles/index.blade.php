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
                    
                    {{-- "Tutti" si colora SOLO se siamo sulla rotta "tutti-gli-articoli" --}}
                    <a href="{{ route('tutti-gli-articoli') }}" 
                    class="{{ request()->routeIs('tutti-gli-articoli') ? 'btn-custom-accent' : 'btn-custom-outline' }} text-nowrap">
                        Tutti
                    </a>

                    @if(isset($categories) && count($categories) > 0)
                        @foreach($categories as $category)
                            @php
                                // Recupera il parametro 'category' dalla rotta corrente
                                $currentRouteCategory = request()->route('category');
                                
                                // Gestisce sia il caso in cui la rotta passi un ID numerico, sia l'oggetto Model
                                $currentCategoryId = is_object($currentRouteCategory) 
                                    ? $currentRouteCategory->id 
                                    : $currentRouteCategory;

                                $isActive = request()->routeIs('categoria') && (int)$currentCategoryId === (int)$category->id;
                            @endphp

                            <a href="{{ route('categoria', ['category' => $category]) }}" 
                            class="{{ $isActive ? 'btn-custom-accent' : 'btn-custom-outline' }} text-nowrap">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

        <div class="col-12 pt-3">
                <livewire:article-index-table />
        </div>
    </div>
</x-layout>