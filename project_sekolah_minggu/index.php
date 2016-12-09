<?php 
	include('koneksi.php');
	session_start();

	if (isset($_POST['login'])) {
		$kode 	= $_POST['kode'];
		$pass 	= $_POST['password'];
		$query 	= "SELECT * FROM tuser WHERE kd_user='$kode' and password='$pass'";
		$result = mysqli_query($koneksi, $query);
		$row 	= mysqli_fetch_array($result);
		$count	= mysqli_num_rows($result);
		
		if($count>0){
			$_SESSION['user_id'] = $kode;
			header('location: home.php');	
		} else {
			$message = " Username or password incorrect";
		}
	}
 ?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/dashboard.css">
		</head>
	<body>
	
		<div class="container-fluid">
		
      	<div class="col-sm-4 col-sm-offset-4 main">
      		<div class="panel panel-default">
			  <div class="panel-heading">Login</div>
			  <div class="panel-body">
			    <form action="index.php" method="POST" enctype="multipart/form-data">
        			<?php
						if (isset($message)) 
							echo 
							'<div class="alert alert-danger">
								<strong>Seems like</strong>'.$message.'
							</div>';
					?>
					<div class="form-group">
					    <label for="kode">Kode:</label>
					    <input type="kode" name="kode" class="form-control" id="kode">
					</div>
				  	<div class="form-group">
					    <label for="pwd">Password:</label>
					    <input type="password" name="password" class="form-control" id="pwd">
				  	</div>
				  	<button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
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