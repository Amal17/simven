<?php defined('BASEPATH')OR exit('akses ga ada');

class M_ruang extends CI_Model{
	public function GetAll(){
		$query = $this->db->query('SELECT tb_ruang.id_ruang, tb_ruang.id_gedung, tb_ruang.nama_ruang, tb_gedung.nama_gedung FROM tb_ruang, tb_gedung WHERE tb_ruang.id_gedung=tb_gedung.id_gedung');
		return $query -> result_array();

		//$data = $this -> db -> get('tb_ruang');
		//return $data -> result_array();
	}

	public function GetGedung(){
		$data = $this -> db -> get('tb_gedung');
		$this->db->order_by('nama_gedung', 'ASC');
		return $data -> result_array();
	}

	public function insertRuang($data){
		$r = $this -> db -> insert('tb_ruang', $data);
		return $r;
	}

	public function deleteRuang($id){
		$this -> db -> where('id_ruang', $id);
		$r = $this -> db -> delete('tb_ruang');
		return $r;
	}

	public function updateRuang($id_ruang, $data){
		$this -> db -> where('id_ruang', $id_ruang);
		$r = $this -> db -> update('tb_ruang', $data);
		return $r;
	}

	public function periksaRuang($id_gedung, $nama_ruang){
		$this->db->where('id_gedung', $id_gedung);
		$this->db->where('nama_ruang', $nama_ruang);
		$r = $this->db->get('tb_ruang');
		return $r->row();
	}

	public function periksaRuang1($id_ruang){
		$this->db->where('id_ruang', $id_ruang);
		$r = $this->db->get('tb_penempatan');
		return $r->result_array();
	}
}