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
    .det .card:hover,
    .det .card.active {
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

            <form action="#" id="form-customer" class="bg-light p-5 contact-form">
                <div class="row">
                    <label for="">Masukan Data Diri</label>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Nama</label>
                        <input name='nama' type="text" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">No Wa</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input name='no_hp' type="number" class="form-control" placeholder="83xxxxxxx" required>
                        </div>
                    </div>
                  
                    <div class="col-md-6 form-group">
                        <label for="">Jenis Mobil</label>
                        <select name="jenis_mobil" id="jenis_mobil" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis Mobil</option>
                            @foreach($kendaraans as $kendaraan)
                            <option jenis_kendaraan="{{$kendaraan->jenis_kendaraan}}" value="{{$kendaraan->id}}">
                                {{$kendaraan->nama_kendaraan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Plat Nomor</label>
                        <input type="text" class="form-control" name='plat_nomor' required>
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


                            <button class="btn btn-primary float-right" id="booking-pesanan">Booking</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="konfirmasipesanan" tabindex="-1" role="dialog" aria-labelledby="konfirmasipesananLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="konfirmasipesananLabel">Konfirmasi Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h6>Nizam</h6>
            <h6>Nizam</h6>
            <h5>Pesanan</h5>
           
      </div>
      <form action="{{url('kirimpesanan')}}" method="post" id="send_form">
                @csrf
        <div id="form-data-kirim" class="d-none"></div>
    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="kirimpesanan">Kirim</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="pesangagalpaket" tabindex="-1" role="dialog" aria-labelledby="pesangagalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h6 class="text-danger">Silahkan Pilih Paket Anda</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


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
            $(el).find(".card").removeClass('active')
        } else {
            cek.prop('checked', true)
            $(el).find(".card").addClass('active')
        }
    }

    $('#jenis_mobil').on('change', () => {
            getLayanan()
        jenis_kendaraan_ini = $('#jenis_mobil option:selected').attr('jenis_kendaraan')
    })

    $("#booking-pesanan").on('click',()=>{
        if(validateForm("#form-customer")){
            if(getPesananLayanan()){
                    let nama = $("input[name='nama']").val()
                    let no_hp = $("input[name='no_hp']").val()
                    let plat_nomor = $("input[name='plat_nomor']").val()
                    $("#konfirmasipesanan .modal-body").empty()
                    sendataform()
                    $("#konfirmasipesanan .modal-body").append(`
                        <hr />
                        <h6>Informasi Data</h6>
                        <hr />
                        <h6>Nama : ${nama}</h6>
                        <h6>No Wa : 62${no_hp}</h6>
                        <h6>Plat Nomor : ${plat_nomor}</h6>
                        <hr />
                        <h6>Pesanan Paket Cuci</h6>
                            <h6>${$("input[name='paket_cuci']:checked").attr("paket") == undefined ? "-" : $("input[name='paket_cuci']:checked").attr("paket")}</h6>
                        <hr />
                        <h6>Pesanan Paket Detialing</h6>
                        ${getDet()}
                        <hr />

                    `)
                    $("#konfirmasipesanan").modal("show")
                }
            }
            
    })

    function getLayanan() {
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
                    <input type="checkbox" paket="${detailing.nama_detailing}" value="${detailing.id}" name="paket_detailing" id="" class="">

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
                        <input type="radio" paket='${cuci.nama_paket}' value="${cuci.id}" name="paket_cuci" id="" class="">

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
    }



    function getPesananLayanan(){
        let paket_cuci = $("input[name='paket_cuci']:checked")
        let paket_detailing = $("input[name='paket_detailing']:checked")
        if(paket_cuci.length !=0 || paket_detailing.length  != 0){
            return true
        }else{
            $("#pesangagalpaket").modal("show")
            return false
        }
    }

    function getDet(){
        let dt = $("input[name='paket_detailing']:checked")
        if(dt != 0){
            let viw=''
            dt.each((i,det)=>{
                viw= viw+`<h6>${$(det).attr('paket')}<h6>`
            });
            return viw;
        }
        return '';
    }

    function sendataform() {
        $("#form-data-kirim").empty()
        let nama = $("input[name='nama']").val()
        let no_hp= $("input[name='no_hp']").val()
        // let alamat= $("input[name='alamat']").val()
        let jenis_mobil= $("select[name='jenis_mobil']").val()
        let plat_nomor= $("input[name='plat_nomor']").val()
        let paket_cuci = $("input[name='paket_cuci']:checked").val()
        let paket_detailing = $("input[name='paket_detailing']:checked")
        $("#form-data-kirim").append(`
            <input name='nama_customer' value='${nama}'>
            <input name='no_hp_customer' value='62${no_hp}'>
            <input name='jenis_mobil_customer' value='${jenis_mobil}'>
            <input name='plat_nomor_customer' value='${plat_nomor}'>
            <input name='plat_nomor_customer' value='${plat_nomor}'>
            <input name='paket_cuci_customer' value='${paket_cuci}'>
        `)
        
        if(paket_detailing.length != 0){
            paket_detailing.each((i,det)=>{
            $("#form-data-kirim").append(`
                <input name='paket_detailing_customer[]' value='${$(det).val()}'>
            `)
            })
        }

    }

    $("#kirimpesanan").on('click',()=>{
        $("#send_form").submit()
    })
</script>
@endsection