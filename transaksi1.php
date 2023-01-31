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
                <form action="proses_transaksi.php" method="post" >
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text ml-2 mr-2" id="basic-addon1">id Petugas</span>
              </div>
              <input type="text" name="id_petugas" value="
              <?php 
               // jalankan query untuk menampilkan semua data diurutkan berdasarkan
               $user = $_SESSION['username'];
               $query = "SELECT id_petugas FROM petugas where username = '$user'";
               $result = mysqli_query($koneksi,$query);
               //mengecek apakah ada error ketika menjalankan query
               if (!$result) {
                   die("Query Error: " . mysqli_errno($koneksi) .
                     " - " . mysqli_error($koneksi));
                 }
                 $row = mysqli_fetch_assoc($result);
                 echo $row['id_petugas'];
              ?>"class="form-control mr-2" disabled>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text mr-2 ml-2" id="basic-addon1">Nik Warga</span>
              </div>
              <select name="nik" id="nik" onchange="changeValue(this.value)" class="form-control mr-2" require>
                    <option > Silihkan Masukan NIK</option>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM warga order by nik ASC");
                        $r = mysqli_query($koneksi, "SELECT * FROM warga");
                        $a = "var nama = new Array();\n;";
                        $b = "var id_unit = new Array();\n;";
                        while($row = mysqli_fetch_array($r)){
                            echo '<option name="nik" value="'.$row['nik'] . '">' . $row['nik'] . '</option>' ;

                            $a .= "nama['" . $row['nik'] . "'] = {nama:'" . addslashes($row['nama'])."'};\n";  

                            $b .= "id_unit['" . $row['nik'] . "'] = {id_unit:'" . addslashes($row['id_unit'])."'};\n"; 
                        }
                    ?>
              </select>              
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text ml-2 mr-2" id="basic-addon1">Nama Warga</span>
              </div>
              <input type="text" name="nama" id="nama" class="form-control mr-2" disabled>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text ml-2 mr-2" id="basic-addon1">Id Unit</span>
              </div>
              <input type="text" name="id_unit" id="id_unit" class="form-control mr-2" disabled>
            </div>

            <!-- js untuk autofill data -->
            <script type="text/javascript">
                <?php
                    echo $a;
                    echo $b;
                ?>
                function changeValue(id){
                    document.getElementById('nama').value = nama[id].nama;
                    document.getElementById('id_unit').value = id_unit[id].id_unit;
                };
            </script>


            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text ml-2 mr-2" id="basic-addon1">Tanggal Bayar</span>
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
              <input class="custom-select" name="biaya" id=" biaya" value="<?php
                $query = mysqli_query($koneksi, "SELECT biaya FROM unit WHERE biaya");
                while ($r= mysqli_fetch_assoc($query)) {
                  echo $r;
                if ($biaya >= 50000) {
                  $_POST['ket'] = $ket['ket'];

                } 
              ?>
              <?php
                }
              ?>">
             
              
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
              $nisn = $data['nik'];

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
                        <th scope="col"> NIK</th>
                        <th scope="col"> Nama Warga</th>
                        <th scope="col"> Nama Block</th>
                        <th scope="col"> Nama Unit</th>
                        <th scope="col"> Tanggal Bayar</th>
                        <th scope="col">Bulan Bayar</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Keterangan</th>                
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT pembayaran. *,warga. *,unit. *,petugas. * FROM pembayaran,warga,unit,petugas WHERE pembayaran.nik = warga.nik AND pembayaran.id_unit = unit.id_unit AND pembayaran.id_petugas = petugas.id_petugas  ORDER BY bulan_dibayar ASC");
                

                    while ($data=mysqli_fetch_array($query)) {
                        echo" 
                        <tr>                          
                          <td>$data[id_petugas]</td>
                          <td>$data[nik]</td>
                          <td>$data[nama]</td>
                          <td>$data[nama_block]</td>
                          <td>$data[nama_unit]</td>
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