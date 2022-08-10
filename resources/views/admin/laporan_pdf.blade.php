<!DOCTYPE html>
<html>
<head>
	<title>Laporan Bulanan Carwash Pdf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Bulanan Carwash</h4>
	</center>
 
	<table class='table table-bordered'>
	<thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Kategori</th>
                        <th>Nama Paket</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>

                <tbody>
                 
                <?php $num=1;?>
                    @foreach($laporan_paket as $laporan)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$laporan->bulan}}</td>
                            <td>Paket Cuci</td>
                            <td>{{$laporan->nama_paket}}</td>
                            <td>{{$laporan->total_pesanan}}</td>
                            <td>@currency($laporan->total_pendapatan)</td>
                        </tr>
                    @endforeach
                    @foreach($laporan_detailing as $laporan)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$laporan->bulan}}</td>
                            <td>Paket Detailing</td>
                            <td>{{$laporan->nama_paket}}</td>
                            <td>{{$laporan->total_pesanan}}</td>
                            <td>@currency($laporan->total_pendapatan)</td>
                        </tr>
                    @endforeach

                </tbody>
	</table>
 
</body>
</html>