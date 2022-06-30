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
                        <th>Layanan</th>
                        <th>Harga A</th>
                        <th>Harga B</th>
                        <th>Harga C</th>
                        <th>#</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Quick Wash</td>
                        <td>
                            <ul>
                                <li>Hand Wash</li>
                                <li>Interior Cleaning</li>
                            </ul>
                        </td>
                        <td>320000</td>
                        <td>350000</td>
                        <td>390000</td>
                        <td>
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Detailing</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                            -
                        </td>
                    </tr>



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