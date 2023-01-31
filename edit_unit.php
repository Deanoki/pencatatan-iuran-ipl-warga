<?php
    // memanggil file koneksi.php untuk membuat koneksi
    include ('koneksi.php');

    //mengecek apakah di url ada nilai GET id
    if (isset($_GET['id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET['id']);

        // menampilkan data dari database yang mempunyai id=$id
        $query = "SELECT * FROM unit WHERE id_unit = '$id' ";
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
    <title>Edit Unit</title>
</head>
<body>
    <?php
        include('tampilan/header.php');
        include('tampilan/sidebar.php');
        include('tampilan/footer.php');
    ?>

<div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>EDIT UNIT</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="unit.php">Data Unit</a></div>
          <div class="breadcrumb-item text-primary">Edit Unit</div>
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
                      Formulir Unit
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="proses_editunit.php">
              <div class="wizard-pane">
                <input name="id" value="<?php echo $data['id_unit']; ?>" hidden />
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NAMA BLOCK</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama_block" class="form-control" value="<?php echo $data['nama_block']; ?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NO UNIT</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama_unit" class="form-control" value="<?php echo $data['nama_unit']; ?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">BIAYA</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="biaya" class="form-control" value="<?php echo $data['biaya']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn btn-icon icon-right btn-primary">UPDATE<i class="fas fa-arrow-right"></i></button>
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