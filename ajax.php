<?php
include ('koneksi.php');

// variable nik yang dikirimkan form.php
$nik = $_GET['nik'];

//mengambil data
$query = mysqli_query($koneksi, "SELECT * FROM warga where nik = '$nik'");
$warga = mysqli_fetch_array($query);
$data = array(
    'nama' =>@$warga['nama'],
    'id_unit' =>@$warga['id_unit'],
    'alamat' =>@$warga['alamat'],
    'no_telpon' =>@$warga['no_telpon'],
    );

//tampil data
echo json_encode($data);
?>