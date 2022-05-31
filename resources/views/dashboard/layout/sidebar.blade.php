<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('dashboard') ? 'active' : '' }} aria-current="page"
                    href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('trsbeli') ? 'active' : '' }} href="/trsbeli">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Transaksi Pembelian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('trsjual') ? 'active' : '' }} href="/trsjual">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Transaksi Penjualan
                </a>
            </li>
        </ul>
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Laporan</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('report/beli') ? 'active' : '' }} href="/report/beli">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Pembelian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('report/belidetail') ? 'active' : '' }}
                    href="/report/belidetail">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Pembelian Per Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('report/jual') ? 'active' : '' }} href="/report/jual">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Penjualan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('report/jualdetail') ? 'active' : '' }}
                    href="/report/jualdetail">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Penjualan Per Produk
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Master</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('master/supplier') ? 'active' : '' }}
                    href="/master/supplier">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Supplier
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('master/product') ? 'active' : '' }} href="/master/product">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('master/productcategories') ? 'active' : '' }}
                    href="/master/productcategories">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Kategori Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('master/pelanggan') ? 'active' : '' }}
                    href="/master/pelanggan">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" {{ Request::is('master/user') ? 'active' : '' }} href="/master/user">
                    <span data-feather="users" class="align-text-bottom"></span>
                    User
                </a>
            </li>
        </ul>
    </div>
</nav>
