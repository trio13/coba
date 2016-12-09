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
	          		<li class="active"><a href="update.php">Update</a></li>
					<li><a href="register.php">Register</a></li>
	          </ul>
	        </div>
      	</div>
      	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Update Anak Sekolah Minggu</h1>
            <div class="row" style="margin-top:10px;">
				<div class="col-md-6 col-md-offset-3">
						<form action="" class="form-horizontal">
							<div class="form-group">
								<label for="" class="control-label col-md-3">Kode Anak</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="kode" name="kode" 
									value="">
								</div>
								<div class="col-md-2">
									<input type="submit" class="btn btn-primary" name="submit" value="Search">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3">Nama</label>
								<div class="col-md-6">
									<input type="text" id="nama" name="nama" class="form-control" value="">
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
								<label for="" class="control-label col-md-3">Alamat</label>
								<div class="col-md-6">
									<input type="text" id="alamat" name="alamat" class="form-control" value="">
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
							<label class="control-label col-md-3">Foto</label>
							<div class="col-md-6">
								<img src="" width="204" height="136">
								<input  name="file" class="form-control" type="file" accept=".jpg, .jpeg, .png, .gif, .bmp"onchange="readURL(this)"/>
							</div>
							</div>
							<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<input type="submit" class="btn btn-primary" name="submit" value="Save">
								<input type='submit' name="cancel" class="btn btn-warning" value="Cancel">
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