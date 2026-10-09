<nav class="navbar navbar-expand-lg custom-navbar py-3">
  <div class="container-fluid px-0">
    <a class="navbar-brand brand-text me-4" href="{{ route('home') }}">Presto<span class="text-accent">.</span>it</a>

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
          <a class="nav-link custom-nav-link" href="#">Articoli</a>
        </li>
        @auth
          <li class="nav-item">
            <a class="nav-link custom-nav-link" href="#">Inserisci annuncio</a>
          </li>
        @endauth
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Assistenza</a>
        </li>
      </ul>

      <form class="d-flex my-2 my-lg-0 me-lg-3 flex-grow-1 flex-lg-grow-0" role="search">
        <input
          class="form-control custom-search"
          type="search"
          placeholder="Cerca prodotti..."
          aria-label="Cerca"
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
