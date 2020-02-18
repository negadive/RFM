<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "kp";

$koneksi = mysqli_connect("$servername","$username","","$database");

// Cek Koneksi
if (!$koneksi){
	echo "Koneksi Gagal : " . mysqli_connect_error();
}

?> 