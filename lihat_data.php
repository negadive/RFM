<?php

session_start();

//var_dump($_SESSION);
if( !isset($_SESSION["login"]) ){
  header("location:masuk.php");
  exit;
}

include "koneksi.php";

$tahun = $_GET["thn"];

//$query = mysqli_query($koneksi,"SELECT * FROM transaksi, pelanggan WHERE transaksi.no_pelanggan = pelanggan.no_pelanggan");	
$query = mysqli_query($koneksi,"SELECT * FROM transaksi, pelanggan WHERE transaksi.no_pelanggan = pelanggan.no_pelanggan and YEAR(transaksi.tgl_transaksi) = $tahun");		
//$query = mysqli_query($koneksi, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<title>Data pelanggan Fellas Production pada Tahun 2018</title> <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">SISTEM RFM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">HOME</a></li>
        <li><a href="#">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
if( mysqli_num_rows($query) >= 1) {
?>
	<h1>Data Transaksi Pelanggan <b>Fellas</b> Production Pada Tahun 2018</h1>
	<table class="data-table">
		<br>
		<thead>
			<tr>
				<th>NO Transaksi</th>
				<th>NO Pelanggan</th>
				<th>Nama Pelanggan</th>
				<th>telepon</th>
				<th>Email</th>
                <th>Tanggal Transaksi</th>
				<th>Harga Transaksi</th>
                <th>Jasa</th>
			</tr>
		</thead>
		<tbody>
		<?php

        //$no 	       	 = 'no_transaksi';
        //$nama 	      = 'nama_pelanggan' ;
        //$telepon        = 'telepon';
        //$email          = 'email';
        
		//$tgl_transaksi	= array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		while ($row = mysqli_fetch_array($query))
		{
        //$tgl 	= explode('-', $row['tgl_transaksi']);
            
        //$jumlah_transaksi  = 'jumlah_transaksi';
        
        //$jasa = 'jasa' 

			echo "<tr>
					<td>".$row['no_transaksi']."</td>
					<td>".$row['no_pelanggan']."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['telp']." </td>
                    <td>".$row['email']." </td>
					<td>".$row['tgl_transaksi']."</td>
                    <td>".$row['harga_transaksi']."</td>
                    <td>".$row['jasa']."</td>
				</tr>"
            ;
			//s$no++;
		}?>
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<br>
<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <a href="tes.php?thn=2018" class="btn btn-default btn-lg">
    Lihat Hasil Analisa RFM
  </a>
</footer>
<?php

}else{
	echo "<h1>Data Transaksi Pelanggan <b>belum ada</b></h1>";
}

?>
</body>
</html>