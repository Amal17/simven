<?php defined('BASEPATH')OR exit('akses ga ada');

class M_lappeminjaman extends CI_Model{
	public function GetAll($tgl_awal,$tgl_akhir){
		$data = $this -> db -> query("SELECT tb_peminjaman.id_peminjaman,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung,tb_peminjaman.jumlah,tb_peminjaman.tanggal,tb_peminjaman.lama_pinjam,tb_peminjaman.keperluan_pinjam,tb_peminjam.nama,tb_peminjaman.id_peminjam,tb_peminjaman.username,tb_peminjaman.kembali FROM tb_peminjaman,tb_penempatan,tb_jenisbarang,tb_gedung,tb_ruang,tb_peminjam WHERE tb_peminjaman.id_penempatan=tb_penempatan.id_penempatan AND tb_penempatan.id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=tb_ruang.id_ruang AND tb_ruang.id_gedung=tb_gedung.id_gedung AND tb_peminjaman.id_peminjam=tb_peminjam.id_peminjam AND tb_peminjaman.tanggal>='".$tgl_awal."'AND tb_peminjaman.tanggal <= '".$tgl_akhir."'");
		return $data -> result_array();
	}
}