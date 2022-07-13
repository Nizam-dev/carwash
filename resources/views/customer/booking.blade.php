@extends('customer-template.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<style>
.layanan-list {
    list-style-type: none;
    font-size: 12px;
    padding: 0;
}

.detailing-list {
    list-style-type: none;
    font-size: 14px;
    padding: 0;
}

.layananku input[type="radio"] {
    margin-bottom: 5px;
    height: 19px;
    width: 19px;
    margin-left: auto;
    margin-right: auto;
}

.det .dtl input[type="checkbox"] {
    margin-bottom: 5px;
    height: 15px;
    width: 15px;
    margin-left: auto;
    margin-right: auto;
}



.layananku .services,
.det .card {
    cursor: pointer;
}

.layananku .services:hover,
.det .card:hover {
    background: #2889a71a;
    box-shadow: -2px 2px 5px lightblue;
}

.layananku .services.active {
    background: #2889a71a;
    box-shadow: -2px 2px 5px lightblue;
}

.price {
    margin-top: 0;
    font-size: 16px;
    color: green;
}

.card-footer {
    padding: 0;
    background-color: unset;
}

.select2-selection.select2-selection--single {
    height: 52px !important;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
}
</style>


@endsection
@section('content')


<div class="hero-wrap ftco-degree-bg"
    style="background-image: url({{asset('public/landingpage/images/carwashbanner.jpg')}});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container" style="padding-top: 90px;">
        <div class="col-md-12 ftco-animate">

            <form action="#" class="bg-light p-5 contact-form">
                <div class="row">
                    <label for="">Masukan Data Diri</label>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">No Wa</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input type="number" class="form-control" placeholder="83xxxxxxx">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Jenis Mobil</label>
                        <select name="" id="jenis_mobil" class="form-control">
                            <option value="" disabled selected>Pilih Jenis Mobil</option>
                            @foreach($kendaraans as $kendaraan)
                            <option value="{{$kendaraan->id}}">{{$kendaraan->nama_kendaraan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Plat Nomor</label>
                        <input type="text" class="form-control">
                    </div>
                </div>




            </form>




        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12	featured-top">
                <div class="row no-gutters layananku">

                    <div class="col-md-12 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Paket Cuci</h3>
                            <div class="row d-flex mb-4" id="paket_cuci_list">
                                <h6 class="ml-3">Silahkan Pilih Jenis Mobil</h6>
                            </div>

                            <h3 class="heading-section mb-4">Detailing</h3>

                            <div class="row det d-flex mb-4" id="detailing_list">
                                <h6 class="ml-3">Silahkan Pilih Jenis Mobil</h6>
                            </div>


                            <button class="btn btn-primary float-right">Booking</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$('#jenis_mobil').select2({
    theme: "bootstrap4"
});

function pilihService(el) {
    $(".layananku").find(".services.active").removeClass('active')
    $(el).find(".services").addClass('active')
    $(el).find('input[type="radio"]').prop("checked", true);
}

function pilihDetailing(el) {
    let cek = $(el).find('input[type="checkbox"]');
    if (cek.prop("checked")) {
        cek.prop('checked', false)
    } else {
        cek.prop('checked', true)
    }
}

$('#jenis_mobil').on('change', () => {
    axios.post('getpaketlayanan', {
            jenis_kendaraan: $('#jenis_mobil').val()
        })
        .then((res) => {
            let paket_detailing = res.data.paket_detailing;
            console.log(paket_detailing)
            let paket_cuci = res.data.paket_cuci;

            $("#detailing_list").empty()
            paket_detailing.forEach((detailing) => {
                $("#detailing_list").append(`
            <div onclick="pilihDetailing(this)"
                class="dtl col-md-3 d-flex align-self-stretch ftco-animate fadeInUp ftco-animated mb-3">
                <div class=" py-3 card w-100 text-center">
                    <input type="checkbox" value="${detailing.id}" name="paket_detailing" id="" class="">

                    <div class="icon d-flex align-items-center justify-content-center">
                    <i class="fa fa-car" aria-hidden="true"></i>


                    </div>


                    <ul class="detailing-list">
                        <li>${detailing.nama_detailing}</li>
                        <li>${detailing.harga_detailing}</li>
                    </ul>

                </div>
            </div>
            `)
            })


            $("#paket_cuci_list").empty()
            paket_cuci.forEach((cuci) => {

                $("#paket_cuci_list").append(`
                <div onclick="pilihService(this)"
                    class="col-md-4 d-flex align-self-stretch ftco-animate fadeInUp ftco-animated mb-3">
                    <div class="services py-3 card w-100 text-center">
                        <input type="radio" value="${cuci.id}" name="paket_cuci" id="" class="">

                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-rent"></span></div>
                        <div class="text w-100">
                            <h3 class="heading">${cuci.nama_paket}</h3>
                        </div>

                        <ul class="layanan-list">
                            <li><i class="fa fa-check text-success"></i>
                            ${cuci.deskripsi_paket.replaceAll(", ", `</li><li><i class="fa fa-check text-success"></i> `)}
                        </ul>

                        <div class="card-footer">
                        <span class="price">Rp. ${cuci.harga_paket}</span>

                        </div>

                    </div>
                </div>
            `)
            })

        })
})
</script>
@endsection