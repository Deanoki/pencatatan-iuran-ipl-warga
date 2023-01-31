<?php
    // agar terhubung database
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan Penganggkutan Sampah</title>
</head>
<body>
    <?php
        include ('tampilan/header.php');
        include ('tampilan/footer.php');
        include ('tampilan/sidebar.php');
    ?>

    <!-- Main Content -->
    <div class="main-content bg-primary">
        <section class="section">
            <div class="section-header">
                <h1>SURAT JALAN</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
                    <div class="breadcrumb-item text-primary">Laporan</div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LAPORAN TRANSAKSI</h4>
                        <div class="card-header-form"></div>
                    </div> -->
                    <form method="POST" action="ekspor_suratjalan.php" enctype="multipart/form-data" >
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h4>Surat Jalan Penganggkutan Sampah</h4>
                            <div class="card-header-form"></div>
                        </div>
                    <div class="col-md-3 m-3 mb-2"> 
                        <label class="mr-5">Dari Tanggal</label>
                        <input type="date" name="daritanggal" autofocus="" required="Kolom Harus Di isi" />
                    </div>
                    <div class="col-md-3 m-3 mb-2">
                        <label class="mr-4">Sampai Tanggal</label>
                        <input type="date" name="sampaitanggal" required="Kolom Harus Di isi"/>
                    </div>
        
                    <div class="col-md-3 m-3 mb-2">
                        <!-- <button class="btn btn-primary" type="submit"><a href="eskpor_suratjalanpdf.php"></a>Cetak ke PDF
                        </button> -->
                        
                        <button class="btn btn-success" type="submit">Cetak ke Excel</button>
                    </div>
                    
                </form>
                </div>
            </div>
            <!-- <form action="ekspor.php" method="POST">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Transaksi</h4>
                        <div class="card-header-form">
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Dari Tanggal</td>
                        <td>:</td>
                        <td>
                            <input class="type="date" name="daritanggal" form-control" type="text" name="nik" placeholder="--Data NIK Lihat Di Form Warga--">
                        </td>
                        <td>
                            <button class="btn btn-success" type="submit" name="cari">Cari</button>
                        </td>
                    </tr>
                </table>
            </form> -->            
                
        </section>
</body>
</html>