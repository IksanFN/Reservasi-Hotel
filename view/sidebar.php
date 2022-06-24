<!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">SanHouse</span>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <?php $dashboard = isset($_GET['dashboard']) ? $_GET['dashboard'] : false; ?>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo $dashboard; ?>">
              <a href="dashboard.php?dashboard=active" class="menu-link">
                <i class="menu-icon fa-solid fa-gauge-high"></i> 
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <?php 
              $kamar = isset($_GET['kamar']) ? $_GET['kamar'] : false;
              $fasilitas_hotel = isset($_GET['fasilitas_hotel']) ? $_GET['fasilitas_hotel'] : false;
              $reservasi = isset($_GET['reservasi']) ? $_GET['reservasi'] : false;
            ?>

            <?php if($_SESSION['level'] == 'admin') : ?>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menu Admin</span>
            </li>
            <li class="menu-item <?php echo $kamar; ?>">
              <a href="data_kamar.php?kamar=active" class="menu-link">
                <i class="menu-icon fa-solid fa-bed"></i>
                <div data-i18n="Account Settings">Data Kamar</div>
              </a>
            </li>
            <li class="menu-item <?php echo $fasilitas_hotel; ?>">
              <a href="data_fasilitas_hotel.php?fasilitas_hotel=active" class="menu-link">
                <i class="menu-icon fa-solid fa-hotel"></i>
                <div>Data Fasilitas Hotel</div>
              </a>
            </li>
            <?php elseif($_SESSION['level'] == 'resepsionis'): ?>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menu Resepsionis</span>
            </li>
            <li class="menu-item <?php echo $reservasi; ?>">
              <a href="data_reservasi.php?reservasi=active" class="menu-link">
                <i class="menu-icon fa-solid fa-folder"></i>
                <div data-i18n="Account Settings">Data Reservasi</div>
              </a>
            </li>
          <?php endif; ?>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
               
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/avatar.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/avatar.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['username']; ?></span>
                            <small class="text-muted"><?php echo $_SESSION['level'] ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->