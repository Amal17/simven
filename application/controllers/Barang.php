<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Barang extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_barang');
		$this->load->model('m_notif');

 		if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
		
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();

 		$data = $this->m_barang->GetAll();

 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Barang', array('data' => $data));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
 		$nama_barang = $this -> input -> post('nama_barang');
 		$satuan = $this -> input -> post('satuan');
 		$kategori = $this -> input -> post('kategori');
 		$merk = $this -> input -> post('merk');
	   	$spek = $this -> input -> post('spek');

	   	$r = $this->m_barang->periksaBarang($nama_barang);

	   	if(count($r) == '0'){
	   		$data = array(
				'nama_barang' => $nama_barang,
				'satuan' => $satuan,
				'kategori' => $kategori,
				'merk' => $merk,
	        	'spek' => $spek
				);

			$result = $this -> m_barang -> insertBarang($data);

			if ($result == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil menginput data Barang baru');			
			} else {
				$this->session->set_flashdata('info', 'Gagal Input Data Barang Baru '.$result);
			}	
	   	} else {
	   		$this->session->set_flashdata('info', 'Barang Sudah Ada, Atau Nama Barang Sama.');
	   	}
		
		redirect('Barang');
 	}

 	public function ubah(){
 		$id_jenisbarang = $this -> input -> post('id_jenisbarang');
 		$nama_barang = $this -> input -> post('nama_barang');
 		$satuan = $this -> input -> post('satuan');
 		$kategori = $this -> input -> post('kategori');
 		$merk = $this -> input -> post('merk');
		$spek = $this -> input -> post('spek');

		$data = array(
			'nama_barang' => $nama_barang,
			'satuan' => $satuan,
			'kategori' => $kategori,
			'merk' => $merk,
        	'spek' => $spek
			);

		$result = $this -> m_barang -> updateBarang($id_jenisbarang, $data);

		if ($result == '1') {
			$this->session->set_flashdata('message', 'Anda berhasil mengupdate data Barang');			
		} else {
			$this->session->set_flashdata('info', 'Gagal Update Data Barang '.$result);
		}
		
		redirect('Barang');
 	}

 	public function hapus(){
		$id = $this -> input -> post('id_jenisbarang');
 		
		$r = $this->m_barang->periksaHapus($id);

		if(count($r) == '0'){
			$result = $this->m_barang-> deleteBarang($id);

			if ($result == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil menghapus data Barang');				
			} else {
				$this->session->set_flashdata('info', 'Gagal Delete Data Barang '.$result);
			}
		} else {
			$this->session->set_flashdata('info', 'Tidak Bisa Menghapus Barang, Terkait Pengadaan Barang');
		}

 		redirect('Barang');
 	}

 } ?>