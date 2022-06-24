<?php  ?>
<?php
session_start(); 
if (isset($_SESSION['username']) === FALSE) {
  	header("Location: login.php");
}elseif ($_SESSION['level'] == 'admin') {
	header("Location: login.php?pesan=resepsionis");
}
include_once 'waktu.php';
?>
<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <?php include_once 'view/header.php'; ?>

    <title>Edit Data Reservasi</title>

    
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php include_once 'view/sidebar.php'; ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
          	
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row mx-0">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Edit Data Reservasi</h5>
                    <p class="lead mb-0"><?php echo waktu(); ?></p>
                  </div>
                </div>
              </div>
              <div class="row mx-0 my-3">
            		<div class="card">
            			<div class="card-body">

                    <?php 
                      include_once 'koneksi.php';

                      $id_reservasi = $_GET['id_reservasi'];
                      $query = mysqli_query($koneksi, "SELECT *, reservasi.jumlah_kamar AS jumlah_kamar_dipesan FROM reservasi INNER JOIN kamar ON reservasi.id_kamar = kamar.id_kamar WHERE id_reservasi = '$id_reservasi'");
                      $data_reservasi = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    ?>
            				
            				<form action="proses_edit_reservasi.php" method="post">
                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">ID Reservasi</label>
                          <div class="col-md-9">
                            <input type="text" name="id_reservasi" class="form-control" value="<?php echo $data_reservasi['id_reservasi']; ?>" readonly>
                          </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">Nama Tamu</label>
                          <div class="col-md-9">
                            <input type="text" name="nama_tamu" class="form-control" value="<?php echo $data_reservasi['nama_tamu']; ?>">
                          </div>
                        </div>  

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">No Handphone</label>
                          <div class="col-md-9">
                            <input type="text" name="no_handphone" class="form-control"  value="<?php echo $data_reservasi['no_handphone']; ?>">
                          </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">Tanggal Cek In</label>
                          <div class="col-md-9">
                            <input type="date" name="tanggal_cek_in" class="form-control"  value="<?php echo $data_reservasi['tanggal_cek_in']; ?>">
                          </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">Tanggal Cek Out</label>
                          <div class="col-md-9">
                            <input type="date" name="tanggal_cek_out" class="form-control"  value="<?php echo $data_reservasi['tanggal_cek_out']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 col-form-label">Tipe Kamar</label>
                              <div class="col-md-9">
                                  <select name="id_kamar" class="form-control">
                                    <?php
                                      include 'koneksi.php';

                                      $query = mysqli_query($koneksi, "SELECT * FROM kamar");
                                        while($reservasi = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
                                    ?>

                                        <option value="<?php echo $reservasi['id_kamar']; ?>" <?php if( $data_reservasi['id_kamar'] == $reservasi['id_kamar']): echo 'selected'; endif; ?> >
                                        <?php echo $reservasi['tipe_kamar']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                  </select>
                              </div>
                        </div>

                        <div class="text-center mt-3">
                          <button type="submit" class="btn btn-warning btn-sm px-5"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                        </div>
                    </form>

            			</div>
            		</div>
            	</div>
            </div>
            <!-- Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  &copy; SanHouse 2022
                </div>
              </div>
            </footer>
            <!-- Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include_once 'view/footer.php'; ?>
  </body>
</html>
