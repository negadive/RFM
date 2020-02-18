<?php

session_start();

include "koneksi.php";

	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$_SESSION["login"] = false;

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		
		if ( $username == $row["username"] && $password == $row["password"])  {

			// set session
			$_SESSION["login"] = true;

			header("location:home.php");
			exit;
		}
	$_SESSION["salah"] = "username/password salah!";
	header("location:index.php");


			
	}


	


?>