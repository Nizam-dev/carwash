<div class="card shadow mb-4">
    
    <div class="card-body">
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
                        <th>Option</th>
                    </tr>
                </thead>

                <tbody>
                 
                    @foreach($pesanans->where('status','proses') as $pesanan)
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
                            <td>
                                <button class="btn btn-sm btn-success" onclick="verifikasiselesai({{$pesanan}})">
                                <i class="fa fa-edit"></i>
                                Selesai</button>
                            </td>
                        </tr>
                    @endforeach 

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->


<div class="modal fade" id="pesananProsesVerif" tabindex="-1" role="dialog" aria-labelledby="pesananProsesVerifLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pesananProsesVerifLabel">Apakah Mobil Telah selesai?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('verifikasipesananselesai')}}" method="post">
               @csrf
               <input type="text" name="id" class="d-none">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ya Selesai</button>
      </div>
      </form> 
    </div>
  </div>
</div>