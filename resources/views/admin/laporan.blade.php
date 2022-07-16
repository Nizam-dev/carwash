@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Bulanan

            <a href="{{url('laporanpdf')}}" class="btn btn-sm btn-danger float-right">Cetak Laporan <i class="fa fa-file-pdf" aria-hidden="true"></i></a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>

                <tbody>
                 
                    @foreach($laporans as $laporan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$laporan->bulan}}</td>
                            <td>{{$laporan->total_pesanan}}</td>
                            <td>@currency($laporan->total_pendapatan)</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
$("#dataTable").dataTable()
</script>

@endsection