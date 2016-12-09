<?php
	include('koneksi.php');
	$query
	$kode = $_POST['kode'];
	$tgl = date("Y-m-d");
	$query 	= "INSERT INTO tabsen VALUES ('".$kode."','".$tgl."','".$kode."','1','2', '".$kode."')";
	mysqli_query($koneksi, $query);
?>