<?php defined('BASEPATH')OR exit('akses ga ada');

class M_peminjaman extends CI_Model{
	
	public function GetAll(){
		$data = $this -> db -> query("select tb_penempatan.id_penempatan,tb_penempatan.id_barang,tb_penempatan.jumlah,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung from tb_penempatan,tb_jenisbarang,tb_ruang,tb_gedung where tb_jenisbarang.kategori='tidak habis' and tb_gedung.nama_gedung!='virtual' and  tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang and tb_penempatan.id_ruang=tb_ruang.id_ruang and tb_gedung.id_gedung=tb_ruang.id_gedung");
		return $data -> result_array();
	}

	public function GetPeminjamanArray(){
		// $this -> db -> select_max('id_peminjaman');
		// $query=$this->db->get('tb_peminjaman_array');
		$this ->db->order_by('id_peminjaman','DESC');
		$this->db->limit(1);
		$query=$this->db->get('tb_peminjaman_array');

		return $query -> result_array();
	}
	public function GetPeminjaman(){
		$data = $this -> db -> get('tb_peminjaman');
		return $data -> result_array();
	} 
	public function insertPeminjam($data){
		$r = $this -> db -> insert('tb_peminjam', $data);
		return $r;
	}
	public function insertPeminjaman($data1){ 
		$r = $this -> db -> insert('tb_peminjaman', $data1);
		return $r;
	}
		public function insertPeminjaman_array($data2){
		$r = $this -> db -> insert('tb_peminjaman_array', $data2);
		return $r;
	}
	public function updatePenempatan(){

		$this -> db -> query("update tb_penempatan a, tb_peminjaman b set a.jumlah=a.jumlah-b.jumlah WHERE a.id_penempatan=b.id_penempatan and b.tag='N'");
	}
	public function updateTagPeminjaman(){ 

		$this -> db -> query("update tb_peminjaman set tag = 'Y'");
	}
	public function idpeminjaman(){
		$this->db->select_max('id_peminjaman');
		$query = $this->db->get('tb_peminjaman');
		return $query -> row();
	}
	public function idpeminjam(){
		$this->db->select_max('id_peminjam');
		$query = $this->db->get('tb_peminjam');
		return $query -> row();
	}
}