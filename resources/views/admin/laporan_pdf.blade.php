<!DOCTYPE html>
<html>
<head>
	<title>Lporan Bulanan Carwash Pdf</title>
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
                        <th>Jumlah Pesanan</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>

                <tbody>
                 
                    @foreach($laporans as $laporan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$laporan->bulan}}</td>
                            <td>{{$laporan->total_pesanan}}</td>
                            <td>@currency($laporan->total_pendapatan)</td>
                        </tr>
                    @endforeach

                </tbody>
	</table>
 
</body>
</html>