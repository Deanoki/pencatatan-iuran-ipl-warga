<?php
    // memanggil file koneksi.php untuk membuat koneksi
    include ('koneksi.php');

    //mengecek apakah di url ada nilai GET id
    if (isset($_GET['id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET['id']);

        // menampilkan data dari database yang mempunyai id=$id
        $query = "SELECT * FROM warga WHERE nik = '$id' ";
        $res = mysqli_query($koneksi, $query);

        //jika data gagal diambil maka akan tampil error berikut
        if (!$res) {
            die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        }

        // mengambil data dari database
        $data = mysqli_fetch_assoc($res);

        // apabila data tidak ada pada database maka akan dijalankan perintah ini
        if (!count($data)) {
            # code...
            echo "<script>alert('Data tidak ditemukan pada database'); window.location='unit.php';</script>";
        }
    } else {
        # code...
        // apabila tidak ada data GET id pada akan di redirect ke index.php
        echo "<script>alert('Masukkan data id.'); window.location='unit.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Warga</title>
</head>
<body>
    <?php
        include('tampilan/header.php');
        include('tampilan/sidebar.php');
        include('tampilan/footer.php');
    ?>

<div class="main-content bg-primary">
    <section class="section ">
      <div class="section-header">
        <h1 class="text-primary">EDIT WARGA</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="warga.php">Data Warga</a></div>
          <div class="breadcrumb-item text-primary">Edit Warga</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
          </div>
          <div class="card-body bg-primary">
            <div class="row mt-4">
              <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-school"></i>
                    </div>
                    <div class="wizard-step-label">
                      Formulir Warga
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <form class="wizard-content mt-2" method="post" action="proses_editwarga.php">
              <div class="wizard-pane">              
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NIK</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="id" class="form-control" value="<?php echo $data['nik'];?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NAMA</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'];?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white"> ID UNIT</label>
                  <div class="col-lg-4 col-md-6">
                    <select name="id_unit" type="text" name="id_unit" class="form-control" value="<?php echo $data['id_unit'];?>">
                      <?php
                      $iddatayangdipilih = $data['id_unit'];
                      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                      $query = "SELECT * FROM unit ORDER BY id_unit ASC";
                      $result = mysqli_query($koneksi, $query);
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
                        <option value="<?php echo $row['id_unit']; ?>" <?php if ($row['id_unit'] == "$iddatayangdipilih") { ?> selected="selected" <?php } ?>><?php echo $row['id_unit']; ?></option>
                      <?php
                        $no++; //untuk nomor urut terus bertambah 1
                      }
                      ?>
                    </select>
                  </div>
                </div>                              
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-white">ALAMAT</label>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'];?>">
                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-white">NO TELP</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="no_telpon" class="form-control" value="<?php echo $data['no_telpon'];?>">
                  </div>
              </div>
          
          <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-lg-4 col-md-6 text-right">
              <button type="submit" class="btn btn-icon icon-right btn-primary">TAMBAH WARGA<i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
          </div>
        </div>
        </form>
          </div>
        </div>
      </div>
  </div>
  </div>
  </section>
  </div>
  </div>
  </div>
        



</body>
</html>