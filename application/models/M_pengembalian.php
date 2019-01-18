<?php defined('BASEPATH')OR exit('akses ga ada');

class M_pengembalian extends CI_Model{
	public function GetAll(){
		$data = $this -> db -> query("SELECT DISTINCT tb_peminjaman_array.id_peminjaman,tb_peminjaman_array.kembali,tb_peminjaman_array.tanggal, tb_peminjaman.lama_pinjam,tb_peminjam.nama FROM tb_peminjaman_array INNER JOIN tb_peminjaman ON tb_peminjaman_array.id_peminjaman=tb_peminjaman.id_peminjaman INNER JOIN tb_peminjam on tb_peminjaman.id_peminjam=tb_peminjam.id_peminjam");
		return $data -> result_array();
	}

	public function updatePengembalian($id_penempatan,$jumlah){
		$this -> db -> query("update tb_penempatan set jumlah=jumlah+".$jumlah." WHERE id_penempatan=".$id_penempatan);
	}

	public function updatePeminjaman($id_peminjaman,$id_penempatan){
		$this -> db -> query("update tb_peminjaman set kembali='Y' WHERE id_peminjaman=".$id_peminjaman." AND id_penempatan=".$id_penempatan);
	}

	public function insertPengembalian($data){
		$r = $this -> db -> insert('tb_pengembalian', $data);
		return $r;
	}

	public function GetKembali($id_peminjaman){
		$cek =$this -> db -> query("SELECT COUNT(kembali) as jml FROM tb_peminjaman WHERE id_peminjaman=".$id_peminjaman." AND kembali='N'");
			return $cek -> result_array();
	}

	public function updateKembali($id_peminjaman){
		$this -> db -> query("update tb_peminjaman_array set kembali='Y' WHERE id_peminjaman=".$id_peminjaman);
	}

	public function GetRusak($id_brg){
		$data = $this -> db -> query("SELECT COUNT(id_ruang) as jml FROM tb_penempatan WHERE id_ruang=2 AND id_barang=".$id_brg);
		return $data -> result_array();
	}

	public function GetHilang($id_brg){
		$data = $this -> db -> query("SELECT COUNT(id_ruang) as jml FROM tb_penempatan WHERE id_ruang=3 AND id_barang=".$id_brg);
		return $data -> result_array();
	}

	public function GetTempat($id_brg){
		$data = $this -> db -> query("SELECT id_penempatan FROM tb_penempatan WHERE id_ruang=2 AND id_barang=".$id_brg);
		return $data -> result_array();
	}

	public function GetTempatHilang($id_brg){
		$data = $this -> db -> query("SELECT id_penempatan FROM tb_penempatan WHERE id_ruang=3 AND id_barang=".$id_brg);
		return $data -> result_array();
	}

	public function insertPenempatan($data){
		$r = $this -> db -> insert('tb_penempatan', $data);
		return $r;
	}

	public function updatePenempatan($id_penempatan,$jumlah){
		$this -> db -> query("update tb_penempatan set jumlah=jumlah+".$jumlah." WHERE id_penempatan=".$id_penempatan);
	}

}