<!DOCTYPE html>
<html>
<head>
	<title>MENAMPILKAN DATA DARI DATABASE SESUAI TANGGAL DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>

	<center>

		<h2>MENAMPILKAN DATA DARI DATABASE SESUAI TANGGAL DENGAN PHP<br/><a href="https://www.malasngoding.com">WWW.MALASNGODING.COM</a></h2>


		<?php 
		?>

		<br/><br/><br/>

		<form method="get">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tglawal">
			<label>Sampai TANGGAL</label>
			<input type="date" name="tglakhir">
			<input type="submit" value="FILTER">
		</form>

		<br/> <br/>

		<table border="1">
			<tr>
				<th>WAKTU</th>
				<th>NAMA OPERATOR</th>
				<th>NAMA PRODUK</th>
				<th>TOTAL LITER</th>
				<th>TOTAL HARGA</th>
				<th>NO PLAT</th>
			</tr>
			<?php 
			$no = 1;

			if(isset($_GET['tanggal'])){
				$tgl1 = $_GET['tglawal'];
				$tgl2 = $_GET['tglakhir'];
				
require '../register/controllerTransaksi.php';

$modelTx=new modelTransaksi();
$modelTx -> select();
$dataTx = $modelTx->getData();
                    foreach ($dataTx as $data) 
                    { ?>
			<tr>
				<td><?php echo $data['WAKTU']; ?></td>
				<td><?php echo $data['NAMA_OPERATOR_06937']; ?></td>
				<td><?php echo $data['NAMA_PRODUK']; ?></td>
				<td><?php echo $data['TOTAL_LITER']; ?></td>
				<td><?php echo $data['TOTAL_HARGA']; ?></td>
				<td><?php echo $data['NO_PLAT']; ?></td>
			</tr>
			<?php 
			}	}
			?>
		</table>

	</center>
</body>
</html>