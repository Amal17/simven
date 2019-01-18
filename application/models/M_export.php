<?php defined('BASEPATH')OR exit('akses ga ada');

class M_export extends CI_Model{

	public function getAll(){
		$data = $this -> db -> query('SELECT tb_jenisbarang.id_jenisbarang, tb_jenisbarang.nama_barang, tb_pemasok.nama_pemasok, tb_barang.tanggal_beli, tb_barang.stok, tb_barang.harga_satuan, tb_barang.harga_total FROM tb_jenisbarang INNER JOIN tb_barang ON tb_jenisbarang.id_jenisbarang = tb_barang.id_jenisbarang INNER JOIN tb_pemasok ON tb_barang.id_pemasok = tb_pemasok.id_pemasok');
		return $data ;
	}

}