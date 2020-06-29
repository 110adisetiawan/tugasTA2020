<?php
$cetak = $_GET['id'];
?>

<html>
<head>
	<title>CETAK NOTA TRANSAKSI</title>
</head>
<meta http-equiv="refresh" content="3;../index.php"></head>
<body>
		<h2>SPBU ADI SETIAWAN</h2>
		<h4>JL.KEBENARAN no.69</h4>
 		===============================================
		<?php

		$konek = oci_connect("adi_06937", "seti421", "localhost/XE");
		$s = oci_parse($konek, "SELECT * FROM TRANSAKSI_06937 INNER join OPERATOR_06937 on TRANSAKSI_06937.ID_OPERATOR=OPERATOR_06937.ID_OPERATOR INNER JOIN POMPA_06937 on TRANSAKSI_06937.ID_POMPA=POMPA_06937.ID_POMPA INNER join Produk_06937 on Pompa_06937.kode_produk=Produk_06937.kode_produk WHERE ID_TRX = '$cetak'");
		oci_execute($s);

		while ($row = oci_fetch_array($s,OCI_BOTH)) {
			?>	
                        <h4>KODE TRANSAKSI = <?php echo $row['ID_TRX']?></h4>
                        <h4>TANGGAL = <?php echo $row['WAKTU']?></h4>
                        <h4>NAMA OPERATOR = <?php echo $row['NAMA_OPERATOR_06937']?></h4>
                        <h4>NOMOR POMPA = <?php echo $row['NOMOR_POMPA']?></h4>
                        <h4>NAMA PRODUK = <?php echo $row['NAMA_PRODUK']?></h4>
                        <h4>TOTAL LITER = <?php echo $row['TOTAL_LITER']?></h4>
                        <h4>TOTAL BAYAR = Rp.<?php echo $row['TOTAL_BAYAR']?></h4>
                        <h4>NOMOR PLAT = <?php echo $row['NO_PLAT']?></h4>
                      
		<?php
		}
?>
		===============================================
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>