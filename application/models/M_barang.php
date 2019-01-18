<?php defined('BASEPATH')OR exit('akses ga ada');

class M_barang extends CI_Model{
	public function GetAll(){
		$data = $this -> db -> get('tb_jenisbarang');
		return $data -> result_array();
	}

	public function insertBarang($data){
		$r = $this -> db -> insert('tb_jenisbarang', $data);
		return $r;
	}

	public function deleteBarang($id){
		$this -> db -> where('id_jenisbarang', $id);
		$r = $this -> db -> delete('tb_jenisbarang');
		return $r;
	}

	public function updateBarang($id_jenisbarang, $data){
		$this -> db -> where('id_jenisbarang', $id_jenisbarang);
		$r = $this -> db -> update('tb_jenisbarang', $data);
		return $r;
	}

	public function periksaBarang($nama_barang){
		$this -> db -> where('nama_barang', $nama_barang);
		$r = $this->db->get('tb_jenisbarang');
		return $r->row();
	}

	public function periksaHapus($id_jenisbarang){
		$this->db->where('id_jenisbarang', $id_jenisbarang);
		$r = $this->db->get('tb_barang');
		return $r->result_array();
	}
}