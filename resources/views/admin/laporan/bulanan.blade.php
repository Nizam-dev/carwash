<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Bulanan

            <a href="{{url('laporanpdf')}}" id="cetakUrl" class="btn btn-sm btn-danger float-right">Cetak Laporan <i
                    class="fa fa-file-pdf" aria-hidden="true"></i></a>
        </h6>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="form-group col-md-3">

                <select class="form-control" name="bulan" id="">
                    @for ($m=1; $m<=12; $m++) <option value="{{$m}}"> {{date('F', mktime(0,0,0,$m, 1, date('Y')))}}
                        </option>
                        @endfor
                </select>

            </div>

            <div class="form-group col-md-3">
                <select name="tahun" id="" class="form-control">
                    @for( $i=date('Y'); $i>=2021; $i-- ) {
                    <option value='{{$i}}'>{{$i}}</option>
                    @endfor
                </select>
                </di>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Kategori</th>
                            <th>Nama Paket</th>
                            <th>Jumlah Pesanan</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $num=1;?>
                        @foreach($laporan_paket as $laporan)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$laporan->bulan}}</td>
                            <td>Paket Cuci</td>
                            <td>{{$laporan->nama_paket}}</td>
                            <td>{{$laporan->total_pesanan}}</td>
                            <td>@currency($laporan->total_pendapatan)</td>
                        </tr>
                        @endforeach
                        @foreach($laporan_detailing as $laporan)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$laporan->bulan}}</td>
                            <td>Detailing</td>
                            <td>{{$laporan->nama_paket}}</td>
                            <td>{{$laporan->total_pesanan}}</td>
                            <td>@currency($laporan->total_pendapatan)</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>