<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include_once 'view/header.php'; ?>

	<title>Reservasi</title>
</head>
<body>

	<!-- ==== Navbar ==== -->
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

	<!-- ==== Jumbotron ==== -->
	<div class="container-xxl py-5 align-items-center">
		<div class="card p-5">
			<div class="card-body row">
				<h1 class="display-5 fw-bold text-center text-primary">Tipe Kamar di SanHouse</h1>
				<p class="lead text-center">Sudah melakukan reservasi sebelumnya? Cek reservasi melalui form dibawah ini</p>

				<form action="" method="get" class="d-flex col-md-8 justify-content-center mx-auto">
						<input type="search" class="form-control mx-1" name="keyword" placeholder="Cari berdasarkan nama, email, no_handphone">
						<button class="btn btn-primary mx-1" type="submit"><i class="fa-solid fa-magnifying-glass px-3"></i></button>
				</form>

			</div>
		</div>
	</div>

	<?php
        include 'koneksi.php';
        if(isset($_GET['keyword'])) :
            $keyword = $_GET['keyword'];

        $cari = mysqli_query($koneksi, "SELECT *, reservasi.jumlah_kamar AS jumlah_kamar_yang_dipesan FROM reservasi INNER JOIN 
        kamar ON reservasi.id_kamar = kamar.id_kamar WHERE nama_tamu = '$keyword' OR email = '$keyword' OR no_handphone = '$keyword'");
        if(mysqli_num_rows($cari) === 1):
        ?>

    <!-- Tabel Hasil Pencarian -->
     <div class="my-2 container-xxl">
            <p class="text-center">Kata kunci yang dimasukkan <b class="text-primary"><?php echo $keyword; ?></b></p>
            <div class="card">
              <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ID Reservasi</th>
                            <th>Nama Tamu</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Tanggal Checkin</th>
                            <th>Tanggal Checkout</th>
                            <th>Tipe Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                        while($hasil = mysqli_fetch_assoc($cari)):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $hasil['id_reservasi']; ?></td>
                            <td><?php echo $hasil['nama_tamu']; ?></td>
                            <td><?php echo $hasil['email']; ?></td>
                            <td><?php echo $hasil['no_handphone']; ?></td>
                            <td><?php echo $hasil['tanggal_cek_in']; ?></td>
                            <td><?php echo $hasil['tanggal_cek_out']; ?></td>
                            <td><?php echo $hasil['tipe_kamar']; ?></td>
                            <td><?php echo $hasil['jumlah_kamar_yang_dipesan']; ?></td>
                            <td><?php echo $hasil['status']; ?></td>
                        </tr>
                    </tbody>
                        <?php endwhile; ?>
                </table>
              </div>
            </div>
        </div>
        <?php else: ?>
            <div class="mt-4">
                <p class=" text-center">Kata kunci yang dimasukkan <b><?php echo $keyword ?></b></p>
                <h5 class=" text-center">Maaf, data yang dimasukkan tidak ada</h5>
            </div>
        <?php endif; ?>

        <?php endif; ?>


    <div class="container mb-5 mt-3">
        <div class="row justify-content-center align-items-center">
            <div class="card mt-4 mb-3" style="width: 45rem;">
            <h1 class="mt-4 h2 text-center card-title text-primary">Form Reservasi</h1>
                <div class="card-body">
                <?php
                $form = isset($_GET['form']) ? $_GET['form'] : false;

                if ($form == 'kosong') {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          				<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          				<p class="mb-0">Anda harus melengkapi form dibawah ini untuk melakukan reservasi.</p>
			          			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          				</button>
			        			  </div>';
                    }
                ?>
                <form action="proses_reservasi.php" class="text-primary" method="post">
                    <div class="row mb-3 mx-3 pt-3">
                        <label for="nama" class="col-md-3 text-primary my-auto">Nama</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="nama_tamu" id="nama" placeholder="Masukkan nama anda">
                        </div>
                    </div>

                    <div class="row mb-3 mx-3">
                        <label for="email" class="col-md-3 text-primary">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="email" id="email" placeholder="Masukkan email anda">
                        </div>
                    </div>

                    <div class="row mb-3 mx-3">
                        <label for="nama" class="col-md-3 text-primary">No Handphone</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="no_handphone" id="no_handphone" placeholder="Masukkan no handphone anda">
                        </div>
                    </div>

                    <div class="row mb-3 mx-3">
                        <label for="tipe_kamar" class="col-md-3 text-primary">Tipe Kamar</label>
                        <div class="col-md-9">
                            <select name="id_kamar" class="form-control">
                                <?php
                                    include_once 'koneksi.php';

                                    $query = mysqli_query($koneksi, "SELECT * FROM kamar");
                                    while ($kamar = mysqli_fetch_assoc($query)) :
                                ?>
                                <option value="<?php echo $kamar['id_kamar']; ?>"><?php echo $kamar['tipe_kamar'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 mx-3">
                        <label for="tanggal_cek_in" class="col-md-3 text-primary">Tanggal Cek In</label>
                        <div class="col-md-9">
                            <input type="date" name="tanggal_cek_in" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3 mx-3">
                        <label for="tanggal_cek_out" class="col-md-3 text-primary">Tanggal Cek Out</label>
                        <div class="col-md-9">
                            <input type="date" name="tanggal_cek_out" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3 mx-3">
                        <label for="" class="col-md-3 text-primary">Jumlah Kamar</label>
                        <div class="col-md-9">
                            <input type="number" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar">
                        </div>
                    </div>
                    <div class="text-center pb-3">
                        <button type="submit" class="btn px-5 btn-primary">Reservasi</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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