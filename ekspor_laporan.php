<?php
// agaar terhubung database
	include 'koneksi.php';
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Transaksi.xls");
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
        <p align="center">LAPORAN REKAP TRANSAKSI PEMBAYARAN IPL</p>
		<p align="center">SUKMA INDAH RESIDENCE</p>
		<p align="center">TANGGAL <?php echo $daritanggal; ?> - <?php echo $sampaitanggal; ?></p>
		<p>&nbsp;</p>

        <table border="1">
			<thead>
				<tr>
					<th>No</th>
                    <th>ID Petugas</th>
                    <th>Nama Petugas</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Nama Block</th>
					<th>Nama Unit</th>
					<th>Bulan Dibayar</th>
					<th>Keterangan</th>					
			</thead>
    <?php
        }
    ?>
	
	<tbody>
	<?php
		$data = "SELECT pembayaran.*,warga.*,unit.*,petugas. * FROM pembayaran,warga,unit,petugas WHERE pembayaran.id_petugas = petugas.id_petugas AND pembayaran.nik = warga.nik AND pembayaran.id_unit = unit.id_unit AND (pembayaran.tgl_bayar BETWEEN '$daritanggal' AND '$sampaitanggal')";

		$result = mysqli_query($koneksi, $data);
				if (!$result) {
					die("Query Error: " . mysqli_errno($koneksi) .
						" - " . mysqli_error($koneksi));
				}
		$no = 1;
		while($d = mysqli_fetch_assoc($result)){				
	?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $d['id_petugas'];?></td>
			<td><?php echo $d['nama_petugas'];?></td>
			<td><?php echo $d['nik'];?></td>
			<td><?php echo $d['nama'];?></td>
			<td><?php echo $d['nama_block'];?></td>
			<td><?php echo $d['nama_unit'];?></td>
			<td><?php echo $d['bulan_dibayar'];?></td>
			<td><?php echo $d['ket'];?></td>		
		</tr>
	<?php
		}
	?>
	</tbody>
	
			
		</table>
</body>
</html>