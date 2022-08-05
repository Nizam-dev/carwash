<!DOCTYPE html>
<html>

<head>
    <title>Lporan Bulanan Carwash Pdf</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Transaksi Bulanan Carwash</h4>
    </center>

    <table class='table table-bordered'>
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
            </tr>
        </thead>

        <tbody>

            @foreach($transaksis as $pesanan)
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

            </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>