<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include_once 'view/header.php'; ?>

	<title>Kamar</title>
</head>
<body>

<div class="container-xxl flex-grow-1 mt-3">
  	<div class="row mx-0">
        <div class="card">
            <div class="card-body row pt-2 pb-0">
                <div class="col-md-4">
                  	<h5 class="display-6 mt-1 text-primary fw-bold">SanHouse</h5>
                </div>
                <div class="col-md-8 text-end mt-2">
                    <a href="index.php" class="mx-3">Home</a>
                   	<a href="kamar.php" class="mx-3">Kamar</a>
                    <a href="reservasi.php" class="mx-3">Reservasi</a>
                </div>
            </div>
        </div>
   	</div>
</div>

	<div class="container-xxl py-5 align-items-center">
		<div class="card p-5">
			<div class="card-body row">
				<h1 class="display-5 fw-bold text-center text-primary">Tipe Kamar di SanHouse</h1>
				<p class="lead text-center">Berikut ini tipe kamar dan fasilitas yang tersedia di hotel kami</p>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php 
				include_once 'koneksi.php';

				$query = mysqli_query($koneksi, "SELECT * FROM kamar");
				while($kamar = mysqli_fetch_assoc($query)) :
			?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="text-primary card-title"><?php echo $kamar['tipe_kamar']; ?></h4>
						<p class="lead"><?php echo $kamar['fasilitas_kamar']; ?></p>
						<a href="reservasi.php" class="btn btn-primary">Reservasi</a>
					</div>
				</div>
			</div>

			<?php endwhile; ?>
		</div>
	</div>

	<footer class="p-5 mt-5" style="background: #4b4b4b;">
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                    <small class="d-block mb-3 text-white ">&copy; SanHouse 2022</small>
                </div>
                <div class="col-md-6">
                    <h5 style="color: #859BFE;">Halaman</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="index.php">Home</a></li>
                        <li><a class="text-white" href="kamar.php">Kamar</a></li>
                        <li><a class="text-white" href="reservasi.php">Reservasi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

<?php include_once 'view/footer.php'; ?>
</body>
</html>