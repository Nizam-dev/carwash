<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand"  href="{{url('/')}}">
        <div class="navbar-brand">
            <img src="{{asset('public/image/m2new.png')}}" style="width:90px;height:50px;">
        </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{request()->is('/')?'active':''}}"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item {{request()->is('booking')?'active':''}}"><a href="{{url('booking')}}" class="nav-link">Booking</a></li>
                <li class="nav-item"><a href="{{url('login')}}" class="nav-link">
                    <button class="btn btn-sm btn-success">Login</button>
                </a></li>
            </ul>
        </div>
    </div>
</nav>