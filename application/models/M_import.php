<?php defined('BASEPATH')OR exit('akses ga ada');

class M_import extends CI_Model{

	public function import($data){
		$r = $this -> db -> insert('tb_barang', $data);
		return $r;
	}

}