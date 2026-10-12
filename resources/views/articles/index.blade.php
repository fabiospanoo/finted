<x-layout>
    <div class="container-fluid pt-4 m-0 px-0">

        {{-- Intestazione --}}
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 pt-2">
            <div>
                <h2 class="mb-1">Tutti gli annunci</h2>
            </div>
        </div>
        <div class="col-12 pt-3">
                <livewire:article-index-table />
        </div>
    </div>
</x-layout>