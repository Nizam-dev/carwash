<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Transaksi

            <a href="{{url('laporanpdf')}}" id="cetaTransaksikUrl" class="btn btn-sm btn-danger float-right">Cetak Laporan <i
                    class="fa fa-file-pdf" aria-hidden="true"></i></a>
        </h6>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="form-group col-md-3">

                <select class="form-control" name="bulan2" id="">
                    @for ($m=1; $m<=12; $m++) <option value="{{$m}}"> {{date('F', mktime(0,0,0,$m, 1, date('Y')))}}
                        </option>
                        @endfor
                </select>

            </div>

            <div class="form-group col-md-3">
                <select name="tahun2" id="" class="form-control">
                    @for( $i=date('Y'); $i>=2021; $i-- ) {
                    <option value='{{$i}}'>{{$i}}</option>
                    @endfor
                </select>
                </di>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Transaksi</th>
                            <th>Nama</th>
                            <th>Plat Nomor</th>
                            <th>Kendaraan</th>
                            <th>Nama Paket</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($transaksis as $pesanan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pesanan->created_at->format('d-m-Y(H:i)')}}</td>
                            <td>{{$pesanan->kode_transaksi}}</td>
                            <td>{{$pesanan->nama}}</td>
                            <td>{{$pesanan->plat_nomor}}</td>
                            <td>{{$pesanan->nama_kendaraan}}</td>
                            <td>
                                <ul>
                                    @if(!$pesanan->cuci->isEmpty())
                                    @foreach($pesanan->cuci as $cuci)
                                    <li> {{$cuci->nama_paket}}</li>
                                    @endforeach
                                    @endif
                                    @if(!$pesanan->detailing->isEmpty())
                                    @foreach($pesanan->detailing as $detailing)
                                    <li> {{$detailing->nama_detailing}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </td>
                            <td>@currency($pesanan->total)</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>