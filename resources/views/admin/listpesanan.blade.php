@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Pesanan </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Plat Nomor</th>
                        <th>Kendaraan</th>
                        <th>Nama Paket</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                 
                    @foreach($pesanans as $pesanan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pesanan->nama}}</td>
                            <td>{{$pesanan->plat_nomor}}</td>
                            <td>{{$pesanan->nama_kendaraan}}</td>
                            <td>
                                
                            </td>
                            <td>{{$pesanan->total}}</td>

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