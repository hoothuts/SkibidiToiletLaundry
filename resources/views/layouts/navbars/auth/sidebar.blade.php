<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ url('/dashboard') }}">
            <img src="../assets/img/Oma Laundry_NoBG.png" class="navbar-brand-img w-75 h-75" alt="...">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('Cashier') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('Pesanan') ? 'active' : '' }}" href="{{ url('/Pesanan') }}">
                    <span class="nav-link-text ms-1">Tambah Pesanan</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('Pengeluaran') ? 'active' : '' }}" href="{{ url('/Pengeluaran') }}">
                    <span class="nav-link-text ms-1">Pengeluaran</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('Rekapitulasi') ? 'active' : '' }}" href="{{ url('/Rekap') }}">
                    <span class="nav-link-text ms-1">Keuangan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
