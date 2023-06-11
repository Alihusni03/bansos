<nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="img/icon.svg" alt="" width="30" class="me-3 d-inline-block align-text-top">
      BSP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
        <li class="nav-item mx-2">
          <a class="nav-link" href="#layanan">LAYANAN</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#fitur">PANTI ASUHAN</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#contact">KONTAK</a>
        </li>
        <li class="navbar-slide"></li>
      </ul>
      <ul class="navbar-nav">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>  My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post"> 
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i>  Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item mx-2">
            <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>