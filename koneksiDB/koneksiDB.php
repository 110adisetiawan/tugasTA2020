<?php
class koneksiDB
{
	private $user="adi_06937";
	private $pass="seti421";
	private $db="localhost/XE";
	protected $koneksi;


	function __construct(){
		$konek = oci_connect($this->user, $this->pass, $this->db);

		if($konek){
			return $this->koneksi = $konek;
		}

		else{
			echo "Konek gagal";
		}
	}

}

?>