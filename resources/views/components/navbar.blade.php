<nav class="navbar navbar-expand-lg custom-navbar py-3 sticky-top">
  <div class="container-fluid px-0 navbar-layout">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img class="navbar-logo" src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>

    <div class="navbar-content">
      <div class="navbar-navigation align-items-center gap-2">
        <ul class="navbar-nav navbar-links mb-2 mb-lg-0 gap-lg-2 justify-content-end">
          <li class="nav-item">
            <a class="nav-link custom-nav-link" href="{{ route('tutti-gli-articoli') }}">Articoli</a>
          </li>
          @auth
            @if (Auth::user()->is_revisor)
              <li class="nav-item">
                <a class="nav-link custom-nav-link nav-link-with-badge" href="{{ route('revisor.index') }}">
                  Revisiona Articoli
                  @if (\App\Models\Article::toBeRevisionedCount() > 0)
                    <span class="badge-notification">
                      {{ \App\Models\Article::toBeRevisionedCount() }}
                      <span class="visually-hidden">articoli da revisionare</span>
                    </span>
                  @endif
                </a>
              </li>
            @endif
            <li class="nav-item">
              <a class="nav-link custom-nav-link" href="{{ route('crea-articolo') }}">Inserisci annuncio</a>
            </li>
          @endauth
          <li class="nav-item">
            <button class="nav-link custom-nav-link dropdown-toggle categories-toggle" type="button"
              id="categoriesDropdown" data-bs-toggle="collapse" data-bs-target="#navbarCategoryPanel"
              aria-expanded="{{ request()->query('categories') === 'open' ? 'true' : 'false' }}"
              aria-controls="navbarCategoryPanel">
              Categorie
            </button>
          </li>
        </ul>

      </div>

      <div class="navbar-search-group">
        <form class="navbar-search d-flex flex-grow-1" role="search">
          <input class="form-control custom-search" type="search" placeholder="Cerca prodotti..." aria-label="Cerca"
            wire:model="search" />
        </form>

        <div class="navbar-actions d-flex align-items-center gap-2">
          @auth
            <div class="dropdown">
              <button class="btn btn-custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Ciao, {{ Auth::user()->name }}
              </button>
              <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu">
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item custom-dropdown-item" type="submit">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            @unless (request()->routeIs('login', 'register'))
              <a href="{{ route('login') }}" class="btn btn-custom-outline align-items-center">Accedi</a>
              <a href="{{ route('register') }}" class="btn btn-custom-accent align-items-center">Registrati</a>
            @endunless
          @endauth
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0 pb-3">
    <div class="collapse navbar-category-panel {{ request()->query('categories') === 'open' ? 'show' : '' }}"
      id="navbarCategoryPanel">
      <div class="navbar-category-pills">
        <a href="{{ route('tutti-gli-articoli', ['categories' => 'open']) }}" wire:navigate
          class="category-pill {{ request()->routeIs('tutti-gli-articoli') ? 'btn-custom-accent' : 'btn-custom-outline' }} text-nowrap">
          Tutti
        </a>
        @php
          $currentRouteCategory = request()->route('category');
          $currentCategoryId = is_object($currentRouteCategory)
            ? $currentRouteCategory->id
            : $currentRouteCategory;
        @endphp
        @foreach($categories as $category)
          <a href="{{ route('categoria', ['category' => $category, 'categories' => 'open']) }}" wire:navigate
            class="category-pill {{ request()->routeIs('categoria') && (int) $currentCategoryId === (int) $category->id ? 'btn-custom-accent' : 'btn-custom-outline' }} text-nowrap">
            {{ $category->name }}
          </a>
        @endforeach
      </div>
    </div>
  </div>
</nav>