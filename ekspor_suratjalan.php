<?php
// agaar terhubung database
	include 'koneksi.php';
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Surat jalan Sampah.xls");
?>

<!DOCTYPE html>

<head>

	<title>LAPORAN REKAP TRANSAKSI PEMBAYARAN IPL SUKMA INDAH RESIDENCE</title>
</head>
<body>
    <?php
	    if (isset($_POST['daritanggal'])) {
		    $daritanggal = ($_POST['daritanggal']);
		    $sampaitanggal = ($_POST['sampaitanggal']);
	?>   
        <p align="center">SURAT JALAN PENGANGGKUTAN SAMPAH</p>
		<p align="center">SUKMA INDAH RESIDENCE</p>
		<p align="center"><?php echo strtoupper(date('F')); ?></p>
		<p>&nbsp;</p>

    <table border="1" align="center">
			<thead>
				<tr>
					<th>No</th>
					<th>Bulan</th>
					<th>Nama Block</th>
					<th>No Unit</th>
					<th>Keterangan</th>					
			</thead>
        <?php
            }
        ?>	
	    <tbody>
	        <?php
		        $data = "SELECT pembayaran.*,unit. * FROM pembayaran,warga,    unit,petugas WHERE pembayaran.id_unit = unit.id_unit AND       (pembayaran.tgl_bayar BETWEEN '$daritanggal' AND      '$sampaitanggal')";

		        $result = mysqli_query($koneksi, $data);
			        	if (!$result) {
			        		die("Query Error: " . mysqli_errno($koneksi) .
			        			" - " . mysqli_error($koneksi));
			        	}
		        $no = 1;
                $d = mysqli_fetch_array($result);			
	        ?>
		    <tr>
			    <td><?php echo $no++;?></td>
			    <td><?php echo $d['bulan_dibayar'];?></td>
			    <td><?php echo $d['nama_block'];?></td>
			    <td><?php echo $d['nama_unit'];?></td>
			    <td><?php echo $d['ket'];?></td>		
		    </tr>
	
	    </tbody>			
	</table>
</body>
</html>