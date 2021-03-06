<?php
	include('koneksi.php');
	session_start();

	if ($_SESSION['user_id'] != '') {
		$query 	 = "select * from tuser where kd_user = '".$_SESSION['user_id']."'";
		$profile = mysqli_fetch_array(mysqli_query($koneksi, $query));

		if(isset($_POST['submit'])){
			$kd_anak=$_POST['kode'];
			$nama=$_POST['nama'];
			$kelas=$_POST['kelas'];
			$jk=$_POST['gender'];
			$alamat=$_POST['alamat'];
			$date= new DateTime($_POST['tglLahir']);
			$tgl=$date->format('Y/m/d');
			$FotoN=$_FILES['file']['name'];
			$FotoS=$_FILES['file']['size'];
			$FotoT=$_FILES['file']['tmp_name'];
			$path="foto/".$kd_anak.".jpg";

			$query = "insert into tsm values('$kd_anak','$nama','$kelas','$jk','$alamat','$tglLahir','$path');";
		}
	}else {
		header('location: index.php');
	}

	function logout () {
		session_destroy();
		header('location: index.php');
	}

	if (isset($_GET['logout'])) {
   		logout();
  	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#EEE;"  >
	  <div class="container-fluid">
	    <div class="navbar-header">
			<h1>Sekolah Minggu</h1>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	    </ul>
	    <form action="home.php" method="POST" class="navbar-form navbar-right">
			<input type="text" id="nama" name="nama" class="form-control" placeholder="Search...">
		</form>
	  </div>
	</nav>
	<div class="container-fluid">
		<div class="row">
	        <div class="col-sm-3 col-md-2 sidebar">
	          <ul class="nav nav-sidebar"> 
	          		<li><a href="home.php">Absen</a></li>
	          		<li><a href="insert.php">Insert</a></li>
	          		<li><a href="update.php">Update</a></li>
					<li class="active"><a href="register.php">Register</a></li>
	          </ul>
	        </div>
      	</div>
      	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Register Guru Sekolah Minggu</h1>
            <div class="row" style="margin-top:10px;">
				<div class="col-md-6 col-md-offset-3">
						<form action="" class="form-horizontal">
							<div class="form-group">
								<label for="" class="control-label col-md-3">Kode Guru</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="kode" name="kode" 
									value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Nama</label>
								<div class="col-md-6">
									<input type="text" id="nama" name="nama" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Password</label>
								<div class="col-md-6">
									<input type="password" id="pwd" name="pwd" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Status</label>
								<div class="col-md-6">
									<input type="radio" name="status" value="pria" checked> Admin
									<input type="radio" name="status" value="wanita"> Guru
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Jenis Kelamin</label>
								<div class="col-md-6">
									<input type="radio" name="jk" value="pria" checked> Pria
									<input type="radio" name="jk" value="wanita"> Wanita
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Tanggal Lahir</label>
								<div class="col-md-6">
									<div class="input-group date" data-provide="datepicker">
									    <input type="text" id="date" name="tglLahir" class="form-control" value="">
									    <div class="input-group-addon">
									        <span class="glyphicon glyphicon-calendar"></span>
									    </div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Email</label>
								<div class="col-md-6">
									<input type="email" id="email" name="email" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-3">Foto</label>
							<div class="col-md-6">
								<img src="" width="204" height="136">
								<input  name="file" class="form-control" type="file" accept=".jpg, .jpeg, .png, .gif, .bmp"onchange="readURL(this)"/>
							</div>
							</div>
							<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<input type="submit" class="btn btn-primary" name="submit" value="Save">
								<input type='submit' name="cancel" class="btn btn-warning" value="Cancel"/>
								<input type='hidden' name='id' value="<?php if($_GET) { echo $data['kode']; } ?>"/>
							</div>
						</div>
						</form>
					</div>
        	</div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/jquery-1.12.4.js"></script>
  	<script src="js/jquery-ui.js"></script>
</body>
</html>