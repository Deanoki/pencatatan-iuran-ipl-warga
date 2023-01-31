<?php
    // memanggil file koneksi.php untuk membuat koneksi
    include ('koneksi.php');

    //mengecek apakah di url ada nilai GET id
    if (isset($_GET['id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET['id']);

        // menampilkan data dari database yang mempunyai id=$id
        $query = "SELECT * FROM petugas WHERE id_petugas = '$id' ";
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
            echo "<script>alert('Data tidak ditemukan pada database'); window.location='petugas.php';</script>";
        }
    } else {
        # code...
        // apabila tidak ada data GET id pada akan di redirect ke index.php
        echo "<script>alert('Masukkan data id.'); window.location='petugas.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Pengguna</title>
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
        <h1 class="text-primary">EDIT PENGGUNA</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="petugas.php">Data Pengguna</a></div>
          <div class="breadcrumb-item text-primary">Edit Pengguna</div>
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
                      Formulir Pengguna
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="proses_editpetugas.php">
              <div class="wizard-pane">
                <input name="id" required="Kolom Harus Di isi" value="<?php echo $data['id_petugas']; ?>" hidden />
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">USERNAME</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" required="Kolom Harus Di isi" name="username" class="form-control" value="<?php echo $data['username']; ?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">PASSWORD</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" required="Kolom Harus Di isi" name="password" class="form-control" value="<?php echo $data['password']; ?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NAMA PENGGUNA</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" required="Kolom Harus Di isi" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas']; ?>">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">LEVEL</label>
                          <div class="col-lg-4 col-md-6">
                            <select type="text" name="level" class="form-control">
                            <option value="not_option"> silahkan pilih level</option>
                                <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM petugas ORDER BY level ASC";
                                  $result = mysqli_query($koneksi, $query);
                                  //mengecek apakah ada error ketika menjalankan query
                                  if(!$result){
                                    die ("Query Error: ".mysqli_errno($koneksi).
                                       " - ".mysqli_error($koneksi));
                                  }

                                  //buat perulangan untuk element tabel dari data mahasiswa
                                  $no = 1; //variabel untuk membuat nomor urut
                                  // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                  // kemudian dicetak dengan perulangan while
                                  while($row = mysqli_fetch_array($result))
                                  {
                                ?>
                                    <option value="<?php echo $row['id_petugas']; ?>"><?php echo $row['level']; ?></option>
                                <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                ?>
                                </select>
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