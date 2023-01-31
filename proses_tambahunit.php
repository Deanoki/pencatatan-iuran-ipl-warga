<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

// membuat variabel untuk menampung data dari form
$id_unit                = $_POST['id_unit'];
$nama_block             = $_POST['nama_block'];
$nama_unit              = $_POST['nama_unit'];
$biaya                  = $_POST['biaya'];



$query = "INSERT INTO unit VALUES ('$id_unit','$nama_block', '$nama_unit', '$biaya')";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  //tampil alert dan akan redirect ke halaman index.php
  //silahkan ganti index.php sesuai halaman yang akan dituju
  echo "<script>alert('Data berhasil ditambah.');window.location='unit.php';</script>";
}
