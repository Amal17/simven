<?php defined('BASEPATH')OR exit('akses ga ada');

class M_cetak extends CI_Model{
	
	public function GetAll(){
		$data = $this -> db -> query("SELECT tb_peminjaman.id_peminjaman,tb_peminjaman.tanggal, tb_peminjaman.lama_pinjam,tb_peminjaman.keperluan_pinjam,tb_peminjaman.kembali,tb_penempatan.id_penempatan,tb_penempatan.id_barang,tb_peminjaman.jumlah,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung,tb_peminjam.nama, tb_peminjam.alamat, tb_peminjam.hp, tb_peminjam.email, tb_peminjaman.username from tb_penempatan 
			INNER JOIN tb_peminjaman ON tb_peminjaman.id_penempatan = tb_penempatan.id_penempatan 
			INNER JOIN tb_jenisbarang ON  tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang   
			INNER JOIN tb_ruang ON tb_penempatan.id_ruang=tb_ruang.id_ruang  
			INNER JOIN tb_gedung ON tb_gedung.id_gedung=tb_ruang.id_gedung
			INNER JOIN tb_peminjam ON tb_peminjaman.id_peminjam=tb_peminjam.id_peminjam WHERE id_peminjaman = (SELECT MAX(id_peminjaman) FROM tb_peminjaman)");
		return $data -> result_array();
	}

	public function GetPeminjam()
	{
		$peminjam = $this->db->query("SELECT tb_peminjaman.id_peminjaman,tb_peminjaman.id_peminjam, tb_peminjam.nama, tb_peminjam.alamat, tb_peminjam.email, tb_peminjam.hp FROM tb_peminjaman INNER JOIN tb_peminjam ON tb_peminjaman.id_peminjam=tb_peminjam.id_peminjam");
		return $peminjam ->result_array();
	}

}