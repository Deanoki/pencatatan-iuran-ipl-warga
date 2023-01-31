<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
  <title>TRANSAKSI</title>

</head>

<body>

  <?php

  include('tampilan/header.php');
  include('tampilan/footer.php');
  include('tampilan/sidebar.php');
  ?>

  <!-- main content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>TRANSAKSI</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item text-primary">Transaksi</div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12 row-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>History Pembayaran</h4>
              <div class="card-header-form">
                <form action="proses_transaksi.php" method="post">
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">id Petugas</span>
              </div>
              <input type="text" name="id_petugas" class="form-control">
              <?php
                echo $_SESSION['id_petugas'];
              ?>
                        
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">NIK</span>
              </div>
              <select type="text" name="nik" class="form-control">
                        <option value="not_option">
                            Silahkan Pilih NIK
                        </option>
                        <?php
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                            $query = "SELECT * FROM warga ORDER BY nik ASC";
                            $result = mysqli_query($koneksi,$query);
                            //mengecek apakah ada error ketika menjalankan query
                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi) .
                                  " - " . mysqli_error($koneksi));
                              }

                                //buat perulangan untuk element tabel dari data mahasiswa
                                $no = 1; //variabel untuk membuat nomor urut
                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                // kemudian dicetak dengan perulangan while
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['nik'];?>">
                            <?php
                            echo $row['nik'];
                            ?>
                        </option>
                        <?php
                            $no++;  //untuk nomor urut terus bertambah 1
                                }
                        ?>      
                        ?>
                    </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Id Unit</span>
              </div>
              <select type="text" name="id_unit" class="form-control">
                        <option value="not_option">
                            Silahkan Pilih unit
                        </option>
                        <?php
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                            $query = "SELECT * FROM unit ORDER BY id_unit ASC";
                            $result = mysqli_query($koneksi,$query);
                            //mengecek apakah ada error ketika menjalankan query
                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi) .
                                  " - " . mysqli_error($koneksi));
                              }

                                //buat perulangan untuk element tabel dari data mahasiswa
                                $no = 1; //variabel untuk membuat nomor urut
                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                // kemudian dicetak dengan perulangan while
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['id_unit'];?>">
                            <?php
                            echo $row['id_unit'];
                            ?>
                        </option>
                        <?php
                            $no++;  //untuk nomor urut terus bertambah 1
                                }
                        ?>      
                        ?>
                    </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Tanggal Bayar</span>
              </div>
              <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar" aria-label="tanggal" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Bulan Bayar</label>
              </div>
              <select class="custom-select" name="bulan_dibayar" id="inputGroupSelect01">
                <option selected>--pilih bulan--</option>
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="januari">April</option>
                <option value="februari">Mei</option>
                <option value="maret">Juni</option>
                <option value="januari">Juli</option>
                <option value="februari">Agustus</option>
                <option value="maret">September</option>
                <option value="januari">oktober</option>
                <option value="februari">november</option>
                <option value="maret">desember</option>
              </select>
            </div>
            
            

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Jumlah</span>
              </div>
              <select class="custom-select" name="biaya" id="inputGroupSelect01">
              <option selected>-- Pilih Nominal --</option>
              <option value="50000">50.000</option>
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Keterangan</label>
              </div>
              <select class="custom-select" name="ket" id="inputGroupSelect01">
                <option selected>-- Keterangan --</option>
                <option value="lunas">Lunas</option>
                <option value="belum_lunas">Belum Lunas</option>
              </select>
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Bayar</button>


              </form>
            </div>







            <br />




            <form action="" method="get">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Transaksi Warga</h4>
                        <div class="card-header-form">
                    </div>
                </div>
              <table class="table">
                <tr>
                  <td>NIK</td>
                  <td>:</td>
                  <td>
                    <input class="form-control" type="text" name="nik" placeholder="--Data NIK Lihat Di Form Warga--">
                  </td>
                  <td>
                    <button class="btn btn-success" type="submit" name="cari">Cari</button>
                  </td>
                </tr>

              </table>
            </form>
            <?php
            if (isset($_GET['nik']) && $_GET['nik'] != '') {
              $query = mysqli_query($koneksi, "SELECT warga. *,unit. * FROM warga,unit WHERE warga.id_unit = unit.id_unit And nik='$_GET[nik]'");
              $data = mysqli_fetch_array($query);
              $nik = $data['nik'];

            ?>

              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Warga</h4>
                        <div class="card-header-form">
                    </div>
                </div>
              <table class="table table-striped ">
                <thead>
                  <tr>
                      <th scope="col">NIK</th>
                      <th scope="col">NAMA WARGA</th>
                      <th scope="col">NAMA BLOCK</th>
                      <th scope="col">NO UNIT</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nama_block']; ?></td>
                        <td><?php echo $data['nama_unit']; ?></td> 
                    </tr>  
                </tbody>
              </table>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data IPL Warga</h4>
                        <div class="card-header-form">
                    </div>
                </div>
              <table class="table table-striped ">
                <thead>
                    <tr>
                        <!-- <th scope="col">Id Pembayaran</th> -->
                        <th scope="col">id petugas</th>
                        <th scope="col"> Tanggal Bayar</th>
                        <th scope="col">Bulan Bayar</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Keterangan</th>                
                    </tr>
                </thead>

                <tbody>
                <?php 
                $query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE nik='$data[nik]' ORDER BY bulan_dibayar ASC");

                /*
                    $query = mysqli_query($koneksi,"SELECT pembayaran. *,warga. *,unit. *,petugas. * FROM pembayaran,warga,unit,petugas WHERE pembayaran.nik = warga.nik AND pembayaran.id_unit = unit.id_unit AND pembayaran.id_petugas = petugas.id_petugas  AND nik='$data[nik]' ORDER BY bulan_dibayar ASC");
                */

                    while ($data=mysqli_fetch_array($query)) {
                        echo" 
                        <tr>                          
                          <td>$data[id_petugas]</td>
                          <td>$data[tgl_bayar]</td>
                          <td>$data[bulan_dibayar]</td>
                          <td>$data[biaya]</td>
                          <td>$data[ket]</td>
                        </tr>";
                  }
                ?>

                </tbody>

              </table>

            <?php
            }
            ?>

          </div>
</body>

</html>