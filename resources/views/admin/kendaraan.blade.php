@extends("template.master")
@section("content")

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jenis Kendaraan 
            <button class="btn btn-sm btn-primary float-right" id="tambahkendaraan">
            <i class="fas fa-car fa-car-alt"></i>
            Tambah</button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kendaraan</th>
                        <th>Jenis Kendaraan</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                   
                    @foreach($kendaraans as $kendaraan)    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kendaraan->nama_kendaraan}}</td>
                        <td>{{$kendaraan->jenis_kendaraan}}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="edit({{$kendaraan}})">
                                <i class="fa fa-edit"></i>
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
        <h5 class="modal-title" id="tambahModalLabel">Tambah Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('kendaraan')}}" method="post">

      <div class="modal-body">
      @method('patch')
            @csrf
            <input type="text" name="id" class="d-none">
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input name="nama_kendaraan" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Jenis Kendaraan</label>
                <select name="jenis_kendaraan" id="" class="form-control">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="Extra">Extra</option>
                </select>
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
    $("#tambahModal form").attr("action","{{url('kendaraan')}}")
    $("#tambahModalLabel").html("Tambah Mobil")
    $("[name='_method']").remove()
    $("input[name='nama_kendaraan']").val("")
    $("#tambahModal").modal("show")
})

function edit(kendaraan) {
    $("#tambahModal form").attr("action",`{{url('kendaraan')}}/${kendaraan.id}`)
    $("#tambahModal .modal-body").prepend(`<input type="hidden" name="_method" value="patch">`)
    $("#tambahModalLabel").html("Edit Mobil")
    $("input[name='nama_kendaraan']").val(kendaraan.nama_kendaraan)
    $("select[name='jenis_kendaraan']").val(kendaraan.jenis_kendaraan)
    $("#tambahModal").modal("show")
}
</script>

@endsection