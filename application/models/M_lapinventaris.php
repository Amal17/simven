<?php defined('BASEPATH')OR exit('akses ga ada');

class M_lapinventaris extends CI_Model{
	public function GetAll(){
			$data = $this -> db -> query("SELECT tb_jenisbarang.nama_barang, tb_ruang.nama_ruang, tb_gedung.nama_gedung, tb_penempatan.jumlah,tb_jenisbarang.satuan FROM tb_penempatan, tb_jenisbarang, tb_ruang, tb_gedung WHERE id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=tb_ruang.id_ruang AND tb_gedung.id_gedung=tb_ruang.id_gedung ORDER BY tb_gedung.id_gedung DESC");
		return $data -> result_array();
	}
}