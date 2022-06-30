<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{asset('public/image/carwash.png')}}" style="width:40px;height:40px;">
        </div>
        <div class="sidebar-brand-text mx-3">Car Wash</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="false" aria-controls="collapseUtilities">
            <i class="fas fa-car fa-car-alt"></i>
            <span>Produk</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar"
            style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('paket')}}">Paket</a>
                <a class="collapse-item" href="{{url('layanan')}}">Layanan</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-bell fa-bell-alt"></i>
            <span>Notifikasi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-file fa-file-alt"></i>
            <span>Laporan</span></a>
    </li>



</ul>
<!-- End of Sidebar -->