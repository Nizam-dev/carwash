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
                        <th>Detailing</th>
                        <th>A</th>
                        <th>B</th>
                        <th>Extra</th>
                        <th>Edit Harga</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($detailings as $detailing)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$detailing->nama_detailing}}</td>
                        <td>{{$a = $detailing->harga->where('jenis_kendaraan','A')->first()->harga_detailing}}</td>
                        <td>{{$b = $detailing->harga->where('jenis_kendaraan','B')->first()->harga_detailing}}</td>
                        <td>{{$extra = $detailing->harga->where('jenis_kendaraan','Extra')->first()->harga_detailing}}</td>
                    <td>
                            <button class="btn btn-sm btn-warning" onclick="edit('{{$detailing->id}}','{{$a}}','{{$b}}','{{$extra}}')">
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

      <form action="{{url('detailing')}}" method="post">
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