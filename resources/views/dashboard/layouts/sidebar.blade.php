    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        @can('isAdmin')
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/relawan*') ? 'active' : '' }}" href="/dashboard/relawan">
              <span data-feather="file" class="align-text-bottom"></span>
              Relawan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/donatur*') ? 'active' : '' }}" href="/dashboard/donatur">
              <span data-feather="file" class="align-text-bottom"></span>
              Donatur
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active' : '' }}" href="/dashboard/transaksi">
              <span data-feather="file" class="align-text-bottom"></span>
              Transaksi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/anak*') ? 'active' : '' }}" href="/dashboard/anak">
              <span data-feather="file" class="align-text-bottom"></span>
              Data Anak
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kegiatan*') ? 'active' : '' }}" href="/dashboard/kegiatan">
              <span data-feather="file" class="align-text-bottom"></span>
              Kegiatan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kebutuhan*') ? 'active' : '' }}" href="/dashboard/kebutuhan">
              <span data-feather="file" class="align-text-bottom"></span>
              Kebutuhan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
              <span data-feather="file" class="align-text-bottom"></span>
              Form Profile Panti
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pengurus*') ? 'active' : '' }}" href="/dashboard/pengurus">
              <span data-feather="file" class="align-text-bottom"></span>
              Pengurus
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/sosmed*') ? 'active' : '' }}" href="/dashboard/sosmed">
              <span data-feather="file" class="align-text-bottom"></span>
              Sosmed
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/ketua*') ? 'active' : '' }}" href="/dashboard/ketua">
              <span data-feather="file" class="align-text-bottom"></span>
              Data Ketua
            </a>
          </li>
        </ul>
        @endcan
        @can('isDonatur')
        <ul class = "nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/riwayat*') ? 'active' : '' }}" href="/dashboard/riwayat">
              <span data-feather="file" class="align-text-bottom"></span>
              Riwayat Donasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kontak*') ? 'active' : '' }}" href="/dashboard/kontak">
              <span data-feather="file" class="align-text-bottom"></span>
              Daftar Panti
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pemberitahuan*') ? 'active' : '' }}" href="/dashboard/pemberitahuan">
              <span data-feather="file" class="align-text-bottom"></span>
              Pemberitahuan
            </a>
          </li>
        </ul>
        @endcan
        @can('isRelawan')
        <ul class = "nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('relawan*') ? 'active' : '' }}" href="relawan ">
              <span data-feather="file" class="align-text-bottom"></span>
              Daftar Panti
            </a>
          </li>
        </ul>
        @endcan
        @can('isDeveloper')
        <ul class = "nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/developer*') ? 'active' : '' }}" href="/dashboard/developer">
              <span data-feather="file" class="align-text-bottom"></span>
              Data Panti
            </a>
          </li>
        </ul>
        @endcan
        
      </div>
    </nav>