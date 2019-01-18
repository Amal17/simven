<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Notfound extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_barang');
 		if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
	    $this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Notfound');
 		$this->load->view('atribut/FooterAdmin');
 	}
 } ?>