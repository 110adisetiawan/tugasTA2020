<?php

require_once '../model/database.php';

class modelPompa extends koneksiDB
{
	private $dataPompa;

	function select(){
		$sqltext="SELECT * FROM Pompa_06937 INNER join Produk_06937 on Pompa_06937.kode_produk=Produk_06937.kode_produk";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataPompa = $temp;

		oci_free_statement($statement);
	}

	function insert($idPompa,$kdProduk,$noPompa,$kpstPompa)
	{
		$sqltext="INSERT INTO Pompa_06937 VALUES ('$idPompa','$kdProduk','$noPompa','$kpstPompa')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}


	function getData()
	{
		return $this->dataPompa;
	}

	function delete($id)
	{
		$sqltext="DELETE FROM Pompa_06937 WHERE ID_POMPA='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($idPompa,$noPompa,$kpstPompa)
	{
		$sqltext="UPDATE Pompa_06937 SET NOMOR_POMPA='$noPompa', KAPASITAS='$kpstPompa' WHERE ID_POMPA = '$idPompa'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function viewData()
	{

		foreach ($this->dataPompa as $key) {
			echo $key['ID_POMPA'];
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

