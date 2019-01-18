<?php defined('BASEPATH')OR exit('akses ga ada');

class M_pengambilan extends CI_Model{
	
	public function GetAll(){
	$data = $this -> db -> query("select tb_penempatan.id_penempatan,tb_penempatan.id_barang,tb_penempatan.jumlah,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung from tb_penempatan,tb_jenisbarang,tb_ruang,tb_gedung where tb_jenisbarang.kategori='habis' and  tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang and tb_penempatan.id_ruang=tb_ruang.id_ruang and tb_gedung.id_gedung=tb_ruang.id_gedung");
		return $data -> result_array();
	} 
	public function GetPengambilanArray(){
		// $this -> db -> select_max('id_peminjaman');
		// $query=$this->db->get('tb_peminjaman_array');
		$this ->db->order_by('id_pengambilan','DESC');
		$this->db->limit(1);
		$query=$this->db->get('tb_pengambilan_array');

		return $query -> result_array();
	}
	
	public function insertPengambilan_array($data2){
		$r = $this -> db -> insert('tb_pengambilan_array', $data2);
		return $r;
	}

	public function insertPengambilan($data4){ 
		$r = $this -> db -> insert('tb_pengambilan', $data4);
		return $r;
	}	
	public function updatePenempatan(){

		$this -> db -> query("update tb_penempatan a, tb_pengambilan b set a.jumlah=a.jumlah-b.jumlah_ambil WHERE a.id_penempatan=b.id_penempatan and b.tag='N'");
	}
	public function updateTagPengambilan(){ 

		$this -> db -> query("update tb_pengambilan set tag = 'Y'");
	}

	public function idMax(){
		$this->db->select_max('id_pengambilan');
		$query = $this->db->get('tb_pengambilan');
		return $query -> row();
	}
}