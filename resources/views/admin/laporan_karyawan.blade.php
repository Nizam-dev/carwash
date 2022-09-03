@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Karyawan
        </h6>
    </div>
    <div class="card-body">

        <form action="" method="get">
            <div class="row">
                <div class="form-group col-md-3">

                    <select class="form-control" name="bulan" id="">
                        @for ($m=1; $m<=12; $m++) 
                        <option value="{{$m}}" {{$m == $bulan ? 'selected' : ''}}> {{date('F', mktime(0,0,0,$m, 1, date('Y')))}}
                            </option>
                            @endfor
                    </select>

                </div>

                <div class="form-group col-md-3">
                    <select name="tahun" id="" class="form-control">
                        @for( $i=date('Y'); $i>=2021; $i-- ) {
                        <option value='{{$i}}' {{$i == $tahun ? 'selected' : ''}}>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                </div>
            </div>
        </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Total Kendaraan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $num=1;?>
                        @foreach($laporan_karyawans as $laporan)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$laporan->nama_pegawai}}</td>
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