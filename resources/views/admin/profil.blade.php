@extends("template.master")
@section("content")


<div class="card">
    <div class="card-header">
        Profil
    </div>
    <div class="card-body">


        <form action="{{url('profil')}}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-2">
                    <label for="">Nama</label>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="form-group">
                        <input type="text" value="{{auth()->user()->name}}" name="name" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label for="">Email</label>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="form-group">
                        <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label for="">Password</label>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>

            <button class="btn btn-sm btn-primary float-right mt-2" type="submit">Simpan</button>


        </form>


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

