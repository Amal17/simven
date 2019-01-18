<?php defined('BASEPATH')OR exit('akses ga ada');

class M_notif extends CI_Model{
	
	public function GetAll(){
		$data = $this -> db -> query("SELECT DISTINCT(tb_peminjam.id_peminjam), tb_peminjam.nama, tb_peminjaman.lama_pinjam FROM tb_peminjam,tb_peminjaman WHERE tb_peminjam.id_peminjam = tb_peminjaman.id_peminjam AND tb_peminjaman.lama_pinjam  < now() limit 5");
		return $data -> result_array();
	}
	public function Angka(){
		$data = $this -> db -> query("SELECT COUNT(DISTINCT id_peminjaman) as hitung from tb_peminjaman where lama_pinjam < now()");
		return $data->row();
	}

	public function Coba(){
		
	}
	
}