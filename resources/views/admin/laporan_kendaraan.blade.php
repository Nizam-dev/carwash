@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Kendaraan
        </h6>
    </div>
    <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Plat</th>
                            <th>Nama Kendaraan</th>
                            <th>Total Cuci</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $num=1;?>
                        @foreach($laporan_kendaraans as $laporan)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$laporan->plat_nomor}}</td>
                            <td>{{$laporan->nama_kendaraan}}</td>
                            <td>{{$laporan->total}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('js')
<script>
    $(document).ready(()=>{
        table = $("#dataTable").DataTable()
    })

</script>
@endsection