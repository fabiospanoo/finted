<nav class="navbar navbar-expand-lg custom-navbar py-3">
  <div class="container-fluid px-0">
      <div class="align-items-center">
          <a class="navbar-brand" href="{{ route('home') }}">
              <img src="{{ asset('images/logo.png') }}" 
                  alt="Logo" 
                  style="height: 35px; width: auto; object-fit: contain;">
          </a>
      </div>
    
    <button
      class="navbar-toggler custom-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarContent"
      aria-controls="navbarContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('tutti-gli-articoli') }}">Articoli</a>
        </li>
        @auth
          <li class="nav-item">
            <a class="nav-link custom-nav-link" href="{{ route('crea-articolo') }}">Inserisci annuncio</a>
          </li>
        @endauth
        <li class="nav-item dropdown">
          <!-- 1. Il link deve avere "dropdown-toggle" e "data-bs-toggle="dropdown"" -->
          <a class="nav-link custom-nav-link dropdown-toggle" 
            href="#" 
            id="categoriesDropdown" 
            role="button" 
            data-bs-toggle="dropdown" 
            aria-expanded="false">
              Categorie
          </a>

          <!-- 2. Il menu DEVE trovarsi dentro lo stesso <li> e NON deve avere "dropdown-menu-end" -->
          <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="categoriesDropdown">
              <li><a class="dropdown-item custom-dropdown-item" href="{{ route('tutti-gli-articoli') }}">Tutte le categorie</a></li>
              <li><hr class="dropdown-divider" style="border-color: var(--border-color);"></li>
              @foreach($categories as $category)
                  <li>
                      <a class="dropdown-item custom-dropdown-item" href="{{ route('categoria', ['category' => $category]) }}">
                          {{ $category->name }}
                      </a>
                  </li>
                  @if (!$loop->last)
                      <li><hr class="dropdown-divider" style="border-color: var(--border-color);"></li>
                  @endif
              @endforeach
          </ul>
      </li>
      </ul>

      <form class="d-flex flex-grow-1 my-2 mx-4 my-lg-0" role="search">
        <input
          class="form-control custom-search"
          type="search"
          placeholder="Cerca prodotti..."
          aria-label="Cerca"
          wire:model="search"
        />
      </form>

      <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
        @auth
          <div class="dropdown">
            <button
              class="btn btn-custom-outline dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
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
          <a href="{{ route('login') }}" class="btn btn-custom-outline">Log in</a>
          <a href="{{ route('register') }}" class="btn btn-custom-accent">Sign up</a>
        @endauth
      </div>
    </div>
  </div>
</nav>
