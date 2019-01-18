<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Laporan extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "admin") {
	      redirect('admin/admin');
	    }
	    $this->load->model('m_barang');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
		$this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Laporan');
 		$this->load->view('atribut/FooterKaryawan');
 	}
 } ?>