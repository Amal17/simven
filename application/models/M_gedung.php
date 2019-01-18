<?php defined('BASEPATH')OR exit('akses ga ada');

class M_gedung extends CI_Model{
	public function GetAll(){
		$data = $this -> db -> get('tb_gedung');
		return $data -> result_array();
	}

	public function GetGedung($nama_gedung){
		$this->db->where('nama_gedung', $nama_gedung);
		$r = $this -> db -> get('tb_gedung');
		return $r -> result_array();
	}

	public function insertGedung($data){
		$r = $this -> db -> insert('tb_gedung', $data);
		return $r;
	}

	public function deleteGedung($id){
		$this -> db -> where('id_gedung', $id);
		$r = $this -> db -> delete('tb_gedung');
		return $r;
	}

	public function updateGedung($id_gedung, $data){
		$this -> db -> where('id_gedung', $id_gedung);
		$r = $this -> db -> update('tb_gedung', $data);
		return $r;
	}

	public function periksaGedung($id_gedung){
		$this->db->where('id_gedung', $id_gedung);
		$r = $this -> db -> get('tb_ruang');
		return $r -> result_array();
	}
}