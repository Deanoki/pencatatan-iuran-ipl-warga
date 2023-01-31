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
    <title>Laporan</title>
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
                <h1>LAPORAN</h1>
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
                    <form method="POST" action="ekspor_laporan.php" enctype="multipart/form-data" >
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h4>LAPORAN TRANSAKSI</h4>
                            <div class="card-header-form"></div>
                        </div>
                    <div class="col-md-3 m-3 mb-2"> 
                        <label class="mr-5">Dari Tanggal</label>
                        <input type="date" name="daritanggal" required="" />
                    </div>
                    <div class="col-md-3 m-3 mb-2">
                        <label class="mr-4">Sampai Tanggal</label>
                        <input type="date" name="sampaitanggal" required=""/>
                    </div>
        
                    <div class="col-md-3 m-3 mb-2">
                        <!-- <button class="mr-3 btn btn-primary" type="submit">Ekspor ke Word</button> -->
                        <button class="btn btn-success" type="submit">Ekspor ke Excel</button>
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