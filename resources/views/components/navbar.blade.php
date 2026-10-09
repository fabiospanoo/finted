<nav class="navbar navbar-expand-lg custom-navbar py-3">
  <div class="container-fluid px-0">
    <!-- Logo -->
    <a class="navbar-brand brand-text me-4" href="#">Presto<span class="text-accent">.</span>it</a>

    <!-- Tasto Mobile Hamburger -->
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

    <!-- Contenuto della Navbar -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Voci richieste: Articoli, Inserisci articoli, Assistenza -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Articoli</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Inserisci articoli</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Assistenza</a>
        </li>
      </ul>

      <!-- Barra di ricerca a pillola (senza tasto cerca) -->
      <form class="d-flex my-2 my-lg-0 me-lg-3 flex-grow-1 flex-lg-grow-0" role="search">
        <input
          class="form-control custom-search"
          type="search"
          placeholder="Cerca prodotti..."
          aria-label="Cerca"
        />
      </form>

      <!-- Log in e Sign up a destra -->
      <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
        <a href="#" class="btn btn-custom-outline">Log in</a>
        <a href="#" class="btn btn-custom-accent">Sign up</a>
      </div>
    </div>
  </div>
</nav>