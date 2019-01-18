<?php defined('BASEPATH')OR exit('akses ga ada');

class M_cetakbarcode extends CI_Model{
	

	public function GetAll(){
		$data = $this -> db -> get('tb_jenisbarang');
		return $data -> result();

		echo json_encode($data);
	}

	public function loaddata(){

		$sql= $this-> db ->query("
			select * from tb_jenisbarang
			") -> result_array();

		echo json_encode($sql);

	}
}