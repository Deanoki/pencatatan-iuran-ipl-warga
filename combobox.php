<?php
include ('koneksi.php');

include ('tampilan/header.php');
include ('tampilan/sidebar.php');
include ('tampilan/footer.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>DATA WARGA</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary">Data Warga</div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>DETAIL WARGA</h4>
            </div>
              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Warga</h4>
                        <div class="card-header-form">
                    </div>
                </div>
    <!-- cara menampilkan data pada form berdasarkan pilihan dropdown -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <h4>pilih id warga</h4>
        <select name="nik" class="form-control">
            <?php
                $query = mysqli_query($koneksi, "SELECT * FROM warga ORDER BY nik");
                while($data = mysqli_fetch_array($query)){
            ?>
            <option value="<?php $data['nik'];?><?php echo $data['nik'];?>"><?php echo $data['nik'];?></option>
            <?php
                }
            ?>
                
        </select>
        <input type="submit" value="pilih">
        <a href="./combobox.php">refresh</a>
    </form>
    
    <h4>Data Pegawai</h4>
        <?php
        if (isset($_GET['nik'])) {
            $id_peg=$_GET['nik'];

            //menampilkan data pegawai berdasarkan pilihan combobox ke dalam form
            $tamPeg=mysqli_query($koneksi, "SELECT * FROM warga WHERE nik='$id_peg'");
            $tpeg = mysqli_fetch_array($tamPeg);
        
        ?>
        <form action="#" method="POST">
        <table border="0" cellpadding="2">
            <tr>
                <td width="100">NIP</td>
                <td width="280">: <input type="text" name="nip" value="<?php echo $tpeg['nik']; ?>" /></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" value="<?php echo $tpeg['nama']; ?>" /></td>
            </tr>
            <tr>
                <td>Unit Kerja</td>
                <td>: <input type="text" name="id_unit" value="<?php echo $tpeg['id_unit']; ?>" /></td>
            </tr>
            <tr>
                <td>Gol</td>
                <td>: <input type="text" name="alamat" value="<?php echo $tpeg['alamat']; ?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td>  <input type="submit" value="Save"></td>
            </tr>
        </table>
        </form>
        <?php
        }
        ?>
</body>
</html>