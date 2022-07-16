@extends("template.master")
@section('css')
<style>
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
}
</style>
@endsection
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
                        <th>Edit Harga</th>
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
                        <td>{{$a = $paket->harga->where('jenis_kendaraan','A')->first()->harga_paket}}</td>
                        <td>{{$b = $paket->harga->where('jenis_kendaraan','B')->first()->harga_paket}}</td>
                        <td>{{$extra = $paket->harga->where('jenis_kendaraan','Extra')->first()->harga_paket}}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="edit('{{$paket->id}}','{{$a}}','{{$b}}','{{$extra}}')">
                            <i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Harga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('paket')}}" method="post">
      <div class="modal-body">
            @csrf
            <input type="text" name="id" class="d-none">
            <div class="form-group">
                <label for="">A</label>
                <input name="a" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">B</label>
                <input name="b" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Extra</label>
                <input name="extra" type="number" class="form-control">
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
$("#dataTable").dataTable()

function edit(id,a,b,extra) {
    $("input[name='id']").val(id)
    $("input[name='a']").val(a)
    $("input[name='b']").val(b)
    $("input[name='extra']").val(extra)
    $("#editModal").modal('show')
}
</script>

@endsection