@extends("template.master")
@section("content")

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
        Bulanan
    </a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
        Transaksi
    </a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    @include('admin.laporan.bulanan')
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    @include('admin.laporan.transaksi')
  </div>

</div>



@endsection

@section('js')

<script>
var table
var table2
$(document).ready(()=>{
    const d = new Date();
    let month = d.getMonth();
      
    table = $("#dataTable").DataTable()
    table2 = $("#dataTable2").DataTable()
    $("[name='bulan'],[name='bulan2']").val(month+1)
    filterBulan() 
    filterBulanTransaksi()    
})


var bulans = [
"January","February","March","April","May","June","July","August","September","October","November","December"
]

$("[name='bulan'],[name='tahun']").on('change',()=>{
    filterBulan()    
})


function filterBulan(){
    let bulan = $("[name='bulan']").val()
    let nama_bulan = bulans[bulan-1]
    let tahun = $("[name='tahun']").val()
    $("#cetakUrl").attr("href", `{{url('laporanpdf')}}?bulan=${bulan}&tahun=${tahun}`)


        let i =1;
        table.column(1)
        .search( `${nama_bulan} ${tahun}` )
        .cells(null, 0, { search: 'applied', order: 'applied' })
        .every(function (cell) {
            this.data(i++);
        })
        .draw();
}


$("[name='bulan2'],[name='tahun2']").on('change',()=>{
    filterBulanTransaksi()    
})

function filterBulanTransaksi() {
    let bulan = $("[name='bulan2']").val()
    let tahun = $("[name='tahun2']").val()
    $("#cetaTransaksikUrl").attr("href", `{{url('laporantransaksipdf')}}?bulan=${bulan}&tahun=${tahun}`)

        let i =1;
        table2.column(1)
        .search( `${bulan}-${tahun}` )
        .cells(null, 0, { search: 'applied', order: 'applied' })
        .every(function (cell) {
            this.data(i++);
        })
        .draw();
}

</script>

@endsection