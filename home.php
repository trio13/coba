<?php 
	include('koneksi.php');
	session_start();

	if ($_SESSION['user_id'] != '') {
		$query 	 = "select * from tuser where kd_user = '".$_SESSION['user_id']."'";
		$profile = mysqli_fetch_array(mysqli_query($koneksi, $query));

		if(isset($_POST['submit'])){
			$query="SELECT kd_materi as 'max' FROM tmateri;";
			$result	= mysqli_query($koneksi, $query);
			$result = mysqli_fetch_array($result);
			$kode 	= ($result[0]+1);
			$materi=$_POST['materi'];
			$tgl = date("Y-m-d");	
			$query = "insert into tmateri values('$kode', $tgl','$materi');";
		}
	} else {
		header('location: index.php');
	}
	
	if ($_GET) {
		$query 	= "SELECT kd_absen as 'max' FROM tabsen;";
		$result	= mysqli_query($koneksi, $query);
		$result = mysqli_fetch_array($result);
		$kode 	= ($result[0]+1);
		$query	= "select sm.*, kls.nama_kelas from tsm sm left join tkelas kls on kls.kd_kls = sm.kd_kelas where sm.kd_kelas = 1 and sm.kd_anak='".$_GET['kode']."'";
		$result2= mysqli_query($koneksi,$query);
		$result2= mysqli_fetch_array($result2);
		$tgl 	= date("Y-m-d");
		$kd_anak= $result2['kd_anak'];
		$kd_guru= $_SESSION['user_id'];
		$kd_kls	= $result2['kd_kelas'];
		$query 	= "INSERT INTO tabsen VALUES ('$kode','$tgl','$kd_anak','$kd_kls','$kd_guru')";
		mysqli_query($koneksi, $query);
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
			<a class="navbar-brand" href="home.php" style="color:black">Sekolah Minggu</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="profile.php?kode=<?php echo $profile['kd_user']; ?>"> Profiles: <?php echo $profile['nama_user']; ?></a></li>
			<li><a href="home.php?logout=true"> Logout</a></li>
	    </ul>
	  </div>
	</nav>
	<div class="container-fluid">
		<div class="row">
	        <div class="col-sm-3 col-md-2 sidebar">
	          <ul class="nav nav-sidebar"> 
				<?php
					echo
					'<li class="active"><a href="home.php">Absen</a></li>';
					if ($profile['status'] == 'admin') {
	          			echo 
	          			'<li><a href="insert.php">Insert</a></li>
	          			<li><a href="update.php">Update</a></li>
						<li><a href="register.php">Register</a></li>';
	          		}
					else{
					}
				?>
	          </ul>

	        </div>
      	</div>
      	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Absen</h1>
            <div class="row">
				<?php
					if($profile['status']=='admin'){
						$query = "select abs.*, kls.nama_kelas, sm.nama, user.nama_user from tabsen abs
								  left join tkelas kls on kls.kd_kls = abs.kd_kls
								  left join tsm sm on sm.kd_anak = abs.kd_anak
								  left join tuser user on user.kd_user = abs.kd_guru order by tgl";
						$result = mysqli_query($koneksi, $query);
						while($data=mysqli_fetch_array($result)){
							echo
							'<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-3">
										'.$data['nama'].'
									</div>
									<div class="col-sm-2">
										'.$data['nama_kelas'].'
									</div>
									<div class="col-sm-2">
										'.$data['nama_user'].'
									</div>
									<div class="col-sm-3">
										'.$data['tgl'].'
									</div>
								</div>
							</div>';
						}
					}
					else{
						$count=0;
						if($profile['kd_kelas']=='1'){
							$query = "select sm.*, kls.nama_kelas from tsm sm
									  left join tkelas kls on kls.kd_kls = sm.kd_kelas where sm.kd_kelas = 1";
							$result = mysqli_query($koneksi, $query);
							$result2 = mysqli_query($koneksi, $query);
							$row	= mysqli_num_rows($result);
							$divisionToArray = array();
							  while ($rew = mysqli_fetch_array($result2)) {
							    $divisionToArray[] = $rew;
							  }
							$index = 0;
							echo '<form class="form-horizontal" role="form" enctype="multipart/form-data" id="save" onsubmit="myFunction()">';
							while($data=mysqli_fetch_array($result)){
								$index += 1;
								echo
								'<div class="row">
									<div class="col-sm-12">
										<div class="col-sm-3">
											<img src="'.$data['foto'].'" alt="'.$data['foto'].'" style="width: 100px; height: 100px; margin: 0 auto">
										</div>
										<div class="col-sm-2">
											'.$data['nama'].'
										</div>
										<div class="col-sm-2">
											'.$data['nama_kelas'].'
										</div>
										<div class="col-sm-3">
											'.date("Y-m-d") .'
										</div>
										<div class="col-sm-2">
										<div class="action" >
										<input type="checkbox" id="check'.$index.'">
										<input type="hidden" id="kd'.$index.'" value="'.$data['kd_anak'].'">
											<a href="home.php?kode='.$data['kd_anak'].'" class="btn btn-success btn-md" id="cl">Absen</a>
										</div>
										</div>
									</div>
								</div><br>';

							}
							echo'
							<div class="row">
								<div class="col-sm-offset-3 ">
									<textarea cols="50" rows="10" id="materi" name="materi"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-offset-4 col-sm-3">
									<input type="submit" class="btn btn-primary" name="submit" value="Save">
								</div>
							</div>
							</form>';
						}
						else if($profile['kd_kelas']=='2'){
							$count=0;
							$query = "select sm.*, kls.nama_kelas from tsm sm
									  left join tkelas kls on kls.kd_kls = sm.kd_kelas where sm.kd_kelas = 2";
							$result = mysqli_query($koneksi, $query);
							$row	= mysqli_num_rows($result);
							while($data=mysqli_fetch_array($result)){
								echo
								'<div class="row">
									<div class="col-sm-12">
										<div class="col-sm-3">
											<img src="'.$data['foto'].'" alt="'.$data['foto'].'" style="width: 100px; height: 100px; margin: 0 auto">
										</div>
										<div class="col-sm-2">
											'.$data['nama'].'
										</div>
										<div class="col-sm-2">
											'.$data['nama_kelas'].'
										</div>
										<div class="col-sm-3">
											'.date("Y-m-d") .'
										</div>
										<div class="col-sm-2">
											<input type="submit" value="Absen" name="Absen">
										</div>
									</div>
								</div><br>';
							}
							if (isset($_POST['Absen'])) {
									$query 	= "SELECT MAX(CAST(SUBSTR(kd_absen, 6) as UNSIGNED)) as 'max' FROM tabsen;";
									$result	= mysqli_query($koneksi, $query);
									$result = mysqli_fetch_array($result);
									$kode 	= ($result[0]+1);
									$tgl 	= date("Y-m-d");
									$kd_anak= $data['kd_anak'];
									$kd_guru= $profile['kd_user'];
									$query 	= "INSERT INTO tabsen VALUES ('$kode','$tgl','$kd_anak',2,'$kd_guru')";
									$result = mysqli_query($koneksi, $query);
								}
						}
						else{
							$count=0;
							$query = "select sm.*, kls.nama_kelas from tsm sm
									  left join tkelas kls on kls.kd_kls = sm.kd_kelas where sm.kd_kelas = 3";
							$result = mysqli_query($koneksi, $query);
							$row	= mysqli_num_rows($result);
							while($data=mysqli_fetch_array($result)){
								echo
								'<div class="row">
									<div class="col-sm-12">
										<div class="col-sm-3">
											<img src="'.$data['foto'].'" alt="'.$data['foto'].'" style="width: 100px; height: 100px; margin: 0 auto">
										</div>
										<div class="col-sm-2">
											'.$data['nama'].'
										</div>
										<div class="col-sm-2">
											'.$data['nama_kelas'].'
										</div>
										<div class="col-sm-3">
											'.date("Y-m-d") .'
										</div>
										<div class="col-sm-2">
											<input type="submit" value="Absen" name="Absen">
										</div>
									</div>
								</div><br>';
							}
							if (isset($_POST['Absen'])) {
									$query 	= "SELECT MAX(CAST(SUBSTR(kd_absen, 6) as UNSIGNED)) as 'max' FROM tabsen;";
									$result = mysqli_fetch_array(mysqli_query($koneksi, $query));
									$kode 	= ($result[0]+1);
									$tgl 	= date("Y-m-d");
									$kd_anak= $data['kd_anak'];
									$kd_guru= $profile['kd_user'];
									$query 	= "INSERT INTO tabsen VALUES ('$kode','$tgl','$kd_anak',3,'$kd_guru')";
									$result = mysqli_query($koneksi, $query);
								}
						}
					}
				?>
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

  	<script type="text/javascript">
  		function myFunction() {
		debugger;
		    var data = <?php echo json_encode($divisionToArray) ?>;
		    var check = new Array();
		    var kode = new Array();
		    for (var i = 1; i <= data.length; i++) {
		    	if (document.getElementById('check'+i).checked) {
					check[i] = document.getElementById('check'+i).id;
					kode[i] = document.getElementById('kd'+i).value;

					 $.ajax({
				        url: 'absen.php',
				        type: 'POST',
				        data: {
				        'kode': kode[i],
				        },
				       success:function(result)//we got the response
				       {
				        alert('Successfully called');
				       },
				       error:function(exception){alert('Exeption:'+exception);}
				    });
		    	}
		    	
		    }

		}  		
  	</script>


</body>
</html>