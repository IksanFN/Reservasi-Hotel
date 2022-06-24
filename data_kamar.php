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

    <title>Data Kamar</title>

    
  </head>

  <body>
    <!-- Layo[ut wrapper -->
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
                    <h5 class="card-title text-primary">Data Kamar</h5>
                    <p class="lead mb-0"><?php echo waktu(); ?></p>
                  </div>
                </div>
              </div>
              <div class="row mx-0 my-3">
            		<div class="card">
            			<div class="card-body">
            				
            				
            				<a href="tambah_kamar.php?kamar=active" class="btn btn-sm btn-primary mb-4"><i class="fa-solid fa-plus"></i> Tambah Data</a>

            				<?php 
            					$edit = isset($_GET['edit']) ? $_GET['edit'] : false;
            					$hapus = isset($_GET['hapus']) ? $_GET['hapus'] : false;
            					$tambah = isset($_GET['tambah']) ? $_GET['tambah'] : false;

            					if ($edit == 'berhasil') {
            						echo '<div class="alert alert-success alert-dismissible" role="alert">
			          						<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Sukses!!</h6>
			          						<p class="mb-0">Data berhasil di edit!</p>
			          			  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          						</button>
			        			  		</div>';
            					}elseif ($edit == 'gagal') {
            						echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          						<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          						<p class="mb-0">Data gagal di edit!</p>
			          			  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          						</button>
			        			  		</div>';
            					}elseif($hapus == 'berhasil'){
            						echo '<div class="alert alert-success alert-dismissible" role="alert">
			          						<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Sukses!!</h6>
			          						<p class="mb-0">Data berhasil dihapus!</p>
			          			  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          						</button>
			        			  		</div>';
            					}elseif ($hapus == 'gagal') {
            						echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          						<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          						<p class="mb-0">Data gagal dihapus!!</p>
			          			  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          						</button>
			        			  		</div>';
            					}elseif($tambah == 'berhasil'){
            						echo '<div class="alert alert-success alert-dismissible" role="alert">
			          						<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Sukses!!</h6>
			          						<p class="mb-0">Data berhasil ditambahkan!</p>
			          			  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          						</button>
			        			  		</div>';
            					}elseif ($tambah == 'gagal') {
            						echo '<div class="alert alert-danger alert-dismissible" role="alert">
			          						<h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
			          						<p class="mb-0">Data gagal ditambahkan!!</p>
			          			  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			          						</button>
			        			  		</div>';
            					}
            				?>
            				

            				<table class="table table-stripped">
            					<thead>
            						<tr>
            							<th>ID Kamar</th>
            							<th>Tipe Kamar</th>
            							<th>Fasilitas Kamar</th>
            							<th>Jumlah Kamar</th>
            							<th style="min-width: 175px;" class="text-center">Aksi</th>
            						</tr>
            					</thead>
            					<?php 
            						include_once 'koneksi.php';

            						$query = mysqli_query($koneksi, "SELECT * FROM kamar");
            						while ($kamar = mysqli_fetch_assoc($query)) :
            					?>
            					<tbody>
            						<tr>
            							<td><?php echo $kamar['id_kamar']; ?></td>
            							<td><?php echo $kamar['tipe_kamar']; ?></td>
            							<td><?php echo $kamar['fasilitas_kamar']; ?></td>
            							<td><?php echo $kamar['jumlah_kamar']; ?></td>
            							<td class="text-center">
            								<a href="edit_kamar.php?id_kamar=<?php echo $kamar['id_kamar'] ?>&kamar=active" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            								<a href="proses_hapus_kamar.php?id_kamar=<?php echo $kamar['id_kamar'] ?>&kamar=active" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?')"><i class="fa-solid fa-trash-can"></i></a>
            							</td>
            						</tr>	
            					</tbody>
            					<?php endwhile; ?>
            				</table>

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
