<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include_once 'view/header.php'; ?>

	<title>Home</title>	
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
				<div class="col-md-8 my-auto">
                <h1 class="display-5 text-primary fw-bold" style="font-weight: 500;">SanHouse</h1>
                <p class="lead text-dark">Hotel terjangkau dengan fasilitas terbaik, berada di jangkauan seluruh kota besar. Ayo booking!</p>
                <a class="btn btn-primary text-white me-1" href="reservasi.php">Ayo reservasi sekarang</a>
                <a class="btn btn-outline-primary" href="kamar.php">Lihat tipe kamar dulu</a>
            </div>
            <div class="col-md-4">
                <img src="assets/img/Hotel.png" class="img-fluid rounded">
            </div>
			</div>
		</div>
	</div>

	<div class="container my-4">
		<h1 class="display-5 text-center text-dark">Fasilitas Hotel</h1>
		<div class="row">
			<?php 
				include_once 'koneksi.php';

				$query = mysqli_query($koneksi, "SELECT * FROM fasilitas_hotel");

				while( $fasilitas = mysqli_fetch_assoc($query) ) :
			?>

			<div class="col-md-4 mt-4">
				<div class="card" style="min-height: 390px; max-height: 390px !important;">
					<div class="card-body">
						<img src="assets/img/<?php echo $fasilitas['gambar']; ?>" class="img-fluid rounded" style="width: 100%; height: 15vw; object-fit: cover;">
						<h4 class="card-title mt-3 text-primary"><?php echo $fasilitas['nama_fasilitas_hotel']; ?></h4>
						<p class="lead"><?php echo $fasilitas['keterangan']; ?></p>
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