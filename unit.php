<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Unit</title>
</head>
<body>
    <?php
        include('tampilan/header.php');
        include('tampilan/sidebar.php');
        include('tampilan/footer.php');
    ?>

    <!-- Main Content -->
    <div class="main-content bg-primary">
        <section class="section">
        <div class="section-header">
            <h1>DATA UNIT</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
            <div class="breadcrumb-item text-primary">Data Unit</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>LIST UNIT</h4>
                <div class="card-header-form">
                    <form>
                    <div class="input-group-btn">
                        <a href="tambah_unit.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                    </div>
                    </form>
                </div>
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>NO</th>
                        <th>ID UNIT</th>
                        <th>NAMA BLOCK</th>
                        <th>NO UNIT</th>
                        <th>Biaya</th>
                        <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                    $query = "SELECT * FROM unit ORDER BY nama_block";
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

                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['id_unit']; ?></td>
                        <td><?php echo $row['nama_block']; ?></td>
                        <td><?php echo $row['nama_unit']; ?></td>
                        <td><?php echo substr($row['biaya'], 0, 20); ?></td>
                        <td>
                          <a href="edit_unit.php?id=<?php echo $row['id_unit']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          <a href="proses_hapusunit.php?id=<?php echo $row['id_unit']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    
                    <?php
                      $no++; //untuk nomor urut terus bertambah 1
                        }
                    ?>
                  </tbody>
                </table>
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