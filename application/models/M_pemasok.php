<?php defined('BASEPATH')OR exit('akses ga ada');

class M_pemasok extends CI_Model{
	public function GetAll(){
		$data = $this -> db -> get('tb_pemasok');
		return $data -> result_array();
	}

	public function insertPemasok($data){
		$r = $this -> db -> insert('tb_pemasok', $data);
		return $r;
	}

	public function deletePemasok($id_pemasok){
		$this -> db -> where('id_pemasok', $id_pemasok);
		$r = $this -> db -> delete('tb_pemasok');
		return $r;
	}

	public function updatePemasok($id_pemasok, $data){
		$this -> db -> where('id_pemasok', $id_pemasok);
		$r = $this -> db -> update('tb_pemasok', $data);
		return $r;
	}

	public function periksaPemasok($id_pemasok){
		$this->db->where('id_pemasok', $id_pemasok);
		$r = $this->db->get('tb_barang');
		return $r->result_array();
	}
}