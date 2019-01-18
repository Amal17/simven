<?php defined('BASEPATH')OR exit('akses ga ada');

class M_pengadaan extends CI_Model{
	public function getAll(){
		$data = $this -> db -> query('SELECT id_barang, tb_jenisbarang.id_jenisbarang, tb_jenisbarang.nama_barang, tb_pemasok.nama_pemasok, tanggal_beli, merk, spek, stok, harga_satuan, harga_total FROM tb_barang, tb_jenisbarang, tb_pemasok WHERE tb_barang.id_jenisbarang=tb_jenisbarang.id_jenisbarang AND tb_barang.id_pemasok=tb_pemasok.id_pemasok ORDER BY tb_jenisbarang.nama_barang ASC');
		return $data -> result_array();
	}

	public function getBarang(){
		$this->db->select('id_jenisbarang, nama_barang');
		$this->db->order_by('nama_barang', 'ASC');
		$query = $this->db->get('tb_jenisbarang');
		return $query -> result_array();
	}

	public function getPemasok(){
		$this->db->select('id_pemasok, nama_pemasok');
		$this->db->order_by('nama_pemasok', 'ASC');
		$query = $this->db->get('tb_pemasok');
		return $query -> result_array();
	}

	public function Jumlah($id_jenisbarang){
		$data = $this -> db -> query('SELECT SUM(stok) as jumlah FROM tb_barang WHERE id_jenisbarang='.$id_jenisbarang);
		return $data -> row();
	}

	public function insertPengadaan($data){
		$r = $this->db->insert('tb_barang', $data);
		return $r;
	}

	public function updateJumlah($id_jenisbarang, $dataJumlah){
		$this->db->where('id_jenisbarang', $id_jenisbarang);
		$r = $this->db->update('tb_jenisbarang', $dataJumlah);
		return $r;
	}

	public function periksaGudang($id_barang){
		$this->db->where('id_barang', $id_barang);
		$this->db->where('id_ruang', '1');
		$r = $this->db->get('tb_penempatan');
		return $r->row();
	}

	public function updateGudang($id_penempatan, $dataGudang){
		$this->db->where('id_penempatan', $id_penempatan);
		$r = $this->db->update('tb_penempatan', $dataGudang);
		return $r;
	}

	public function insertGudang($dataGudang){
		$r = $this->db->insert('tb_penempatan', $dataGudang);
		return $r;
	}

	public function updatePengadaan($id_barang, $data){
		$this->db->where('id_barang', $id_barang);
		$r = $this->db->update('tb_barang', $data);
		return $r;
	}
}
