<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

	// membuat variabel untuk menampung data dari form
    $id_pembayaran = $_POST['id_pembayaran'];
	$id_petugas      = $_POST['id_petugas'];
  	$nik             = $_POST['nik'];
  	$id_unit         = $_POST['id_unit'];
  	$tgl_bayar       = $_POST['tgl_bayar'];
  	$bulan_dibayar   = $_POST['bulan_dibayar'];
  	$biaya           = $_POST['biaya'];
  	$ket             = $_POST['ket'];
  	
 


                  $query = "INSERT INTO pembayaran VALUES ('$id_pembayaran','$id_petugas', '$nik','$id_unit', '$tgl_bayar', '$bulan_dibayar', '$biaya', '$ket') ";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='transaksi.php';</script>";
                  }

            ?>