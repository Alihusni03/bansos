<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">BSP</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @can('isAdmin')
  <a href="/dashboard/pantiasuhan" class="nav-link px-3 bg-success border-0">Website</a>
  @endcan
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      @can('isAdmin')
      <form action="/logout" method="post"> 
        @csrf
        <button type="submit" class="nav-link px-3 bg-success border-0">Logout  <span data-feather="log-out"></span></button>
      </form>
      @endcan
      @can('isDonatur')
      <a href="/halamandonatur" class="nav-link px-3 bg-success border-0">Lihat Website <span data-feather="log-out"></span></a>
      @endcan
      @can('isRelawan')
        <form action="/logout" method="post"> 
          @csrf
          <button type="submit" class="nav-link px-3 bg-success border-0">Logout  <span data-feather="log-out"></button>
        </form>
      @endcan
      @can('isDeveloper')
        <form action="/logout" method="post"> 
          @csrf
          <button type="submit" class="nav-link px-3 bg-success border-0">Logout  <span data-feather="log-out"></button>
        </form>
      @endcan
    </div>
  </div>
</header>