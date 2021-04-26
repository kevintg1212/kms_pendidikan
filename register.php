<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KMS Layanan Pendidikan</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dist/img/favicon.png">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-collapse" style="padding-left: 50px; padding-right: 50px; padding-top: 10px;">




	<div class="wrapper">
		<a href="index.php" style="font-size: 60px; color: black;">
			<</a> <!-- Content Wrapper. Contains page content -->
				<div class="" style="min-height: 100%; text-align: center;">
					<!-- Content Header (Page header) -->

					<!-- Main content -->
					<section class="content" style="height: 80%; margin: auto; width: 100%;">
						<div class="container-fluid" style="margin-top:50px;">
							<h2><b>Registrasi Admin Layanan Pendidikan ABK</b></h2><br>
							<div class="row">
								<div class="card" style="width: 50%; margin: auto; padding: 20px; padding-top: 50px;">
									<div class="card-body row">

										<div class="col-md-4" style="text-align: left;">
											<label>NIK</label>
										</div>
										<div class="col-md-8">
											<input type="text" style="width: 80%;" name="nik">
										</div>

										<div class="col-md-4" style="text-align: left; margin-top: 20px;">
											<label>Nama Lengkap</label>
										</div>
										<div class="col-md-8" style="margin-top: 20px;">
											<input type="text" style="width: 80%;" name="nama">
										</div>

										<div class="col-md-4" style="text-align: left; margin-top: 20px;">
											<label>Jenis Kelamin</label>
										</div>
										<div class="col-md-8 row" style="margin-top: 20px; padding-left: 30px;">
											<div class="col-3">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="jenis"
														id="jenis1">
													<label class="form-check-label" for="jenis1">Pria</label>
												</div>
											</div>
											<div class="col-3">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="jenis"
														id="jenis2">
													<label class="form-check-label" for="jenis2">Wanita</label>
												</div>
											</div>
										</div>

										<div class="col-md-4" style="text-align: left; margin-top: 20px;">
											<label>Email</label>
										</div>
										<div class="col-md-8" style="margin-top: 20px;">
											<input type="email" style="width: 80%;" name="nama">
										</div>


										<div class="col-md-4" style="text-align: left; margin-top: 20px;">
											<label>Password</label>
										</div>
										<div class="col-md-8">
											<input type="password" name="password"
												style="width: 80%; margin-top: 20px;">
										</div>

									</div>
									<div class="card-footer"
										style="background-color: white; text-align: center; padding-top: 50px; padding-bottom: 50px;">
										<p>Sudah memiliki akun? <a href="login.php">Login</a></p>
										<a href="admin_sekolah/index.php"
											style="color: white; width: 150px; background-color: #1D2948; margin: auto;"
											class="btn btn-primary btn-sm nav-link">Register</a>
									</div>

									<!-- /.card-body -->
								</div>
								<!-- /.card -->
							</div>
						</div>
					</section>
					<!-- /.content -->
				</div>


				<!-- Control Sidebar -->
				<aside class="control-sidebar control-sidebar-dark">
					<!-- Control sidebar content goes here -->
				</aside>
				<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->


	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<script>



	</script>

</body>

</html>