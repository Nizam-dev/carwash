<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            Cuci Mobil Banyuwangi
        </div>
    </form>

    <?php 
        $notifs = App\Models\transaksi::join('customers','customers.id','transaksis.customer_id')
        ->select('transaksis.*','customers.nama')
        ->where('transaksis.status','pemesanan')->latest()->take(10)->get();;
    ?>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{$notifs->count()}}</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notifikasi
                </h6>
                
                @foreach($notifs as $notif)
                <a class="dropdown-item d-flex align-items-center" href="{{url('listpesanan')}}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-car text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{$notif->created_at->diffForHumans()}}</div>
                        <div class="small text-black">{{$notif->nama.' '.$notif->plat_nomor}}</div>
                        <span class="font-weight-bold">Melakukan Pesanan </span>
                    </div>
                </a>
                @endforeach
               
                <a class="dropdown-item text-center small text-gray-500" href="{{url('listpesanan')}}">Show All Alerts</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('public/image/profile/akun.png')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('profil')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <a class="dropdown-item" href="{{url('pengaturanwhatsapp')}}">
                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                    Pengaturan Whatsapp
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>

               
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->