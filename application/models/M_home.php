<?php defined('BASEPATH')OR exit('akses ga ada');

class M_home extends CI_Model{
	public function Pemasok(){
		$data = $this->db->count_all('tb_pemasok');
		return $data;
	}

	public function User(){
		$data = $this->db->count_all('tb_user');
		return $data;
	}

	public function Gedung(){
		$data = $this->db->count_all('tb_gedung');
		return $data;
	}

	public function Ruang(){
		$data = $this->db->count_all('tb_ruang');
		return $data;
	}

	public function Peminjam(){
		$data = $this->db->count_all('tb_peminjam');
		return $data;
	}

	public function Pengambilan(){
		$data = $this->db->count_all('tb_pengambilan_array');
		return $data;
	}

	public function Peminjaman(){
		$data = $this->db->count_all('tb_peminjaman_array');
		return $data;
	}

	public function Pengembalian(){
		$data = $this->db->query("SELECT DISTINCT id_pengembalian FROM tb_pengembalian");
		//$data = $this->db->count_all('tb_pengembalian');
		return $data->num_rows();
	}

	public function Barang(){
		//$this->db->select_sum('jumlah');
		//$data = $this->db->get('tb_jenisbarang');
		//return $data->row();
		$data = $this->db->count_all('tb_jenisbarang');
		return $data;
	}

	public function DetilBarang(){
		$data = $this -> db -> query("SELECT nama_barang,kategori,jumlah,satuan FROM tb_jenisbarang");
		return $data -> result_array();
	}

	public function DetilGedung(){
		$data = $this -> db -> query("SELECT nama_gedung FROM tb_gedung");
		return $data -> result_array();
	}

	public function DetilRuang(){
		$data = $this -> db -> query("SELECT nama_ruang,nama_gedung FROM tb_ruang,tb_gedung WHERE tb_ruang.id_gedung=tb_gedung.id_gedung");
		return $data -> result_array();
	}

	public function DetilPemasok(){
		$data = $this -> db -> query("SELECT nama_pemasok,alamat,kota FROM tb_pemasok");
		return $data -> result_array();
	}

	public function DetilUser(){
		$data = $this -> db -> query("SELECT nama,level FROM tb_user");
		return $data -> result_array();
	}


	public function DetilPeminjam(){
		$data = $this -> db -> query("SELECT * FROM tb_peminjam GROUP BY nama");
		return $data -> result_array();
	}

	public function DetilPengambilan(){
		$data = $this -> db -> query("SELECT tb_pengambilan.id_pengambilan,tb_jenisbarang.nama_barang,tb_pengambilan.jumlah_ambil,tb_pengambilan.tanggal_ambil,tb_pengambilan.keperluan,tb_pengambilan.pengambil FROM tb_pengambilan,tb_penempatan,tb_jenisbarang WHERE tb_pengambilan.id_penempatan=tb_penempatan.id_penempatan AND tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang");
		return $data -> result_array();
	}

	public function DetilPeminjaman(){
		$data = $this -> db -> query("SELECT tb_peminjaman.id_peminjaman,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung,tb_peminjaman.jumlah,tb_peminjaman.tanggal,tb_peminjaman.lama_pinjam,tb_peminjaman.keperluan_pinjam,tb_peminjam.nama,tb_peminjaman.id_peminjam,tb_peminjaman.username,tb_peminjaman.kembali FROM tb_peminjaman,tb_penempatan,tb_jenisbarang,tb_gedung,tb_ruang,tb_peminjam WHERE tb_peminjaman.id_penempatan=tb_penempatan.id_penempatan AND tb_penempatan.id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=tb_ruang.id_ruang AND tb_ruang.id_gedung=tb_gedung.id_gedung AND tb_peminjaman.id_peminjam=tb_peminjam.id_peminjam");
		return $data -> result_array();
	}

	public function DetilPengembalian(){
		$data = $this -> db -> query("SELECT tb_peminjaman.id_peminjaman,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung,tb_peminjaman.jumlah,tb_peminjam.nama,tb_peminjaman.id_peminjam,tb_pengembalian.keterangan FROM tb_peminjaman,tb_penempatan,tb_jenisbarang,tb_gedung,tb_ruang,tb_peminjam,tb_pengembalian WHERE tb_peminjaman.id_penempatan=tb_penempatan.id_penempatan AND tb_penempatan.id_barang=tb_jenisbarang.id_jenisbarang AND tb_penempatan.id_ruang=tb_ruang.id_ruang AND tb_ruang.id_gedung=tb_gedung.id_gedung AND tb_peminjaman.id_peminjam=tb_peminjam.id_peminjam AND tb_peminjaman.id_peminjaman=tb_pengembalian.id_peminjaman AND tb_peminjaman.id_penempatan=tb_pengembalian.id_penempatan ORDER BY id_peminjaman");
		return $data -> result_array();
	}
}