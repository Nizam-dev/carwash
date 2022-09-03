@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Karyawan
            <button class="btn btn-sm btn-primary float-right" id="tambahkendaraan">
            <i class="fas fa-user fa-user-alt"></i>
            Tambah</button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Hapus</th>
                    </tr>
                </thead>

                <tbody>
                   
                    @foreach($karyawans as $karyawan)    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$karyawan->nama_karyawan}}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="hapus({{$karyawan}})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('karyawan')}}" method="post">

      <div class="modal-body">
            @csrf
            <input type="text" name="id" class="d-none">
            <div class="form-group">
                <label for="">Nama karyawan</label>
                <input name="nama_karyawan" type="text" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('karyawan')}}" method="post">
        @method('delete')
        @csrf
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js')

<script>
    @if(session()->has('sukses'))  
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '{{session()->get('sukses')}}'
        })
    @endif

    @if(session()->has('gagal'))  
    Swal.fire({
        icon: 'warning',
        title: 'Gagal',
        text: '{{session()->get('gagal')}}'
        })
    @endif

$("#dataTable").dataTable()

$("#tambahkendaraan").on('click',()=>{
    $("input[name='nama_karyawan']").val("")
    $("#tambahModal").modal("show")
})

function hapus(kendaraan) {
    $("#hapusModal form").attr("action",`{{url('karyawan')}}/${kendaraan.id}`)
    $("#hapusModal").modal("show")
}
</script>

@endsection