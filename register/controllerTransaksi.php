<?php

require_once '../model/database.php';

class modelTransaksi extends koneksiDB
{
	private $dataTransaksi;
	private $dataSettlement;
	private $dataCetak;
	private $kode=0;
	private $trxbaru;

	function select(){
		$sqltext="SELECT * FROM TRANSAKSI_06937 INNER join OPERATOR_06937 on TRANSAKSI_06937.ID_OPERATOR=OPERATOR_06937.ID_OPERATOR INNER JOIN POMPA_06937 on TRANSAKSI_06937.ID_POMPA=POMPA_06937.ID_POMPA INNER join Produk_06937 on Pompa_06937.kode_produk=Produk_06937.kode_produk";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;

			if($this->kode<(int)substr($row['ID_TRX'], 3, 3))
			{
				$this->kode=(int)substr($row['ID_TRX'], 3, 3);	
			}

		}
		$this->dataTransaksi = $temp;



		oci_free_statement($statement);
	}

	function insert($idtrx,$idOp,$idPompa,$tgl,$liter,$bayar,$plat)
	{
		$sqltext="INSERT INTO TRANSAKSI_06937 VALUES ('$idOp','$idPompa',to_date('$tgl','mm/dd/yyyy'),'$liter','$bayar','$plat','$idtrx')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}


	function getData()
	{
		return $this->dataTransaksi;
	}

	function getSettlement()
	{
		return $this->dataSettlement;
	}

	function delete($id)
	{
		$sqltext="DELETE FROM TRANSAKSI_06937 WHERE ID_TRX='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($kode,$nama,$harga)
	{
		$sqltext="UPDATE Produk_06937 SET NAMA_PRODUK='$nama', HARGA='$harga' WHERE KODE_PRODUK = '$kode'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function setTrxBaru()
	{
		return $this->trxbaru="TRX".sprintf($this->kode+1);
	}

	function getTrxBaru()
	{
		echo $this->trxbaru;
	}

	function settlement($awal,$akhir){
		$sqltext="SELECT * FROM TRANSAKSI_06937 INNER join OPERATOR_06937 on TRANSAKSI_06937.ID_OPERATOR=OPERATOR_06937.ID_OPERATOR INNER JOIN POMPA_06937 on TRANSAKSI_06937.ID_POMPA=POMPA_06937.ID_POMPA INNER join Produk_06937 on Pompa_06937.kode_produk=Produk_06937.kode_produk WHERE WAKTU BETWEEN to_date('$awal','mm/dd/yyyy') AND to_date('$akhir','mm/dd/yyyy')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;

		}
		$this->dataSettlement = $temp;



		oci_free_statement($statement);
	}

	function cetakNota($idTrx){
		$sqltext="SELECT * FROM TRANSAKSI_06937 INNER join OPERATOR_06937 on TRANSAKSI_06937.ID_OPERATOR=OPERATOR_06937.ID_OPERATOR INNER JOIN POMPA_06937 on TRANSAKSI_06937.ID_POMPA=POMPA_06937.ID_POMPA INNER join Produk_06937 on Pompa_06937.kode_produk=Produk_06937.kode_produk WHERE ID_TRX = '$idTrx' ";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;

		}
		$this->dataCetak = $temp;



		oci_free_statement($statement);
	}

}

?>

