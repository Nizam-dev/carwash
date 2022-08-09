@extends("template.master")
@section("content")


<div class="card">
    <div class="card-header">
        Pengaturan Whatsapp
    </div>
    <div class="card-body">


        @if($res->status == "connected")
        <span class="badge badge-success">
            Status connected
        </span>

        <h6>Konek Pada Tanggal : {{date("d-m-Y H:m", strtotime($res->connected_at))}}</h6>
        @else

            <span class="badge badge-danger">
                Status disconnected
            </span>

            <h6 class="mt-2">Silahkan scan barcode dibawah untuk menghubungkan</h6>
            <h6 class="mb-2 mt-2">Jika whatsapp anda sudah terhubung silahkan klik refresh</h6>

            <a  href="{{url('pengaturanwhatsapp')}}" class="btn btn-primary mb-2">Refresh</a>

            <iframe frameBorder="0" width="100%" height="550" src="{{$qr->image_url}}" ></iframe>

            

        @endif


    </div>
</div>




@endsection

@section('js')

<script>
    @if(session()->has('sukses'))
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{session()->get('sukses')}}"
    })
    @endif

</script>

@endsection

