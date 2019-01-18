<?php defined('BASEPATH')OR exit('akses ga ada');

class M_lappemakaian extends CI_Model{
	public function GetAll($tgl_awal,$tgl_akhir){
		$data = $this -> db -> query("SELECT tb_pengambilan.id_pengambilan,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_pengambilan.jumlah_ambil,tb_pengambilan.tanggal_ambil,tb_pengambilan.keperluan, tb_pengambilan.pengambil,tb_pengambilan.username,tb_pengambilan.tag FROM tb_pengambilan,tb_penempatan,tb_ruang,tb_jenisbarang WHERE tb_pengambilan.id_penempatan=tb_penempatan.id_penempatan AND  tb_penempatan.id_ruang=tb_ruang.id_ruang AND tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang AND tb_pengambilan.tanggal_ambil>='".$tgl_awal."'AND tb_pengambilan.tanggal_ambil <= '".$tgl_akhir."'");
		return $data -> result_array();
	}
		//$this-> db ->where('tanggal_ambil >=',$tgl_awal);
		//$this-> db ->where('tanggal_ambil <=',$tgl_akhir);
}