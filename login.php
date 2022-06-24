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
						<h3 class="fw-bold app-brand-text">Login</h3>
					</div>

					<?php 
						$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : false;

						if ($pesan == 'password_salah') {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          				<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          				<p class="mb-0">Password yang anda masukkan salah.</p>
			          			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          				</button>
			        			  </div>';
						}elseif ($pesan == 'username_tidak_ada') {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          				<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          				<p class="mb-0">Username yang anda masukkan tidak ada!</p>
			          			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          				</button>
			        			  </div>';
						}elseif ($pesan == 'register_berhasil') {
							echo '<div class="alert alert-success alert-dismissible" role="alert">
			          				<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Sukses!!</h6>
			          				<p class="mb-0">Anda berhasil register, silahkan login.</p>
			          			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          				</button>
			        			  </div>';
						}elseif ($pesan == 'resepsionis') {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
									<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
									<p class="mb-0">Anda harus login sebagai resepsionis</p>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
									</button>
								</div>';
						}elseif ($pesan == 'admin') {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
									<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
									<p class="mb-0">Anda harus login sebagai admin!</p>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
									</button>
								</div>';
						}
					?>
					
					<form id="formAuthentication" class="mb-3" action="proses_login.php" method="post">
						<div class="mb-4">
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
						<div class="mb-4">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<div class="mb-4 row mx-0">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<p class="lead text-center">Belum punya akun? <a href="register.php">Register</a></p>
					</form>

				</div>
			</div>
		</div>
	</div>

	<?php include_once 'view/footer.php'; ?>

</body>
</html>