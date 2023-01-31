<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username 			= $_POST['username'];
$password 			= $_POST['password'];

// menyeleksi data petugas dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai petugas ipl
	// $sql = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas ='$id_petugas'");

	if($data['level'] == "petugas_ipl"){

		// buat session login dan username
		$_SESSION['id_petugas'] = $_GET['id_petugas'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas_ipl";
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");

    // cek jika user login sebagai direktur utama
	}else if($data['level']=="dirut"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "dirut";
		// alihkan ke halaman dashboard petugas
		header("location:dashboard.php");
    
    // cek jika user login sebagai warga
	}else if($data['level']=="warga"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "warga";
		// alihkan ke halaman dashboard siswa
		header("location:history.php");
    
    }else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

}else{
	header("location:index.php?pesan=gagal");
}