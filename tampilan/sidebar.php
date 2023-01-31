<?php
// menghubungkan php dengan koneksi database
include "koneksi.php";
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:index.php?pesan=belummasuk");
}
?>

<?php
if ($_SESSION['level'] == "petugas_ipl") {
?>

  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
                Halo Selamat Datang Pak/Ibu, <b>
                        <?php 
                        // $username =$_SESSION['username'];
                        // $query = "SELECT * FROM petugas WHERE nama_petugas = $username";
                        // $result = mysqli_query($koneksi, $query);
                        // $hasil = mysqli_fetch_assoc($result);
                        // echo $hasil;
                          echo $_SESSION['username'];
                          echo $_SESSION['id_petugas'];
                        ?>
                        
                  </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a>Aplikasi IPL</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a>IPL</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li>
                <a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Data</li>
              <li><a class="nav-link" href="unit.php"><i class="fas fa-database"></i> <span>DATA UNIT</span></a></li>
              <li class="menu-header">Personal</li>
              <li><a class="nav-link" href="petugas.php"><i class="fas fa-user-edit"></i> <span>PENGGUNA</span></a></li>
              <li><a class="nav-link" href="warga.php"><i class="fas fa-user-graduate"></i> <span>WARGA</span></a></li>
              <li class="menu-header">Fitur</li>
              <li><a class="nav-link" href="transaksi1.php"><i class="fas fa-money-check-alt"></i> <span>TRANSAKSI PEMBAYARAN</span></a></li>
              <li><a class="nav-link" href="laporan.php"><i class="fas fa-book"></i> <span>LAPORAN</span></a></li>
              <li><a class="nav-link" href="suratjalan.php"><i class="fas fa-book"></i> <span>Surat Jalan</span></a></li>
          </aside>
        </div>
      <?php
    } else if ($_SESSION['level'] == "dirut") {

      ?>


        <body>
          <div id="app">
            <div class="main-wrapper">
              <div class="navbar-bg"></div>
              <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                  <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                  </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                      <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
                      Halo Selamat Datang Pak/Ibu, <b>
                      <?php 
                          echo $_SESSION['username'];
                        ?>
                        </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-divider"></div>
                      <a href="logout.php" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
              <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                    <a>Aplikasi IPL</a>
                  </div>
                  <div class="sidebar-brand sidebar-brand-sm">
                    <a>IPL</a>
                  </div>
                  <ul class="sidebar-menu">
                    <ul class="sidebar-menu">
                      <li class="menu-header">Dashboard</li>
                      <li>
                        <a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                      </li>
                      <li class="menu-header">Fitur</li>
                      <li><a class="nav-link" href="laporan.php"><i class="fas fa-book"></i> <span>LAPORAN</span></a></li>
                </aside>
              </div>

            <?php
          } else if ($_SESSION['level'] == "warga") {
            ?>

              <body>
                <div id="app">
                  <div class="main-wrapper">
                    <div class="navbar-bg"></div>
                    <nav class="navbar navbar-expand-lg main-navbar">
                      <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        </ul>
                      </form>
                      <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            Halo Selamat Datang Pak/Ibu, <b><?php echo $_SESSION['username']; ?></a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item has-icon text-danger">
                              <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                          </div>
                        </li>
                      </ul>
                    </nav>
                    <div class="main-sidebar">
                      <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                          <a>Aplikasi IPL</a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                          <a>IPL</a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Dashboard</li>
                            <li>
                                <a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                             </li>
                            <li class="menu-header">Fitur</li>
                            <li>
                                <a class="nav-link" href="history.php"><i class="fas fa-fire"></i> <span>HISTORY PEMBAYARAN</span></a>
                            </li>
                      </aside>
                    </div>
                  <?php
                } else {
                  header("location:index.php?pesan=gagal");
                }
