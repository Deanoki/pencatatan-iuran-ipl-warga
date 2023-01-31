<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $nama     = $_POST['nama'];
  $id_unit = $_POST['id_unit'];
  $alamat     = $_POST['alamat'];
  $no_telp     = $_POST['no_telpon'];


  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE warga SET nik = $id, id_unit = '$id_unit',nama = '$nama',alamat = '$alamat',no_telpon = '$no_telp'  WHERE nik = '$id'";
                    // periska query apakah ada error
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='warga.php';</script>";
                    }
              
        
?>

