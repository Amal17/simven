<?php defined('BASEPATH')OR exit('akses ga ada');

class M_gedung extends CI_Model{
	public function GetAll(){
		$data = $this -> db -> get('tb_gedung');
		return $data -> result_array();
	}

	public function insertGedung($data){
		$r = $this -> db -> insert('tb_gedung', $data);
		return $r;
	}
}