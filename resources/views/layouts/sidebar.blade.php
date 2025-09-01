<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ ($active === "dashboard") ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->level == 1)
            <li class="header">MASTER</li>
            <li class="{{ ($active === "kategori") ? 'active' : '' }}">
                <a href="{{ route('kategori.index') }}">
                    <i class="fa fa-tags"></i> <span>Kategori</span>
                </a>
            </li>
            <li class="{{ ($active === "satuan") ? 'active' : '' }}">
                <a href="{{ route('satuan.index') }}">
                    <i class="fa fa-cube"></i> <span>Satuan</span>
                </a>
            </li>
            <li class="{{ ($active === "produk") ? 'active' : '' }}">
                <a href="{{ route('produk.index') }}">
                    <i class="fa fa-cubes"></i> <span>Produk</span>
                </a>
            </li>
            <li class="{{ ($active === "supplier") ? 'active' : '' }}">
                <a href="{{ route('supplier.index') }}">
                    <i class="fa fa-truck"></i> <span>Supplier</span>
                </a>
            </li>
            <li class="{{ ($active === "toko") ? 'active' : '' }}">
                <a href="{{ route('toko.index') }}">
                    <i class="fa fa-home"></i> <span>Toko</span>
                </a>
            </li>
            <li class="header">TRANSAKSI</li>
            
            <li class="{{ ($active === "pembelian") ? 'active' : '' }}">
                <a href="{{ route('pembelian.index') }}">
                    <i class="fa fa-download"></i> <span>Pembelian</span>
                </a>
            </li>
            <li class="{{ ($active === "penjualan") ? 'active' : '' }}">
                <a href="{{ route('penjualan.index') }}">
                    <i class="fa fa-upload"></i> <span>Penjualan</span>
                </a>
            </li>
            <li class="{{ ($active === "pengeluaran") ? 'active' : '' }}">
                <a href="{{ route('pengeluaran.index') }}">
                    <i class="fa fa-money"></i> <span>Refund Produk</span>
                </a>
            </li>
            <li class="{{ ($active === "piutang") ? 'active' : '' }}">
                <a href="{{ route('piutang.index') }}">
                    <i class="fa fa-address-book-o"></i> <span>Daftar Piutang</span>

                    @if ( $notif1 > 0)
                        <span class="pull-right-container">
                            <small class="label pull-right bg-red">{{ $notif1 }}</small>
                        </span>
                    @endif
                </a>
            </li>
            <li class="{{ ($active === "penjualan_detail") ? 'active' : '' }}">
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Aktif</span>
                </a>
            </li>
            <li class="{{ ($active === "penjualans") ? 'active' : '' }}">
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li>
            <li class="header">REPORT</li>
            <li class="{{ ($active === "laporan") ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}">
                    <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                </a>
            </li>
            <li class="header">SYSTEM</li>
            <li class="{{ ($active === "user") ? 'active' : '' }}">
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-users"></i> <span>User</span>
                </a>
            </li>
            <li class="{{ ($active === "setting") ? 'active' : '' }}">
                <a href="{{ route("setting.index") }}">
                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                </a>
            </li>
            
            
            @else


            <li class="header">Data</li>
            <li class="{{ ($active === "stock_toko") ? 'active' : '' }}">
                <a href="{{ route('stocktoko.index') }}">
                    <i class="fa fa-home"></i> <span>Stock Toko</span>
                </a>
            </li>
            <li class="{{ ($active === "piutang") ? 'active' : '' }}">
                <a href="{{ route('piutang.index') }}">
                    <i class="fa fa-address-book-o"></i> <span>Daftar Piutang</span>
                    @if ( $notif1 > 0)
                        <span class="pull-right-container">
                            <small class="label pull-right bg-red">{{ $notif1 }}</small>
                        </span>
                    @endif
                </a>
            </li>
            <li class="header">Transaksi</li>
            <li class="{{ ($active === "penjualan_detail") ? 'active' : '' }}">
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Aktif</span>
                </a>
            </li>
            <li class="{{ ($active === "penjualans") ? 'active' : '' }}">
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li>
            <li class="{{ ($active === "pengeluaran") ? 'active' : '' }}">
                <a href="{{ route('pengeluaran.index') }}">
                    <i class="fa fa-money"></i> <span>Refund Produk</span>
                </a>
            </li>
            
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>