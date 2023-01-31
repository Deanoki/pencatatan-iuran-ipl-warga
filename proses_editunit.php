<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

// membuat variabel untuk menampung data dari form

$id                      = $_POST['id'];
$nama_block              = $_POST['nama_block'];
$nama_unit               = $_POST['nama_unit'];
$biaya                   = $_POST['biaya'];

//cek dulu jika merubah gambar produk jalankan coding ini

// jalankan query UPDATE berdasarkan ID yang produknya kita edit
$query  = "UPDATE unit SET nama_block = '$nama_block' WHERE id_unit = '$id'";
$result = mysqli_query($koneksi, $query);

$query  = "UPDATE unit SET nama_unit = '$nama_unit' WHERE id_unit = '$id'";
$result = mysqli_query($koneksi, $query);

$query  = "UPDATE unit SET biaya = '$biaya ' WHERE id_unit = '$id'";
$result = mysqli_query($koneksi, $query);

// periska query apakah ada error
if (!$result) {
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  //tampil alert dan akan redirect ke halaman index.php
  //silahkan ganti index.php sesuai halaman yang akan dituju
  echo "<script>alert('Data berhasil diubah.');window.location='unit.php';</script>";
}
