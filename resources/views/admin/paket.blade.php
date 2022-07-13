@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Paket </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Deskripsi</th>
                        <th>A</th>
                        <th>B</th>
                        <th>Extra</th>
                    </tr>
                </thead>

                <tbody>
                    
                @foreach($pakets as $paket)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$paket->nama_paket}}</td>
                        <td>
                            <i class="fa fa-check text-success"></i>
                            {!!str_replace(', ', '<br><i class="fa fa-check text-success"></i> ', $paket->deskripsi_paket)!!}
                        </td>
                        <td>{{$paket->harga->where('jenis_kendaraan','A')->first()->harga_paket}}</td>
                        <td>{{$paket->harga->where('jenis_kendaraan','B')->first()->harga_paket}}</td>
                        <td>{{$paket->harga->where('jenis_kendaraan','Extra')->first()->harga_paket}}</td>
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