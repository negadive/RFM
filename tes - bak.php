<?php

    include "koneksi.php";

//ni hapus table temp
    mysqli_query($koneksi, "DELETE FROM temp");

//ni buat buat ngambil /milih data dr database
    $tahun = $_GET["thn"];
    $sql = mysqli_query($koneksi,"SELECT transaksi.no_pelanggan , transaksi.tgl_transaksi, MAX(harga_transaksi) AS max_hrg_trans, MAX(tgl_transaksi) AS max_tgl_trans, COUNT(tgl_transaksi) as jumlah_transaksi 
		FROM transaksi, pelanggan WHERE transaksi.no_pelanggan = pelanggan.no_pelanggan 
		GROUP BY transaksi.no_pelanggan");

    $jumlahData = mysqli_num_rows($sql);

    while($data = mysqli_fetch_array($sql)){

    //Recency
        if($data['tgl_transaksi'] > date('Y-m-d', strtotime('-18 months', strtotime( date('Y-m-d')))) ){
            $rec = 5;
        }else if($data['tgl_transaksi'] > date('Y-m-d', strtotime('-20 months', strtotime( date('Y-m-d')))) ){
            $rec = 4;
        }else if($data['tgl_transaksi'] > date('Y-m-d', strtotime('-22 months', strtotime( date('Y-m-d')))) ){
            $rec = 3;
        }else if($data['tgl_transaksi'] > date('Y-m-d', strtotime('-24 months', strtotime( date('Y-m-d')))) ){
            $rec = 2;
        }else 
        //if($data['tgl_transaksi'] > date('Y-m-d', strtotime('-26 months', strtotime( date('Y-m-d')))) )
        {
            $rec = 1;
        //} else {
        //    $rec = 0;
        }

    //Frequency
        if($data['jumlah_transaksi']<=1){
            $freq = 1;
        }else if($data['jumlah_transaksi']==2){
            $freq = 2;
        }else if($data['jumlah_transaksi']==3){
            $freq = 3;
        }else if($data['jumlah_transaksi']==4){
            $freq = 4;
        }else if($data['jumlah_transaksi']>=5){
            $freq = 5;
        }else {
            $freq = 0;
        }

    //monetary
        if($data['max_hrg_trans']<1000000){
            $mon = 1;
        }else if($data['max_hrg_trans']<3000000){
            $mon = 2;
        }else if($data['max_hrg_trans']<5000000){
            $mon = 3;
        }else if($data['max_hrg_trans']<7000000){
            $mon = 4;
        }else if($data['max_hrg_trans']>=7000000){
            $mon = 5;
        }else {
            $mon = 0;
        }


        $temp = mysqli_query($koneksi, "INSERT INTO temp (no_pelanggan, recency, frequency, monetary) VALUES ('".$data['no_pelanggan']."', '$rec', '$freq', '$mon')");
        
    }
    
//    if($temp){
//        echo "";
//    }ELSE{
//        echo "salah";
//        echo mysqli_error($koneksi);
//    }

    $query = mysqli_query($koneksi,"SELECT * FROM temp");

//    echo "Potensial"; 

?>

<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>
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

<!-- Navbar -->
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

    <h1>Hasil RFM <b>Fellas</b> Production Pada tahun  2018</h1>
	<table class="data-table">
		<br>
		<thead>
			<tr>
				<th>No Pelanggan</th>
				<th>Recency</th>
				<th>Frequency</th>
				<th>Monetary</th>
				<th>RFM</th>
				<th>Keterangan</th>
			</tr>
		</thead>

		<tbody>
     
	 
    <?php
            while ($row = mysqli_fetch_array($query))
            {
                echo 
                    "<tr>
                    <td>".$row['no_pelanggan']."</td>
                    <td>".$row['recency']."</td>
                    <td>".$row['frequency']." </td>
                    <td>".$row['monetary']." </td>
                    <td>".(($row['recency']+$row['frequency']+$row['monetary'])/3) ."</td>

                    <td>";
            
                if ((($row['recency']+$row['frequency']+$row['monetary'])/3) >= 3){
                    echo "Potensial";
                }else{
                    echo "Tidak Potensial";
                }
                echo"</td>
                </tr>";
            }
    ?>
	


         </tbody>
    </table>
	<br>
		<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
	<a href="tes_print.php?thn=<?php echo $tahun;?>" class="btn btn-default btn-lg" target="_BLANK">
    Cetak hasil analisa RFM</a>
</footer>
</body>
</html>