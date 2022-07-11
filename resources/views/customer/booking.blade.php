@extends('customer-template.master')

@section('css')
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



.layananku .services , .det .card{
    cursor: pointer;
}

.layananku .services:hover, .det .card:hover {
    background: #2889a71a;
    box-shadow: -2px 2px 5px lightblue;
}

.layananku .services.active {
    background: #2889a71a;
    box-shadow: -2px 2px 5px lightblue;
}
.price{
    margin-top:0;
    font-size:16px;
    color : green;
}

.card-footer{
    padding: 0;
    background-color: unset;
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
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Jenis Mobil</label>
                        <select name="" id="" class="form-control">
                            <option value="">Mobil</option>
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
                            <h3 class="heading-section mb-4">Plih Layanan</h3>
                            <div class="row d-flex mb-4">

                               

                                <div onclick="pilihService(this)"
                                    class="col-md-4 d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                                    <div class="services py-3 card w-100 text-center">
                                        <input type="radio" name="layanan" id="" class="">

                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading">Quick Wash</h3>
                                        </div>

                                        <ul class="layanan-list">
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                        </ul>

                                        <div class="card-footer">
                                        <span class="price">Rp.50000</span>

                                        </div>

                                    </div>
                                </div>

                                <div onclick="pilihService(this)"
                                    class="col-md-4 d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                                    <div class="services py-3 card w-100 text-center">
                                        <input type="radio" name="layanan" id="" class="">

                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading">Quick Wash</h3>
                                        </div>

                                        <ul class="layanan-list">
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                        </ul>

                                        <div class="card-footer">
                                        <span class="price">Rp.50000</span>

                                        </div>

                                    </div>
                                </div>

                                <div onclick="pilihService(this)"
                                    class="col-md-4 d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                                    <div class="services py-3 card w-100 text-center">
                                        <input type="radio" name="layanan" id="" class="">

                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading">Quick Wash</h3>
                                        </div>

                                        <ul class="layanan-list">
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                            <li><i class="fa fa-check text-success"></i> Hand Wash</li>
                                        </ul>

                                        <div class="card-footer">
                                        <span class="price">Rp.50000</span>

                                        </div>

                                    </div>
                                </div>




                            </div>

                            <h3 class="heading-section mb-4">Plih Layanan Detailing</h3>

                            <div class="row det d-flex mb-4">

                                <div onclick="pilihDetailing(this)"
                                    class="dtl col-md-3 d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                                    <div class=" py-3 card w-100 text-center">
                                        <input type="checkbox" name="layanan" id="" class="">

                                        <div class="icon d-flex align-items-center justify-content-center">
                                        <i class="fa fa-car" aria-hidden="true"></i>


                                        </div>


                                        <ul class="detailing-list">
                                            <li> Hand Wash</li>
                                        </ul>

                                    </div>
                                </div>




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
<script>
function pilihService(el) {
    $(".layananku").find(".services.active").removeClass('active')
    $(el).find(".services").addClass('active')
    $(el).find('input[type="radio"]').prop("checked", true);
}

function pilihDetailing(el) {
    let cek = $(el).find('input[type="checkbox"]');
    if(cek.prop("checked")){
        cek.prop('checked',false)
    }else{
        cek.prop('checked',true)
    }
}
</script>
@endsection