<?php

require '../model/database.php';

class modelOP extends koneksiDB
{
	private $dataOP;
	private $dataLogin;

	function select(){
		$sqltext="SELECT * FROM Operator_06937";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataOP = $temp;

		oci_free_statement($statement);
	}

	function login(){
		$sqltext="SELECT * FROM Operator_06937";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataLogin = $temp;

		oci_free_statement($statement);
	}

	function insert($id,$nama,$alamat,$level)
	{
		$sqltext="INSERT INTO Operator_06937 VALUES ('$id','$nama','$alamat','$level')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}


	function getData()
	{
		return $this->dataOP;
	}

	function delete($id)
	{
		$sqltext="DELETE FROM Operator_06937 WHERE ID_OPERATOR='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id,$nama,$alamat)
	{
		$sqltext="UPDATE Operator_06937 SET NAMA_OPERATOR_06937='$nama', ALAMAT_LENGKAP='$alamat' WHERE ID_OPERATOR = '$id'";
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

