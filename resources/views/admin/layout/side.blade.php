@if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LAUNDRY PINTAR</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="/admin/laporan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Pemesanan
    </div>

    <li class="nav-item">
        <a class="nav-link " href="/admin/pemesanan">
            <i class="fas fa-fw fa-cog"></i>
            <span> Daftar Paket </span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a class="nav-link " href="/admin/outlet">
            <i class="fas fa-fw fa-cog"></i>
            <span> Outlet </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link  " href="/admin/customer">
            <i class="fa fa-user-plus "></i>
            <span> Pelanggan </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="/admin/user">
            <i class="fa fa-user-plus "></i>
            <span>Manage User </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="/admin/paket">
            <i class="fa fa-box "></i>
            <span> Paket Laundry </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="/admin/transaksi">
            <i class="fa fa-money-bill "></i>
            <span>Transaksi</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
@elseif(\Illuminate\Support\Facades\Auth::user()->role == 'owner')

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LAUNDRY PINTAR</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="/owner/laporan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
</ul>
@elseif(\Illuminate\Support\Facades\Auth::user()->role == 'kasir')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LAUNDRY PINTAR</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="/kasir/laporan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Pemesanan
    </div>
    <li class="nav-item">
        <a class="nav-link " href="/kasir/pemesanan">
            <i class="fas fa-fw fa-cog"></i>
            <span> Daftar Paket </span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item">
        <a class="nav-link  " href="/kasir/customer">
            <i class="fa fa-user-plus "></i>
            <span> Pelanggan </span>
        </a>
    </li>
</ul>
@endif