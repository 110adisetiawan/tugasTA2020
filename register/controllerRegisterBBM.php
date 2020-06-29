<?php

require_once '../model/database.php';

class modelBBM extends koneksiDB
{
	private $dataBBM;

	function select(){
		$sqltext="SELECT * FROM Produk_06937";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataBBM = $temp;

		oci_free_statement($statement);
	}

	function insert($kode,$nama,$harga)
	{
		$sqltext="INSERT INTO Produk_06937 VALUES ('$kode','$nama','$harga')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}


	function getData()
	{
		return $this->dataBBM;
	}

	function delete($kode)
	{
		$sqltext="DELETE FROM Produk_06937 WHERE KODE_PRODUK='$kode'";
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

	function viewData()
	{
		
		foreach ($this->dataBBM as $key) {
			echo "<tr><td>".$key['KODE_PRODUK']."</td>";
    		echo "<td>".$key['NAMA_PRODUK']."</td>";
    		echo "<td>".$key['HARGA']."</td>";
    		echo "<td><button type='button'>Edit</button></td></tr>";

		}
	}

}

// $modelBBM=new modelBBM();
// $modelBBM->select();
// if (isset($_POST['input'])) {
// echo $modelBBM->insert();
//  }
// //$modelBBM->viewData();

// // }
// //header('Location: ../view/viewProdukBBM.php'); 
// //$_POST['harga']
?>

