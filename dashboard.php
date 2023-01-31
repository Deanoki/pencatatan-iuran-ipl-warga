<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

include('tampilan/header.php');
include('tampilan/sidebar.php');
include('tampilan/footer.php');
?>


<!-- Main Content -->
<div class="main-content bg-primary">
  <section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Data Warga -
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT *FROM warga");
                    $res = mysqli_num_rows($query);

                    echo $res;
                  ?>
                </div>
                <div class="card-stats-item-label">Penduduk</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">
                <?php 
                    $query = mysqli_query($koneksi, "SELECT *FROM pembayaran WHERE id_pembayaran");
                    $res = mysqli_num_rows($query);

                    echo $res;
                  ?>
                </div>
                <div class="card-stats-item-label">Total Transaksi</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT *FROM pembayaran WHERE biaya");
                    $res = mysqli_num_rows($query);

                    echo $res;
                  ?>
                </div>
                <div class="card-stats-item-label">Lunas</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-info bg-primary">
            <i class="fas fa-users"></i>

  </section>
</div>
</div>
</div>
</body>