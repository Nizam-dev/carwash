@extends("template.master")
@section("content")


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pesanan Baru</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sedang Di Proses</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Selesai</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    @include('admin.pesanan.belumdiverifikasi')

  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    @include('admin.pesanan.proses')
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    @include('admin.pesanan.selesai')
  </div>
</div>





@endsection

@section('js')

<script>
      @if(session()->has('sukses-selesai'))
    $("a[href='#nav-profile']").click()
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '{{session()->get('sukses-selesai')}}'
        })
    @elseif(session()->has('sukses'))  
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '{{session()->get('sukses')}}'
        })
    @endif
$("#dataTable,#dataTable2,#dataTable3").dataTable()

function verifikasi(mobil) {
    $("#pesananVerif input[name='id']").val(mobil.id)
    $("#pesananVerif").modal("show")
}

function verifikasiselesai(mobil) {
    $("#pesananProsesVerif input[name='id']").val(mobil.id)
    $("#pesananProsesVerif").modal("show")
}
</script>

@endsection