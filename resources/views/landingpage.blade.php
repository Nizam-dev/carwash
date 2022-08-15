@extends('customer-template.master')
@section('css')
<style>
    .img .icon{
        font-size : 90px;
        color : blue;
    }
</style>
@endsection
@section('content')

<div class="hero-wrap ftco-degree-bg"
    style="background-image: url({{asset('public/landingpage/images/carwashbanner.jpg')}});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">M2 Auto Care</h1>
                    <p style="font-size: 18px;">M2 Car Wash dilengkapi peralatan lengkap serta teknisi handal yang siap memberikan layanan terbaik untuk Anda. Proses pengerjaan cepat, kendaraan menjadi bersih dan terawat dengan harga terjangkau.</p>
                    <a href="{{url('booking')}}" class="icon-wrap d-flex align-items-center mt-4 justify-content-center">
                        <div class="btn  btn-success">
                            <i class="fa fa-car"> Booking</i>
                        </div>
                        <!-- <div class="heading-title ml-5">
                            <span>Easy steps for wash a car</span>
                        </div> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2">Paket</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel"> -->
                    
                    <!-- @foreach($pakets as $paket) -->
                    <!-- <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded text-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-car"></span></div>
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="#">{{$paket->nama_paket}}</a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">A / B / Extra</span>
                                    <p class="price ml-auto"><span>Mulai</span> {{$paket->harga->where('jenis_kendaraan','A')->first()->harga_paket}}</p>
                                </div>
                                <p class="d-flex mb-0 d-block"><a href="{{url('booking')}}" class="btn btn-primary py-2 mr-1">Pesan</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
                            </div>
                        </div>
                    </div> -->
                    <!-- @endforeach -->
                  
                <!-- </div>
            </div>
        </div>
    </div>
</section> -->


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Carwash Service Flow</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-mobile"></span>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Booking</h3>
                        <p>
                        Customer melakukan booking mengisi data diri dan memilih paket.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="fa fa-comments"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Mendapat Nomor Antrian</h3>
                        <p>
                            Setelah melakukan booking customer akan mendapat nomor antrian.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-car"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Pengerjaan</h3>
                        <p>
                            Mobil dikerjakan sesuai pesanan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Selesai</h3>
                        <p>
                            Customer mendapat pesan melalui WhatsApp ketika mobil selesai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session()->has('sukses'))
    Swal.fire({
        icon: 'success',
        title: 'Pesanan Berhasil dikirim',
        text: "{{session()->get('sukses')}}"
        })
    @endif
</script>
@endsection
