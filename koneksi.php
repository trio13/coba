<?php 
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$db		= "dbsekolahminggu";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if (mysqli_errno($koneksi)) {
		die("Failed to cennect database " . mysqli_connect_error());
	}
 ?>