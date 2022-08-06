@extends("template.master")
@section("content")

<div class="row">


    <div class="col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Mobil Hari Ini</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$totalhariini}} Mobil</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Mobil Bulan Ini</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$totalbulanini}} Mobil</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Produk Paling Laku</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$pl}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shower fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Penghasilan Perbulan</h6>
           
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

@section('js')
<script src="{{asset('public/template/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public/template/js/demo/chart-area-demo.js')}}"></script>

<script>
    
    $(document).ready(()=>{
        grafikChart()
    })

    function grafikChart() {
        const bulanan = @json($bulanan);
        let label = []
        let data = []
        bulanan.forEach((laporan)=>{
            label.push(laporan.bulan)
            data.push(laporan.total_pendapatan)
        })
        drawlinechart(label, data)
    }
</script>
@endsection