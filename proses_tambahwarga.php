<?php
    // memanggil file koneksi.php untuk melakukan koneksi database
    include ('koneksi.php');

    // membuat variabel untuk menampung data dari form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $id_unit = $_POST['id_unit'];
    $alamat = $_POST['alamat'];
    $no_telpon = $_POST['no_telpon'];
    
    
    $query ="INSERT INTO warga VALUES ('$nik','$nama','$id_unit','$alamat', '$no_telpon')";
    $result = mysqli_query($koneksi, $query);

    // periksa query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan : ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    }else {
        //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script> alert('Data berhasil ditambah.'); window.location='warga.php';</script>";
    }
   
        

?>
<?php    
   
?>