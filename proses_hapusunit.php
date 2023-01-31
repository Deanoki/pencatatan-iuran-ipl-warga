<?php
    // memanggil file koneksi.php untuk melakukan koneksi database
    include ('koneksi.php');


    $id = $_GET["id"];
    //mengambil id yang ingin dihapus
    
        //jalankan query DELETE untuk menghapus data
        $query = "DELETE FROM unit WHERE id_unit='$id' ";
        $hasil_query = mysqli_query($koneksi, $query);
    
        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
          die ("Gagal menghapus data: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
        } else {
          echo "<script>alert('Data berhasil dihapus.');window.location='unit.php';</script>";
        }

?>
