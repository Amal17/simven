<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Cetakbarcode extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_barcode');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
		$notif = $this->m_notif->GetAll();
 		
 		$data = $this->m_barcode->Dataku();
		
 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
		$this->load->view('Admin/Cetakbarcode', array('data' => $data));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function cetak()
 	{ 

 		$id_jenisbarang = $this -> input -> post('daftarku'); 
 

		//$this -> m_barcode -> tampil($id_jenisbarang);
		echo $id_jenisbarang;
		echo "gaul";
 	}

 } ?>