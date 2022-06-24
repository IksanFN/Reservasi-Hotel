<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - SanHouse</title>
	<?php include_once 'view/header.php'; ?>
</head>
<body>

	<div class="container m-5">

		<h3 class="mb-2 text-center">Selamat Datang di SanHouse</h3>

		<div class="row justify-content-center">
			<div class="card m-5" style="width: 25rem;">
				<div class="card-body">

					<div class="mb-4 text-center">
						<h3 class="fw-bold app-brand-text">Register</h3>
					</div>

					<?php 
						$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : false;

						if ($pesan == 'username_sudah_ada') {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          				<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          				<p class="mb-0">Username sudah terdaftar, silahkan masukkan username yang lain.</p>
			          			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          				</button>
			        			  </div>';
						}elseif ($pesan == 'register_gagal') {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          				<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          				<p class="mb-0">Terjadi kesalahan, gagal melakukan register!.</p>
			          			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          				</button>
			        			  </div>';
						}
					?>
					
					<form id="formAuthentication" class="mb-3" action="proses_register.php" method="post">
						<div class="mb-4">
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
						<div class="mb-4">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>

						<p class="lead text-center">Pilih level</p>

						<div class="mb-4">
							<select name="level" class="form-control">
								<option value="admin">Admin</option>
								<option value="resepsionis">Resepsionis</option>
							</select>
						</div>

						<div class="mb-4 row mx-0">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
						<p class="lead text-center">Sudah punya akun? <a href="login.php">Login</a></p>
					</form>

				</div>
			</div>
		</div>
	</div>
<?php include_once 'view/footer.php'; ?>
</body>
</html>