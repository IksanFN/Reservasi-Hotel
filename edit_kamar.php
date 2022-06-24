<?php  ?>
<?php
session_start(); 
if (isset($_SESSION['username']) === FALSE) {
  	header("Location: login.php");
}elseif ($_SESSION['level'] == 'resepsionis') {
	header("Location: login.php?pesan=admin");
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

    <title>Edit Data Kamar</title>

    
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
                    <h5 class="card-title text-primary">Edit Data Kamar</h5>
                    <p class="lead mb-0"><?php echo waktu(); ?></p>
                  </div>
                </div>
              </div>
              <div class="row mx-0 my-3">
            		<div class="card">
            			<div class="card-body">

                    <?php 
                      include_once 'koneksi.php';
                      $id_kamar = $_GET['id_kamar'];
                      $query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar = '$id_kamar'");
                      $kamar = mysqli_fetch_assoc($query);
                    ?>
            				
            				<form action="proses_edit_kamar.php" method="post">
                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">ID Kamar</label>
                          <div class="col-md-9">
                            <input type="text" name="id_kamar" class="form-control" value="<?php echo $kamar['id_kamar']; ?>" readonly>
                          </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">Tipe Kamar</label>
                          <div class="col-md-9">
                            <input type="text" name="tipe_kamar" class="form-control" placeholder="Masukkan tipe kamar" value="<?php echo $kamar['tipe_kamar']; ?>">
                          </div>
                        </div>  

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">Fasilitas Kamar</label>
                          <div class="col-md-9">
                            <input type="text" name="fasilitas_kamar" class="form-control" placeholder="Masukkan Fasilitas Kamar" value="<?php echo $kamar['fasilitas_kamar']; ?>">
                          </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                          <label class="col-md-3">Jumlah Kamar</label>
                          <div class="col-md-9">
                            <input type="text" name="jumlah_kamar" class="form-control" placeholder="Masukkan jumlah kamar" value="<?php echo $kamar['jumlah_kamar']; ?>">
                          </div>
                        </div>

                        <div class="text-center">
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
