<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Nama</th>
                        <th>Plat Nomor</th>
                        <th>Kendaraan</th>
                        <th>Nama Paket</th>
                        <th>Nama Pegawai</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                 
                    @foreach($pesanans->where('status','selesai') as $pesanan)
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
                            <td>{{$pesanan->nama_pegawai}}</td>
                            <td>@currency($pesanan->total)</td>
                           
                        </tr>
                    @endforeach 

                </tbody>
            </table>
        </div>
    </div>
</div>


