<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-10">
            <img src="{{asset('public/image/m2new.png')}}" style="width:70px;height:60px;">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Car Wash</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('dashboard') ? 'active':''}}">
        <a class="nav-link" href="{{url('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{request()->is('kendaraan') ? 'active':''}}">
        <a class="nav-link" href="{{url('kendaraan')}}">
            <i class="fas fa-car fa-car-alt"></i>
            <span>Kendaraan</span></a>
    </li>

    <li class="nav-item {{request()->is('paket') || request()->is('detailing') ? 'active':''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="false" aria-controls="collapseUtilities">
            <i class="fas fa-car fa-car-alt"></i>
            <span>Layanan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar"
            style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('paket')}}">Car Wash</a>
                <a class="collapse-item" href="{{url('detailing')}}">Detailing</a>
            </div>
        </div>
    </li>


    <li class="nav-item {{request()->is('listpesanan') ? 'active':''}}">
        <a class="nav-link" href="{{url('listpesanan')}}">
            <i class="fas fa-bell fa-bell-alt"></i>
            <span>List Pesanan</span></a>
    </li>

    <li class="nav-item {{request()->is('laporan') ? 'active':''}}">
        <a class="nav-link" href="{{url('laporan')}}">
            <i class="fas fa-file fa-file-alt"></i>
            <span>Laporan</span></a>
    </li>



</ul>
<!-- End of Sidebar -->