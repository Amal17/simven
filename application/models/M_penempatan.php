<?php defined('BASEPATH')OR exit('akses ga ada');

class M_penempatan extends CI_Model{
	public function GetAll(){
		$query = $this->db->query('SELECT id_penempatan, id_barang, tb_jenisbarang.nama_barang, tb_penempatan.id_ruang, tb_ruang.nama_ruang, tb_penempatan.jumlah FROM tb_penempatan, tb_jenisbarang, tb_ruang WHERE id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=tb_ruang.id_ruang ORDER BY id_penempatan DESC');
		return $query -> result_array();
	}

	public function GetBarang(){
		$query = $this->db->query('SELECT tb_penempatan.id_barang, tb_jenisbarang.nama_barang FROM tb_penempatan, tb_jenisbarang WHERE tb_penempatan.id_ruang = 1 AND tb_penempatan.id_barang = tb_jenisbarang.id_jenisbarang  ORDER BY tb_jenisbarang.nama_barang ASC');
		return $query -> result_array();
	}

	public function GetRuang(){
		$query = $this->db->query('SELECT id_ruang, nama_ruang, nama_gedung FROM tb_ruang, tb_gedung WHERE tb_ruang.id_gedung=tb_gedung.id_gedung AND tb_gedung.id_gedung != 1 ORDER BY nama_ruang ASC;');
		return $query -> result_array();
	}

	public function periksa($id_barang, $id_ruang){
		$this->db->where('id_barang', $id_barang);
		$this->db->where('id_ruang', $id_ruang);
		$r = $this->db->get('tb_penempatan');
		return $r->row();
	}

	public function hapus($id_penempatan){
		$this->db->where('id_penempatan', $id_penempatan);
		$r = $this->db->delete('tb_penempatan');
		return $r;
	}

	public function update($id_penempatan, $data){
		$this->db->where('id_penempatan', $id_penempatan);
		$r = $this->db->update('tb_penempatan', $data);
		return $r;
	}

	public function updateJumlah($id_penempatan, $dataJumlah){
		$this->db->where('id_penempatan', $id_penempatan);
		$r = $this->db->update('tb_penempatan', $dataJumlah);
		return $r;
	}

	public function insertPenempatan($data){
		$r = $this->db->insert('tb_penempatan', $data);
		return $r;
	}


	//Hilang
	public function GetAllHilang(){
		$query = $this->db->query('SELECT id_penempatan, id_barang, tb_jenisbarang.nama_barang, tb_penempatan.id_ruang, tb_penempatan.jumlah FROM tb_penempatan, tb_jenisbarang WHERE id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=3 ORDER BY id_penempatan DESC;');
		return $query -> result_array();
	}

	//Rusak
	public function GetAllRusak(){
		$query = $this->db->query('SELECT id_penempatan, id_barang, tb_jenisbarang.nama_barang, tb_penempatan.id_ruang, tb_penempatan.jumlah FROM tb_penempatan, tb_jenisbarang WHERE id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=2 ORDER BY id_penempatan DESC;');
		return $query -> result_array();
	}

	//Revisi
	public function periksaKosong(){
		$query = $this->db->query('SELECT id_penempatan FROM tb_penempatan WHERE jumlah=0;');
		return $query -> row();
	}
}


