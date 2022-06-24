<?php
session_start(); 
if (isset($_SESSION['username']) === FALSE) {
  header("Location: login.php");
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

    <title>Dashboard</title>

    
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
                    <h5 class="card-title text-primary">iksan fauzi</h5>
                    <p class="lead mb-0"><?php echo waktu(); ?></p>

                    <!-- Alert -->
                    <div class="alert alert-primary alert-dismissible mt-3" role="alert">
                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Hallo <?php echo $_SESSION['username']; ?></h6>
                        <p class="mb-0">Anda berhasil login sebagai <strong><?php echo $_SESSION['level']; ?></strong></p>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>

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
