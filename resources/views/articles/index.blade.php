<x-layout>
    <div class="container py-5">

        {{-- Intestazione --}}
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1">Tutti gli annunci</h1>
                {{-- <p class="ann-muted mb-0">
                    {{ $articles->total() }} {{ $articles->total() === 1 ? 'annuncio' : 'annunci' }}
                </p> --}}
            </div>
            {{-- @auth
                <a href="{{ route('article.create') }}" class="btn ann-btn d-inline-flex align-items-center">
                    Inserisci annuncio
                </a>
            @endauth --}}
        </div>

        <div class="col-12">
                <livewire:article-index-table />
        </div>
    </div>
</x-layout>