<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Pengembalian extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "admin") {
	      redirect('Admin/Admin');
	    }
 		$this->load->model('m_pengembalian');
 		$this->load->model('m_barang');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$data = $this->m_pengembalian->GetAll();
 		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
		$this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Pengembalian', array('data' => $data));
 		$this->load->view('atribut/FooterKaryawan');
 	}


 	public function ubah($id_peminjaman,$id_penempatan,$jumlah){
 		$this -> m_pengembalian -> updatePengembalian($id_penempatan,$jumlah);
 		$this -> m_pengembalian -> updatePeminjaman($id_peminjaman);

		redirect('Karyawan/Pengembalian');
 	}

 } ?>